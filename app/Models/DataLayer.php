<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;

class DataLayer
{
    // contains the methods to interact with the DB
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
        $user = new User();
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_ARGON2ID);
        $user->save();
        return $user;
    }

    public function addTeacher($firstname, $lastname, $password, $email){
        $user = $this->addUser($email, $password);
        $teacher = new Teacher();
        $teacher->firstname = $firstname;
        $teacher->lastname = $lastname;
        $teacher->role = 'Docente';
        $teacher->user_id = $user->id;
        $teacher->save();
        return $teacher;
    }

    public function addSecretary($firstname, $lastname, $password, $email){
        $user = $this->addUser($email, $password);
        $teacher = new Teacher();
        $teacher->firstname = $firstname;
        $teacher->lastname = $lastname;
        $teacher->role = 'Segretario';
        $teacher->user_id = $user->id;
        $teacher->save();
        return $teacher;
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