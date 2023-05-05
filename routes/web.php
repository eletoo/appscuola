<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\SitesController;
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

/*Sites*/
Route::get('/sede/tutte', [SitesController::class, 'index'])->name('sites.index');
Route::get('/sede/brescia', [SitesController::class, 'brescia'])->name('brescia.index');
Route::get('/sede/bergamo', [SitesController::class, 'bergamo'])->name('bergamo.index');
Route::get('/sede/milano', [SitesController::class, 'milano'])->name('milano.index');

/*Events*/
Route::resource('events', EventController::class);
