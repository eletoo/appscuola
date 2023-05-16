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
        if (isset($_SESSION['logged'])){
            if ($_SESSION['loggedRole'] == $employee_type) {
                return Redirect::to(route('home'));
            }
            else {
                return view('auth.auth')->with(['employee_type'=> $employee_type, 'logged' => true, 'loggedName' => $_SESSION['loggedName'], 'loggedRole' => $_SESSION['loggedRole'], 'loggedID' => $_SESSION['loggedID']]);
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
        if(Auth::attempt(['email' => $req->input('username'), 'password' => $req->input('password')]))
        {
            $_SESSION['logged'] = true;
            $_SESSION['loggedID'] = auth()->user()->id;
            $_SESSION['loggedRole'] = $dl->getTeacher(auth()->user()->id)->role;
            $_SESSION['loggedName'] = $dl->getTeacher(auth()->user()->id)->firstname . ' ' . $dl->getTeacher(auth()->user()->id)->lastname;
            $_SESSION['loggedEmail'] = auth()->user()->email;
            if($dl->getTeacher(auth()->user()->id)->role == 'Admin')
            {
                if($employee_type == 'Admin')
                {
                    $_SESSION['loggedRole'] = 'admin';
                    return Redirect::to(route('admin.home'));
                }
                return view('auth.auth')->with('error', 'Non hai i permessi per accedere a questa pagina')->with('employee_type', $employee_type);
            }
            else if($dl->getTeacher(auth()->user()->id)->role == 'Segreteria')
            {
                if($employee_type == 'Segreteria' || $employee_type == 'Admin') //administrator can access through secretary page
                {
                    $_SESSION['loggedRole'] = 'Segreteria';
                    return Redirect::to(route('secretariat.home'));
                }
                return view('auth.auth')->with('error', 'Non hai i permessi per accedere a questa pagina')->with('employee_type', $employee_type);
            }
            else if($dl->getTeacher(auth()->user()->id)->role == 'Docente')
            {
                if($employee_type == 'Docente')
                {
                    $_SESSION['loggedRole'] = 'Docente';
                    return Redirect::to(route('teacher.home'));
                }
                return view('auth.auth')->with('error', 'Non hai i permessi per accedere a questa pagina')->with('employee_type', $employee_type);
            }
            
        }

        return view('auth.auth')->with('error', 'Username o password errati')->with('employee_type', $employee_type);
    }

    public function teacherRegistration(Request $req) {
        $dl = new DataLayer();
        $dl->addTeacher($req->input('firstname'), $req->input('lastname'), $req->input('password'), $req->input('email'));
        return true;
    }

    public function secretariatRegistration(Request $req) {
        $dl = new DataLayer();
        $dl->addSecretary($req->input('firstname'), $req->input('lastname'), $req->input('password'), $req->input('email'));
        return true;
    }
}
