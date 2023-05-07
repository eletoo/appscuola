<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use App\Models\Event;
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

    
    public function forCity(Request $req, string $city){
        return [$this, $city]($req);
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
    public function show($id)
    {
        //
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