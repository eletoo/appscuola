<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;

class DataLayer
{
    // contains the methods to interact with the DB
    public function listSecretaries()
    {
        return Teacher::where('role','Segreteria')
        ->orderBy('lastname', 'asc')
        ->orderBy('firstname', 'asc')->get();
    }

    public function listTeachers()
    {
        return Teacher::where('role','Docente')
        ->orderBy('lastname', 'asc')
        ->orderBy('firstname', 'asc')->get();
    }

    public function listSiteTeachers($siteid)
    {
        return Teacher::where(['role'=>'Docente', 'site_id' => $siteid])
        ->orderBy('lastname', 'asc')
        ->orderBy('firstname', 'asc')
        ->get();
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

    public function addSite($site_name, $street, $number, $postcode, $city, $province)
    {
        $site = new Site(['site_name' => $site_name, 'street' => $street, 'number' => $number, 'postcode' => $postcode, 'city' => $city, 'province' => $province]);
        $site->save();
        return $site;
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

    public function listTimetablesByTeacher($teacher_id)
    {
        return Timetable::where('teacher_id', $teacher_id)->get();
    }

    public function getAvailableTeachersFromSameSite($teacher_id, $siteid)
    {
        return Teacher::where(['role'=>'Docente', 'site_id'=>$siteid])
        ->where('id', '!=', $teacher_id)
        ->orderBy('lastname', 'asc')
        ->orderBy('firstname', 'asc')
        ->get();
    }

    public function getAvailableTeachers($teacher_id, $event_id)
    {
        $event = $this->getEvent($event_id); //retrieve the event
        $absent_teacher = $this->getTeacher($teacher_id); //retrieve the absent teacher
        $day_of_leave = date("d-m-Y", strtotime($event->day_of_week)); 

        $available_teachers = array(); //teachers that will be shown to the user as possible substitutes 

        //all teachers other than $absent_teacher working in the same site as $absent_teacher
        $possible_teachers = $this->getAvailableTeachersFromSameSite($teacher_id, $absent_teacher->site_id);
        foreach ($possible_teachers as $available){
            //list all working hours of $available 
            $timetables = $this->listTimetablesByTeacher($available->id); 
            foreach ($timetables as $timetable){
                //if $available has no class assigned in $day_of_leave and in $event->hour_of_schoolday
                //add it to the list of substitutes
                if(date("d-m-Y", strtotime($timetable->day_of_week)) == $day_of_leave
                && $timetable->hour_of_schoolday == $event->hour_of_schoolday 
                && $timetable->class == null
                && !in_array($available, $available_teachers)){
                    $available_teachers[] = $available;
                }
            }
        }
        return $available_teachers;
    }

    private function addUser($email, $password)
    {
        $user = new User(['email' => $email, 'password' => password_hash($password, PASSWORD_ARGON2ID)]);
        $user->save();
        return $user;
    }

    public function addTeacher($firstname, $lastname, $password, $site_id){
        $email = $firstname . '.' . $lastname . '@leopardi.it';
        while (User::where('email', $email)->exists()) {
            $email = $firstname . '.' . $lastname . count(User::where('email', $email)->get()). '@leopardi.it';
        }
        $user = $this->addUser($email, $password);
        $teacher = new Teacher(['firstname' => $firstname, 'lastname' => $lastname, 'role' => 'Docente', 'site_id' => $site_id, 'user_id' => intval($user->id)]);       
        $teacher->save();
        return $teacher;
    }

    public function deleteTeacher($teacher_id){
        $teacher = Teacher::find($teacher_id);
        $events = Event::where('teacher_id', $teacher_id)->get();
        $timetables = Timetable::where('teacher_id', $teacher_id)->get();
        $user = User::find($teacher->user_id);
        $events->each->delete();
        $timetables->each->delete();
        $teacher->delete();
        $user->delete(); 
    }

    public function addSecretary($firstname, $lastname, $password){
        $email = $firstname . '.' . $lastname . '@segreteria.leopardi.it';
        while (User::where('email', $email)->exists()) {
            $email = $firstname . '.' . $lastname . count(User::where('email', $email)->get()). '@segreteria.leopardi.it';
        }
        $user = $this->addUser($email, $password);
        $secretary = new Teacher(['firstname' => $firstname, 'lastname' => $lastname, 'role' => 'Segreteria', 'site_id' => null, 'user_id' => intval($user->id)]);       
        $secretary->save();
        return $secretary;
    }

    public function deleteSecretary($secretary_id)
    {
        $secretary = Teacher::find($secretary_id);
        $user = User::find($secretary->user_id);
        $secretary->delete();
        $user->delete();
    }

    public function getUserID($email)
    {
        $user = User::where('email', $email)->first();
        return $user->id;
    }

    public function listSubstitutionsByTeacher($teacher_id)
    {
        return Event::where('substitute_id', $teacher_id)->get();
    }

    public function listAbsencesByTeacher($teacher_id)
    {
        return Event::where('teacher_id', $teacher_id)->orderBy('day_of_week', 'desc')->get();
    }

    public function setValidCertificate($absence_id)
    {
        $event = Event::find($absence_id);
        $event->certificate = true;
        $event->save();
    }

    public function editEvent($event_id, $substitute_id)
    {
        session_start();
        if (isset($_SESSION['logged']) && $_SESSION['loggedRole'] == 'Segreteria') {
            $event = Event::find($event_id);
            $event->substitute_id = $substitute_id;
            $event->save();
        }        
    }
}