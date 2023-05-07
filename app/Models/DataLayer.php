<?php

namespace App\Models;

use App\Models\Teacher;

class DataLayer
{
    // contiene tutti i metodi per interagire con il DB
    public function listTeachers()
    {
        return Teacher::where('role','Docente')->orderBy('lastname', 'asc')->orderBy('firstname', 'asc')->get();
    }

    public function listSiteTeachers($siteid)
    {
        return Teacher::where('role','Docente')->where('site_id', $siteid)->orderBy('lastname', 'asc')->orderBy('firstname', 'asc')->get();
    }

    public function infoSite($sitecity)
    {
        return Site::where('city', $sitecity)->first();
    }

    public function listSites()
    {
        return Site::orderBy('city', 'asc')->get();
    }

    public function listEvents()
    {
        return Event::all();
    }

    public function getTimetables()
    {
        return Timetable::all();
    }
}
