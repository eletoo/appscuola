<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use App\Models\Timetable;
use App\Http\Requests\StoreTimetableRequest;
use App\Http\Requests\UpdateTimetableRequest;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTimetableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimetableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function show(Timetable $timetable)
    {
        session_start();
        $dl = new DataLayer();
        $teacher = $dl->getTeacher(intval($timetable->teacher_id));
        $site_city=$dl->getSiteById(intval($teacher->site_id))->city;
        if (isset($_SESSION['logged'])) {
            return view('timetables.show')
            ->with(['timetable'=> $timetable, 
            'site_city'=> $site_city, 
            'teacher' => $teacher,
            'logged' => true,
            'loggedID' => $_SESSION['loggedID'],
            'loggedName' => $_SESSION['loggedName'],
            'loggedRole' => $_SESSION['loggedRole']]);
        }
        return view('timetables.show')
        ->with(['timetable'=> $timetable, 
        'site_city'=> $site_city, 
        'teacher' => $teacher,
        'logged' => false]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function edit(Timetable $timetable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTimetableRequest  $request
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimetableRequest $request, Timetable $timetable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timetable $timetable)
    {
        //
    }
}
