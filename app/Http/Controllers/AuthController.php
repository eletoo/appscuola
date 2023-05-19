<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function authentication($employee_type) {
        session_start();
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == true){
            if ($_SESSION['loggedRole'] == $employee_type) {
                return Redirect::to(route('home'));
            }
            else {
                return view('auth.auth')->with(['employee_type'=> $employee_type, 'logged' => $_SESSION['logged'], 'loggedName' => $_SESSION['loggedName'], 'loggedRole' => $_SESSION['loggedRole'], 'loggedID' => $_SESSION['loggedID']]);
            }
        }
        return view('auth.auth')->with(['employee_type'=> $employee_type, 'logged' => false]);
    }

    public function logout() {
        session_start();
        session_destroy();
        return Redirect::to(route('home'));
    }

    public function login(Request $req, $employee_type) {
        session_start();
        $dl = new DataLayer();
        // try to authenticate the user
        if(Auth::attempt(['email' => $req->input('username'), 'password' => $req->input('password')]))
        {
            $_SESSION['logged'] = false;
            $_SESSION['loggedID'] = auth()->user()->id;
            $_SESSION['loggedRole'] = $dl->getTeacher(auth()->user()->id)->role;
            $_SESSION['loggedName'] = $dl->getTeacher(auth()->user()->id)->firstname . ' ' . $dl->getTeacher(auth()->user()->id)->lastname;
            $_SESSION['loggedEmail'] = auth()->user()->email;
            // if the user is an Admin, I want to redirect him to the admin page
            if($dl->getTeacher(auth()->user()->id)->role == 'Admin')
            {
                if ($employee_type == 'Segreteria')
                {
                    $_SESSION['logged'] = true;
                    $_SESSION['loggedRole'] = 'Admin';
                    return Redirect::to(route('admin.home'));
                }
                return view('auth.auth')->with(['error'=> 'Non hai i permessi per accedere a questa pagina',
                'employee_type'=> $employee_type,
                'logged' => $_SESSION['logged'],
                'loggedName' => $_SESSION['loggedName'],
                'loggedRole' => $_SESSION['loggedRole'],
                'loggedID' => $_SESSION['loggedID']]);
            }
            // if the user is a secretary, I want to redirect him to the secretary page
            else if($dl->getTeacher(auth()->user()->id)->role == 'Segreteria')
            {
                if($employee_type == 'Segreteria') 
                {
                    $_SESSION['logged'] = true;
                    $_SESSION['loggedRole'] = 'Segreteria';
                    return Redirect::to(route('secretariat.home'));
                }
                else if($employee_type == 'Admin') //administrator can access through secretary page
                {
                    $_SESSION['logged'] = true;
                    $_SESSION['loggedRole'] = 'Admin';
                    return Redirect::to(route('admin.home'));
                }

                return view('auth.auth')->with(['error'=> 'Non hai i permessi per accedere a questa pagina',
                'employee_type'=> $employee_type,
                'logged' => $_SESSION['logged'],
                'loggedName' => $_SESSION['loggedName'],
                'loggedRole' => $_SESSION['loggedRole'],
                'loggedID' => $_SESSION['loggedID']]);
            }
            else if($dl->getTeacher(auth()->user()->id)->role == 'Docente')
            {
                if($employee_type == 'Docente')
                {
                    $_SESSION['logged'] = true;
                    $_SESSION['loggedRole'] = 'Docente';
                    return Redirect::to(route('teacher.home'));
                }

                return view('auth.auth')
                ->with(['error'=> 'Non hai i permessi per accedere a questa pagina',
                'employee_type'=> $employee_type,
                'logged' => $_SESSION['logged'],
                'loggedName' => $_SESSION['loggedName'],
                'loggedRole' => $_SESSION['loggedRole'],
                'loggedID' => $_SESSION['loggedID']]);
            }
            
        }

        // if the user is already logged in, I want to keep the "logged-in" navbar and show an error message
        if(isset($_SESSION['logged']) && $_SESSION['loggedRole'] == $employee_type) 
        {
            return view('auth.auth')
                ->with(['error'=> 'Username o password errati',
                'employee_type'=> $employee_type,
                'logged' => true,
                'loggedName' => $_SESSION['loggedName'],
                'loggedRole' => $_SESSION['loggedRole'],
                'loggedID' => $_SESSION['loggedID']]);
        }
        // else it means that the user isn't logged in, so I want to show the "not-logged-in" navbar
        return view('auth.auth')
        ->with(['error'=> 'Username o password errati',
        'employee_type'=> $employee_type,
        'logged' => false]);
    }

    public function teacherRegistration(Request $req) {
        session_start();
        $dl = new DataLayer();
        $dl->addTeacher($req->input('firstname'), $req->input('lastname'), $req->input('password'),$req->input('site_id'));
        if ($_SESSION['loggedRole']=='Admin')
            return view('admin.home')
                ->with('logged', true)
                ->with('loggedName', $_SESSION['loggedName'])
                ->with('loggedRole', $_SESSION['loggedRole'])
                ->with('loggedID', $_SESSION['loggedID'])
                ->with('success', 'Docente aggiunto con successo');
        else if ($_SESSION['loggedRole']=='Segreteria')
            return view('secretariat.home')
                ->with('logged', true)
                ->with('loggedName', $_SESSION['loggedName'])
                ->with('loggedRole', $_SESSION['loggedRole'])
                ->with('loggedID', $_SESSION['loggedID'])
                ->with('success', 'Docente aggiunto con successo');
    }

    public function secretaryRegistration(Request $req) {
        session_start();
        $dl = new DataLayer();
        $dl->addSecretary($req->input('firstname'), $req->input('lastname'), $req->input('password'));
        return view('admin.home')
            ->with('logged', true)
            ->with('loggedName', $_SESSION['loggedName'])
            ->with('loggedRole', $_SESSION['loggedRole'])
            ->with('loggedID', $_SESSION['loggedID'])
            ->with('success', 'Segretario aggiunto con successo');
    }
}