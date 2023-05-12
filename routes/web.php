<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\SitesController;
use App\Http\Controllers\TimetableController;
use Illuminate\Support\Facades\Route;

/*Home*/
Route::get('/', [MainController::class, 'getHome'])->name('home');
Route::get('/personale/loginDocenti', [TeachersController::class,'teachersLogin'])->name('teachers.teacherLogin');
Route::get('/personale/loginSegreteria', [TeachersController::class,'secretariatLogin'])->name('teachers.secretariatLogin');
Route::post('/personale/loginDocenti',[TeachersController::class,'']);

Route::middleware(['authCustom'])->group(function(){
    /*Rotte da proteggere con autenticazione*/
});

/*Teachers*/
Route::get('/personale/docenti', [TeachersController::class, 'teachers'])->name('teachers.index');
Route::get('/personale/docenti/{teacher_id}/orario', [TeachersController::class, 'timetable'])->name('teachers.timetable');
Route::get('/personale/docenti/{teacher_id}/{event_id}/sostituzione', [TeachersController::class, 'substitute'])->name('teachers.substitute');

/*Sites*/
Route::get('/sede/tutte', [SitesController::class, 'index'])->name('sites.index');
Route::get('/sede/brescia', [SitesController::class, 'brescia'])->name('brescia.index');
Route::get('/sede/bergamo', [SitesController::class, 'bergamo'])->name('bergamo.index');
Route::get('/sede/milano', [SitesController::class, 'milano'])->name('milano.index');

/*Events*/
Route::get('/events/{event_id}', [EventController::class, 'findMethod'])->name('events.school');
Route::resource('events', EventController::class);  

/*Lectures*/
Route::resource('/timetable', TimetableController::class);