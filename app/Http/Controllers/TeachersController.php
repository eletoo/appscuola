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
        return view('login.teacherLogin')->with(['teachers_list' => $teachers]);
    }

    public function secretariatLogin()
    {
        $dl = new DataLayer();
        $teachers = $dl->listTeachers();
        return view('login.secretariatLogin')->with(['teachers_list' => $teachers]);
    }

    public function timetable($teacher_id)
    {
        $dl = new DataLayer();
        $teacher = $dl->getTeacher(intval($teacher_id));
        $site_city=$dl->getSiteById(intval($teacher->site_id))->city;

        return view('teachers.timetable')->with('teacher', $teacher)->with('site_city', $site_city)->with('events', $dl->listTimetablesByTeacher($teacher->id));
    }

    public function substitute($teacher_id, $event_id)
    {
        $dl = new DataLayer;
        $available_teachers = $dl->getAvailableTeachers($teacher_id, $event_id);
        return view('teachers.substitute')->with('available_teachers', $available_teachers)
        ->with('teacher', $dl->getTeacher(intval($teacher_id)))
        ->with('event', $dl->getEvent(intval($event_id)))
        ->with('city', $dl->getSiteById(intval($dl->getTeacher(intval($teacher_id))->site_id))->city);
    }
}