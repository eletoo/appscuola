<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getHome()
    {
        return view('index');
    }

    public function getPersonale()
    {
        return view('personale');
    }

    public function getSede()
    {
        return view('sede');
    }
}