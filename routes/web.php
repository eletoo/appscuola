<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\SitesController;
use Illuminate\Support\Facades\Route;

/*Home*/
Route::get('/', [MainController::class, 'getHome'])->name('home');

/*Personale*/
Route::get('/personale/docenti', [TeachersController::class, 'teachers'])->name('teachers.index');

/*Sedi*/
Route::get('/sede/tutte', [SitesController::class, 'index'])->name('sites.index');
Route::get('/sede/brescia', [SitesController::class, 'brescia'])->name('brescia.index');
Route::get('/sede/bergamo', [SitesController::class, 'bergamo'])->name('bergamo.index');
Route::get('/sede/milano', [SitesController::class, 'milano'])->name('milano.index');

/*Login*/
Route::get('/personale/loginDocenti', [TeachersController::class,'teachersLogin'])->name('teachers.teacherLogin');
Route::get('/personale/loginSegreteria', [TeachersController::class,'secretariatLogin'])->name('teachers.secretariatLogin');

/*Eventi*/
Route::resource('events', EventController::class);