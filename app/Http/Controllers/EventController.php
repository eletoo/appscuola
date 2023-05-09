<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;

class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dl = new DataLayer();
        $teachers_list = $dl->listTeachers();
        $events = $dl->listEvents();
        return view('events.index')->with([
            'events' => $events,
            'teachers_list' => $teachers_list
        ]);
    }

    
    public function findMethod(Request $req, string $id){
        try{
            return [$this, $id]($req); //if $id is the name of a site city, it calls the method named after the city
        } catch(Exception){
            return $this->show($id); //else it means that $id contains an event number and it calls the method to show the desired view
        }
    }

    public function bergamo()
    {
        $dl = new DataLayer();
        $teachers_list = $dl->listSiteTeachers(1);
        $events=array();
        foreach($teachers_list as $teacher)
        {
            $events[]=$dl->listEvents()->where('teacher_id', $teacher->id);
        }
        return view('events.school')->with([
            'site' => $dl->infoSite('Bergamo'),
            'events' => $events,
            'teachers_list' => $teachers_list
        ]);
    }

    public function brescia()
    {
        $dl = new DataLayer();
        $teachers_list = $dl->listSiteTeachers(2);
        $events=array();
        foreach($teachers_list as $teacher)
        {
            $events[] = $dl->listEvents()->where('teacher_id', $teacher->id);
        }
        return view('events.school')->with([
            'site' => $dl->infoSite('Brescia'),
            'events' => $events,
            'teachers_list' => $teachers_list
        ]);
    }

    public function milano()
    {
        $dl = new DataLayer();
        $teachers_list = $dl->listSiteTeachers(3);
        $events=array();
        foreach($teachers_list as $teacher)
        {
            $events[]=$dl->listEvents()->where('teacher_id', $teacher->id);
        }
        return view('events.school')->with([
            'site' => $dl->infoSite('Milano'),
            'events' => $events,
            'teachers_list' => $teachers_list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Event::create($request->all());
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($event_id)
    {
        $dl = new DataLayer;
        $event = $dl->getEvent(intval($event_id));

        $teacherID = $event->teacher_id;
        $teacher = $dl->getTeacher(intval($teacherID));

        $site_city=$dl->getSiteById($teacher->site_id)->city;

        $timetables = $dl->listTimetablesByTeacher(intval($teacherID));
        $in_class = true;
        foreach ($timetables as $timetable){
            if ($timetable->day_of_week == $event->day_of_week
            && $timetable->hour_of_schoolday == $event->hour_of_schoolday
            && $timetable->class == null) {
                $in_class = false;
            }
        }
        return view('events.show')->with(['event'=> $event, 'teacher'=> $teacher, 'site_city' => $site_city, 'in_class' => $in_class]);
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
        //
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