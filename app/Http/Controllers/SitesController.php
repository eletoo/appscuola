<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class SitesController extends Controller
{
    public function index()
    {
        session_start();
        $dl = new DataLayer();
        $sites_list = $dl->listSites();
        if (isset($_SESSION['logged'])) {
            return view('sites.all')->with(['sites_list' => $sites_list, 'logged' => true, 'loggedID' => $_SESSION['loggedID'], 'loggedName' => $_SESSION['loggedName'], 'loggedRole' => $_SESSION['loggedRole']]);
        }
        return view('sites.all')->with(['sites_list'=> $sites_list, 'logged' => false]);
    }

    public function brescia()
    {
        session_start();
        $dl = new DataLayer();
        $teachers = $dl->listSiteTeachers(1);
        $info_site = $dl->infoSite('Brescia');
        if (isset($_SESSION['logged'])) {
            return view('sites.index')->with(['teachers_list' => $teachers, 'info_site' => $info_site, 'logged' => true, 'loggedID' => $_SESSION['loggedID'], 'loggedName' => $_SESSION['loggedName'], 'loggedRole' => $_SESSION['loggedRole']]);
        }
        return view('sites.index')->with(['teachers_list' => $teachers, 'info_site' => $info_site, 'logged' => false]);
    }

    public function bergamo()
    {
        session_start();
        $dl = new DataLayer();
        $teachers = $dl->listSiteTeachers(2);
        $info_site = $dl->infoSite('Bergamo');
        if (isset($_SESSION['logged'])) {
            return view('sites.index')->with(['teachers_list' => $teachers, 'info_site' => $info_site, 'logged' => true, 'loggedID' => $_SESSION['loggedID'], 'loggedName' => $_SESSION['loggedName'], 'loggedRole' => $_SESSION['loggedRole']]);
        }
        return view('sites.index')->with(['teachers_list' => $teachers, 'info_site' => $info_site, 'logged' => false]);
    }

    public function milano()
    {
        session_start();
        $dl = new DataLayer();
        $teachers = $dl->listSiteTeachers(3);
        $info_site = $dl->infoSite('Milano');
        if (isset($_SESSION['logged'])) {
            return view('sites.index')->with(['teachers_list' => $teachers, 'info_site' => $info_site, 'logged' => true, 'loggedID' => $_SESSION['loggedID'], 'loggedName' => $_SESSION['loggedName'], 'loggedRole' => $_SESSION['loggedRole']]);
        }
        return view('sites.index')->with(['teachers_list' => $teachers, 'info_site' => $info_site, 'logged' => false]);
    }

}