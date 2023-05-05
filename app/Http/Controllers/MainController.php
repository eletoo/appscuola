<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getHome()
    {
        return view('index');
    }

    public function getTeachers()
    {
        return view('teachers');
    }

    public function getSites()
    {
        return view('sites');
    }
}