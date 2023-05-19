<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\SitesController;
use App\Http\Controllers\TimetableController;
use Illuminate\Support\Facades\Route;

/*Home*/
Route::get('/', [MainController::class, 'getHome'])->name('home');

/*Auth*/
Route::get('/personale/login/{employee_type}', [AuthController::class,'authentication'])->name('user.login');
Route::post('/personale/login/{employee_type}', [AuthController::class, 'login'])->name('user.login');
Route::get('/personale/logout/{employee_type}', [AuthController::class, 'logout'])->name('user.logout');

Route::middleware(['authAdmin'])->group(function(){
    Route::get('/personale/admin/areaRiservata', [TeachersController::class, 'homeAdmin'])->name('admin.home');
    // only admin can add secretaries to the database
    Route::get('/personale/segreteria/nuovo', [TeachersController::class, 'createSecretary'])->name('secretary.add'); 
    Route::post('/personale/segreteria/nuovo', [AuthController::class, 'secretaryRegistration'])->name('secretary.store');
    // only admin can remove secretaries from the database
    Route::get('/personale/segreteria/tutti', [TeachersController::class, 'secretaries'])->name('secretaries.index');
    Route::delete('/personale/segreteria/{secretary_id}', [TeachersController::class, 'destroySecretary'])->name('secretary.destroy');
    // POSSIBLE EXPANSION: only admin can add sites to the database
    // Route::get('/sede/nuova', [SitesController::class, 'createSite'])->name('site.add');
    // Route::post('/sede/nuova', [SitesController::class, 'storeSite'])->name('site.store');
});

Route::middleware(['authSecretary'])->group(function(){
    Route::get('/personale/segreteria/areaRiservata', [TeachersController::class, 'homeSecretary'])->name('secretariat.home');
    // only secretaries can choose which teacher will substitute another one
    Route::get('/personale/docenti/{teacher_id}/{event_id}/sostituzione', [TeachersController::class, 'substitute'])->name('teachers.substitute');
    // both secretaries and admin can add/remove teachers to the database
    Route::get('/personale/docenti/nuovo', [TeachersController::class, 'createTeacher'])->name('teacher.add'); 
    Route::post('/personale/docenti/nuovo', [AuthController::class, 'teacherRegistration'])->name('teacher.store');
    Route::delete('/personale/docenti/{teacher_id}', [TeachersController::class, 'destroyTeacher'])->name('teacher.destroy');
    // only secretaries can manage abscence certificates
    Route::get('/personale/docenti/{teacher_id}/certificati', [TeachersController::class, 'manageCertificates'])->name('teacher.manageCertificates');
    Route::get('/personale/docenti/{certificate_id}/certificato', [TeachersController::class, 'viewCertificate'])->name('teacher.viewCertificate');
    Route::put('/personale/docenti/{certificate_id}/convalida', [TeachersController::class, 'validateCertificate'])->name('teacher.validateCertificate');
    Route::put('/personale/docenti/{certificate_id}/rifiuta', [TeachersController::class, 'invalidateCertificate'])->name('teacher.invalidateCertificate');
});

Route::middleware(['authTeacher'])->group(function(){
    Route::get('/personale/docenti/areaRiservata', [TeachersController::class, 'homeTeacher'])->name('teacher.home');
    // each teacher has to be logged in to see their own substitutions
    Route::get('/personale/docenti/areaRiservata/{teacher_id}/supplenze', [TeachersController::class, 'substitutions'])->name('teacher.mySubstitutions');
    // each teacher has to be logged in to see their own absences
    Route::get('/personale/docenti/areaRiservata/{teacher_id}/assenze', [TeachersController::class, 'absences'])->name('teacher.myAbsences');
    Route::post('/api/certificate', [TeachersController::class, 'uploadCertificate'])->name('teacher.uploadCertificate');
});

/*Teachers*/
Route::get('/personale/docenti', [TeachersController::class, 'teachers'])->name('teachers.index');
Route::get('/personale/docenti/{teacher_id}/orario', [TeachersController::class, 'timetable'])->name('teachers.timetable');


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