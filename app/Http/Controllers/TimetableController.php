<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use App\Models\Timetable;
use App\Http\Requests\StoreTimetableRequest;
use App\Http\Requests\UpdateTimetableRequest;
use App\Models\Teacher;

class TimetableController extends Controller
{

    public function check($day, $hour, $teacher_id){
        $timetable = Timetable::where([
            ['day_of_week', '=', $day],
            ['hour_of_schoolday', '=', $hour],
            ['teacher_id', '=', $teacher_id]
        ])->first();
        if($timetable == null){
            return false;
        }
        return true;
    }

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
        session_start();
        if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false){
            return redirect(route('user.login', 'Segreteria'));
        }
        return view('timetables.add')->with([
            'logged' => true,
            'loggedID' => $_SESSION['loggedID'],
            'loggedName' => $_SESSION['loggedName'],
            'loggedRole' => $_SESSION['loggedRole'], 
            'teachers' => Teacher::orderBy('lastname', 'asc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTimetableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimetableRequest $request)
    {
        Timetable::create($request->all());

        return redirect()->route('secretariat.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function show(Timetable $timetable)
    {
        //
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
