<?php

namespace App\Http\Controllers;

use App\Models\Site;
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
        $info_site = $dl->infoSite(1);
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
        $info_site = $dl->infoSite(2);
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
        $info_site = $dl->infoSite(3);
        if (isset($_SESSION['logged'])) {
            return view('sites.index')->with(['teachers_list' => $teachers, 'info_site' => $info_site, 'logged' => true, 'loggedID' => $_SESSION['loggedID'], 'loggedName' => $_SESSION['loggedName'], 'loggedRole' => $_SESSION['loggedRole']]);
        }
        return view('sites.index')->with(['teachers_list' => $teachers, 'info_site' => $info_site, 'logged' => false]);
    }

    public function createSite()
    {
        session_start();
        if (isset($_SESSION['logged']) && $_SESSION['loggedRole'] == 'Admin'){
            return view('sites.create')->with(['logged' => true, 'loggedID' => $_SESSION['loggedID'], 'loggedName' => $_SESSION['loggedName'], 'loggedRole' => $_SESSION['loggedRole']]);
        }
        return redirect()->route('user.login', ['employee_type' => 'Segreteria']);
    }

    public function storeSite(Request $request)
    {
        session_start();
        $dl = new DataLayer();
        $dl->addSite($request->input('site_name'), $request->input('street'), $request->input('number'), $request->input('postcode'), $request->input('city'), $request->input('province'));
        return view('admin.home')
            ->with('logged', true)
            ->with('loggedName', $_SESSION['loggedName'])
            ->with('loggedRole', $_SESSION['loggedRole'])
            ->with('loggedID', $_SESSION['loggedID'])
            ->with('success', 'Sede aggiunta con successo.');
    }
}