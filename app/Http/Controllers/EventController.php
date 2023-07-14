<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class EventController extends Controller
{

    public function __construct() {
        $this->middleware('authSecretary', ['only' => ['update', 'create', 'store', 'edit', 'destroy']]);
        $this->middleware('authTeacher', ['only' => ['show', 'create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        $dl = new DataLayer();
        $teachers_list = $dl->listTeachers();
        $events = $dl->listEvents()->where('substitute_id', null); //list events without a substitute
        if (isset($_SESSION['logged']) && $_SESSION['logged']) {
            return view('events.index')->with([
                'events' => $events,
                'teachers_list' => $teachers_list,
                'logged' => true,
                'loggedID' => $_SESSION['loggedID'],
                'loggedName' => $_SESSION['loggedName'],
                'loggedRole' => $_SESSION['loggedRole']
            ]);
        }
        return view('events.index')->with([
            'events' => $events,
            'teachers_list' => $teachers_list,
            'logged' => false
        ]);
    }

    public function eventsByCity($city_id){
        session_start();
        $dl = new DataLayer();
        $teachers_list = $dl->listSiteTeachers($city_id);
        $events=array();
        foreach($teachers_list as $teacher)
        {
            $events[]=$dl->listEvents()->where('teacher_id', $teacher->id)->where('substitute_id', null);
        }
        if (isset($_SESSION['logged']) && $_SESSION['logged']) {
            return view('events.school')->with([
                'site' => $dl->infoSite($city_id),
                'events' => $events,
                'teachers_list' => $teachers_list,
                'logged' => true,
                'loggedID' => $_SESSION['loggedID'],
                'loggedName' => $_SESSION['loggedName'],
                'loggedRole' => $_SESSION['loggedRole']
            ]);
        }
        return view('events.school')->with([
            'site' => $dl->infoSite($city_id),
            'events' => $events,
            'teachers_list' => $teachers_list,
            'logged' => false
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();
        if (isset($_SESSION['logged']) && $_SESSION['logged'] && $_SESSION['loggedRole'] == 'Docente'){
            return view('events.create')->with([
                'logged' => true,
                'loggedID' => $_SESSION['loggedID'],
                'loggedName' => $_SESSION['loggedName'],
                'loggedRole' => $_SESSION['loggedRole'], 
                'teacher_id' => $_SESSION['loggedID']
            ]);
        }
        return redirect()->route('user.login', 'Docente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hours = $request->input('hour_of_schoolday');
        
        foreach ($hours as $hour){
            Event::create([
                'id'=>count(Event::all())+1, 
                'teacher_id'=>$request->input('teacher_id'), 
                'description'=>$request->input('description'), 
                'day_of_week'=>$request->input('day_of_week'),
                'hour_of_schoolday'=> $hour, 
                'certificate'=>0,
                'validated'=> 0, 
                'substitute_id'=> null
            ]);
        }
        
        return redirect()->route('teacher.myAbsences', ['teacher_id' => $request->input('teacher_id'), 'success' => 'Assenza aggiunta con successo!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($event_id)
    {
        session_start();
        $dl = new DataLayer;
        $event = $dl->getEvent(intval($event_id));

        $teacherID = $event->teacher_id;
        $teacher = $dl->getTeacher(intval($teacherID));

        $site=$dl->getSiteById(intval($teacher->site_id));

        $timetables = $dl->listTimetablesByTeacher(intval($teacherID));
        $in_class = true;
        foreach ($timetables as $timetable){
            if ($timetable->day_of_week == $event->day_of_week
            && $timetable->hour_of_schoolday == $event->hour_of_schoolday
            && $timetable->class == null) {
                $in_class = false;
            }
        }
        if (isset($_SESSION['logged'])) {
            return view('events.show')
            ->with(['event'=> $event, 'teacher'=> $teacher, 'site' => $site, 'in_class' => $in_class, 'logged' => true, 'loggedID' => $_SESSION['loggedID'], 'loggedName' => $_SESSION['loggedName'], 'loggedRole' => $_SESSION['loggedRole']]);
        }
        return view('events.show')
        ->with(['event'=> $event, 'teacher'=> $teacher, 'site' => $site, 'in_class' => $in_class, 'logged' => false]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // set the substitute_id of the event to the id of the teacher who accepted the substitution
        session_start();
        $dl = new DataLayer;
        // if the user is logged in and is a secretary then edit the event
        if (isset($_SESSION['logged']) && $dl->getTeacher(auth()->user()->id)->role == 'Segreteria') {
            $dl->editEvent($id, $request->input('substitute_id'));
            return redirect()->route('events.school', ['event_id' => $request->input('city')]);
        }
        // if the user is not logged in, redirect to the login page
        return redirect()->route('user.login', ['employee_type' => 'Segreteria']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}