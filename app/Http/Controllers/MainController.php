<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getHome()
    {
        session_start();

        if (isset($_SESSION['logged'])) {
            return view('index')->with('logged', true)->with('loggedID', $_SESSION['loggedID'])->with('loggedName', $_SESSION['loggedName'])->with('loggedRole', $_SESSION['loggedRole'])->with('sites_list', (new DataLayer())->listSites());
        } else {
            return view('index')->with('logged', false);
        }
    }
}