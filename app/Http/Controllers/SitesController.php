<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class SitesController extends Controller
{
    public function index()
    {
        $dl = new DataLayer();
        $lista_sedi = $dl->listSites();
        return view('sites.all')->with('', $lista_sedi);
    }

    public function brescia()
    {
        $dl = new DataLayer();
        $teachers = $dl->listSiteTeachers(1);
        $info_site = $dl->infoSite('Brescia');
        return view('sites.index')->with(['teachers_list' => $teachers, 'info_site' => $info_site]);
    }

    public function bergamo()
    {
        $dl = new DataLayer();
        $teachers = $dl->listSiteTeachers(2);
        $info_site = $dl->infoSite('Bergamo');
        return view('sites.index')->with(['teachers_list' => $teachers, 'info_site' => $info_site]);
    }

    public function milano()
    {
        $dl = new DataLayer();
        $teachers = $dl->listSiteTeachers(3);
        $info_site = $dl->infoSite('Milano');
        return view('sites.index')->with(['teachers_list' => $teachers, 'info_site' => $info_site]);
    }
}