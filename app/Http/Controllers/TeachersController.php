<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function teachers()
    {
        $dl = new DataLayer();
        $teachers = $dl->listTeachers();
        $sites_list = $dl->listSites();
        return view('teachers.index')->with(['teachers_list' => $teachers, 'sites_list' => $sites_list]);
    }

    public function teachersLogin()
    {
        $dl = new DataLayer();
        $teachers = $dl->listTeachers();
        return view('teachers.teacherLogin')->with(['teachers_list' => $teachers]);
    }

    public function secretariatLogin()
    {
        $dl = new DataLayer();
        $teachers = $dl->listTeachers();
        return view('teachers.secretariatLogin')->with(['teachers_list' => $teachers]);
    }

    public function timetable($id)
    {
        $dl = new DataLayer();

        $teachers = $dl->listTeachers();
        $teacher=$teachers->get($id);

        $site_city=$dl->listSites()->get($teachers->get($id)->site_id)->city;

        return view('teachers.timetable')->with('teacher', $teacher)->with('site_city', $site_city)->with('events',$dl->getTimetables()->where('teacher_id',$teacher->id));
    }
}