<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function authentication() {
        return view('auth.auth');
    }

    public function logout() {
        session_start();
        session_destroy();
        return Redirect::to(route('home'));
    }

    public function login(Request $req) {
        session_start();
        $dl = new DataLayer();
        if(Auth::attempt(['email' => $req->input('username'), 'password' => $req->input('password')]))
        {
            $_SESSION['logged'] = true;
            $_SESSION['loggedName'] = auth()->user()->firstname . ' ' . auth()->user()->lastname;
            $_SESSION['loggedEmail'] = auth()->user()->email;
            if(auth()->user()->role == 'Segreteria')
            {
                $_SESSION['loggedRole'] = 'Segreteria';
                return Redirect::to(route('secretariat.home'));
            }
            return Redirect::to(route('teacher.home'));
        }

        return view('auth.auth')->with('error', 'Username o password errati');
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
