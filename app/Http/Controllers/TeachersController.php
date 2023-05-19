<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function createTeacher()
    {
        session_start();
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == true){
            if ($_SESSION['loggedRole'] == 'Segreteria' || $_SESSION['loggedRole'] == 'Admin'){
                return view('teachers.create')->with(['sites_list' => (new DataLayer())->listSites(), 'employees_list'=>Teacher::all(), 'logged' => true, 'loggedID' => $_SESSION['loggedID'], 'loggedName' => $_SESSION['loggedName'], 'loggedRole' => $_SESSION['loggedRole']]);
            }
        }
        return redirect()->route('user.login', ['employee_type' => 'Segreteria']);
    }

    public function destroyTeacher($teacher_id)
    {
        session_start();
        if (isset($_SESSION['logged']) && $_SESSION['loggedRole'] == 'Admin'){
            $dl = new DataLayer();
            $dl->deleteTeacher($teacher_id);
            return view('admin.home')->with(
                ['teachers_list' => $dl->listTeachers(),
                'logged' => true,
                'loggedID' => $_SESSION['loggedID'],
                'loggedName' => $_SESSION['loggedName'],
                'loggedRole' => $_SESSION['loggedRole'],
                'success' => 'Docente eliminato con successo!']);
        }else if (isset($_SESSION['logged']) && $_SESSION['loggedRole'] == 'Segreteria'){
            $dl = new DataLayer();
            $dl->deleteTeacher($teacher_id);
            return view('secretariat.home')->with(
                ['teachers_list' => $dl->listTeachers(),
                'logged' => true,
                'loggedID' => $_SESSION['loggedID'],
                'loggedName' => $_SESSION['loggedName'],
                'loggedRole' => $_SESSION['loggedRole'],
                'success' => 'Docente eliminato con successo!']);
        }
        return redirect()->route('user.login', ['employee_type' => 'Segreteria']);
    }

    public function createSecretary()
    {
        session_start();
        if (isset($_SESSION['logged']) && $_SESSION['loggedRole'] == 'Admin'){
            return view('secretariat.create')->with(['sites_list' => (new DataLayer())->listSites(), 'employees_list'=>Teacher::all(), 'logged' => true, 'loggedID' => $_SESSION['loggedID'], 'loggedName' => $_SESSION['loggedName'], 'loggedRole' => $_SESSION['loggedRole']]);
        }
        return redirect()->route('user.login', ['employee_type' => 'Segreteria']);
    }

    public function destroySecretary($secretary_id)
    {
        session_start();
        if (isset($_SESSION['logged']) && $_SESSION['loggedRole'] == 'Admin'){
            $dl = new DataLayer();
            $dl->deleteSecretary($secretary_id);
            return view('admin.home')->with(
                ['secretaries_list' => $dl->listSecretaries(),
                'logged' => true,
                'loggedID' => $_SESSION['loggedID'],
                'loggedName' => $_SESSION['loggedName'],
                'loggedRole' => $_SESSION['loggedRole'],
                'success' => 'Segretario eliminato con successo!']);
        }
        return redirect()->route('user.login', ['employee_type' => 'Segreteria']);
    }

    public function teachers()
    {  
        session_start();
        $dl = new DataLayer();
        $teachers = $dl->listTeachers();
        $sites_list = $dl->listSites();
        if (isset($_SESSION['logged'])) {
            return view('teachers.index')->with(['teachers_list' => $teachers, 'sites_list' => $sites_list, 'logged' => true, 'loggedID' => $_SESSION['loggedID'], 'loggedName' => $_SESSION['loggedName'], 'loggedRole' => $_SESSION['loggedRole']]);
        }
        return view('teachers.index')->with(['teachers_list' => $teachers, 'sites_list' => $sites_list, 'logged' => false]);
    }

    public function secretaries()
    {
        session_start();
        $dl = new DataLayer();
        $secretaries = $dl->listSecretaries();
        if (isset($_SESSION['logged']) && $_SESSION['loggedRole'] == 'Admin') {
            return view('secretariat.index')->with(['secretaries_list' => $secretaries, 'logged' => true, 'loggedID' => $_SESSION['loggedID'], 'loggedName' => $_SESSION['loggedName'], 'loggedRole' => $_SESSION['loggedRole']]);
        }
        return redirect()->route('user.login', ['employee_type' => 'Segreteria']);
    }

    public function homeAdmin()
    {
        session_start();        

        if (isset($_SESSION['logged']) && $_SESSION['loggedRole'] == 'Admin'){
            return view('admin.home')
            ->with('logged', true)
            ->with('loggedName', $_SESSION['loggedName'])
            ->with('loggedRole', $_SESSION['loggedRole'])
            ->with('loggedID', $_SESSION['loggedID']);
        }

        return redirect()->route('user.login', ['employee_type' => 'Segreteria']);
    }
    
    public function homeTeacher()
    {
        session_start();

        if (isset($_SESSION['logged']) && $_SESSION['loggedRole'] == 'Docente'){
            return view('teachers.home')
            ->with('logged', true)
            ->with('loggedName', $_SESSION['loggedName'])
            ->with('loggedRole', $_SESSION['loggedRole'])
            ->with('loggedID', $_SESSION['loggedID']);
        }

        return redirect()->route('user.login', ['employee_type' => 'Docente']);
    }

    public function homeSecretary()
    {
        session_start();

        if (isset($_SESSION['logged']) && $_SESSION['loggedRole'] == 'Segreteria'){
            return view('secretariat.home')
        ->with('logged', true)
        ->with('loggedName', $_SESSION['loggedName'])
        ->with('loggedRole', $_SESSION['loggedRole'])
        ->with('loggedID', $_SESSION['loggedID']);
        }

        return redirect()->route('user.login', ['employee_type' => 'Segreteria']);
    }

    public function timetable($teacher_id)
    {
        session_start();
        $dl = new DataLayer();
        $teacher = $dl->getTeacher(intval($teacher_id));
        $site_city=$dl->getSiteById(intval($teacher->site_id))->city;
        if (isset($_SESSION['logged'])) {
            return view('teachers.timetable')->
            with(['teacher'=> $teacher, 
            'site_city'=> $site_city, 
            'lectures' => $dl->listTimetablesByTeacher($teacher_id),
            'logged' => true, 
            'loggedID' => $_SESSION['loggedID'], 
            'loggedName' => $_SESSION['loggedName'], 
            'loggedRole' => $_SESSION['loggedRole']]);
        }
        return view('teachers.timetable')
        ->with(['teacher'=> $teacher, 
        'site_city'=> $site_city, 
        'lectures' => $dl->listTimetablesByTeacher($teacher_id), 
        'logged' => false]);
    }

    public function substitutions($teacher_id)
    {
        session_start();
        $dl = new DataLayer();
        if (isset($_SESSION['logged']))
            return view('teachers.personalSubstitutions')
        ->with(['substitutions_list'=> $dl->listSubstitutionsByTeacher($teacher_id),
        'logged' => $_SESSION['logged'],
        'loggedID' => $_SESSION['loggedID'],
        'loggedName' => $_SESSION['loggedName'],
        'loggedRole' => $_SESSION['loggedRole']]);

        return view('teachers.personalSubstitutions')
        ->with(['substitutions_list'=> $dl->listSubstitutionsByTeacher($teacher_id), 'logged' => false]);
    }

    public function absences($teacher_id)
    {
        session_start();
        $dl = new DataLayer();
        if (isset($_SESSION['logged']))
            return view('teachers.personalAbsences')
                ->with(['absences_list' => $dl->listAbsencesByTeacher($teacher_id),
                'logged' => $_SESSION['logged'],
                'loggedID' => $_SESSION['loggedID'],
                'loggedName' => $_SESSION['loggedName'],
                'loggedRole' => $_SESSION['loggedRole']]);

        return view('teachers.personalAbsences')
        ->with(['absences_list' => $dl->listAbsencesByTeacher($teacher_id), 'logged' => false]);
    }

    public function uploadCertificate(Request $req) //TODO: uploadCertificate
    {
        session_start();
        if (isset($_SESSION['logged']) && $_SESSION['loggedRole'] == 'Docente')
        {
            if($req->hasFile('Certificate')){
                $req->file('Certificate')->storeAs('public/certificates/', 'prof'.$req->input('teacher_id').'absence'.$req->input('absence_id').'.pdf');
                $dl = new DataLayer();
                $dl->setValidCertificate($req->input('absence_id'));
            }                

            return view('teachers.personalAbsences')->with(['absences_list' => (new DataLayer())->listAbsencesByTeacher($req->get('teacher_id')), 
                'logged' => true, 
                'loggedID' => $_SESSION['loggedID'], 
                'loggedName' => $_SESSION['loggedName'], 
                'loggedRole' => $_SESSION['loggedRole']]);
        }        

        return view('teachers.personalAbsences')->with(['absences_list' => (new DataLayer())->listAbsencesByTeacher($req->get('teacher_id')), 
        'logged' => false]);
    }

    public function substitute($teacher_id, $event_id)
    {
        session_start();
        $dl = new DataLayer;
        $available_teachers = $dl->getAvailableTeachers($teacher_id, $event_id);
        
        if (isset($_SESSION['logged']) && $_SESSION['loggedRole'] == 'Segreteria'){
            return view('teachers.substitute')->with(['available_teachers' => $available_teachers, 
            'teacher' => $dl->getTeacher(intval($teacher_id)), 
            'event' => $dl->getEvent(intval($event_id)), 
            'city' => $dl->getSiteById(intval($dl->getTeacher(intval($teacher_id))->site_id))->city,
            'logged' => $_SESSION['logged'], 
            'loggedID' => $_SESSION['loggedID'], 
            'loggedName' => $_SESSION['loggedName'], 
            'loggedRole' => $_SESSION['loggedRole']]);
        }            
        
        return redirect()->to(route('user.login', ['employee_type' => 'Segreteria']));
    }    
}