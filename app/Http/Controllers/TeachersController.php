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
}
