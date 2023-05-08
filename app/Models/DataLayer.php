<?php

namespace App\Models;

use App\Models\Teacher;

class DataLayer
{
    // contains the methods to interact with the DB
    public function listTeachers()
    {
        return Teacher::where('role','Docente')->orderBy('lastname', 'asc')->orderBy('firstname', 'asc')->get();
    }


    public function listSiteTeachers($siteid)
    {
        return Teacher::where(['role'=>'Docente', 'site_id'=>$siteid])->orderBy('lastname', 'asc')->orderBy('firstname', 'asc')->get();
    }

    public function infoSite($sitecity)
    {
        return Site::where('city', $sitecity)->first();
    }

    public function listSites()
    {
        return Site::orderBy('city', 'asc')->get();
    }

    public function getSiteById($site_id)
    {
        return Site::where('id', $site_id)->first();
    }

    public function listEvents()
    {
        return Event::all();
    }

    public function getEvent($id){
        return Event::where("id", $id)->first();
    }

    public function getTeacher($id){
        return Teacher::where("id", $id)->first();
    }

    public function getTimetables()
    {
        return Timetable::all();
    }
}