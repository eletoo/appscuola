<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PersonaleController;
use App\Http\Controllers\SediController;
use Illuminate\Support\Facades\Route;

/*Home*/
Route::get('/', [MainController::class, 'getHome'])->name('home');

/*Personale*/
Route::get('/personale/docenti', [PersonaleController::class, 'docenti'])->name('docenti.index');

/*Sedi*/
Route::get('/sede/tutte', [SediController::class, 'index'])->name('sedi.index');
Route::get('/sede/brescia', [SediController::class, 'brescia'])->name('brescia.index');
Route::get('/sede/bergamo', [SediController::class, 'bergamo'])->name('bergamo.index');
Route::get('/sede/milano', [SediController::class, 'milano'])->name('milano.index');