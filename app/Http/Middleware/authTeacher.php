<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class authTeacher extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        session_start();
        if(isset($_SESSION['logged']) && $_SESSION['logged'] && $_SESSION['loggedRole'] == 'Docente')
        {
            return true;
        }
        return route('user.login', ['employee_type' => 'Docente']);
    }
}
