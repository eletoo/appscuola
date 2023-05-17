@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Area Riservata')
    
@section('page_title')
 Benvenuto nella tua Area Riservata, {{$loggedName}}
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Area Riservata</li>
  </ol>
</nav>
@endsection

@section('body')
<div class="container-fluid">
    <div class="col" style="font-size: large;">
        <div class="row my-5">
            Da questa pagina puoi accedere alle funzionalità riservate del tuo ruolo.
            <br/>
            <br/>
            Seleziona una delle seguenti opzioni:
        </div>          
        <div class="row">
            <div class="col" align="center">
                <a class="btn btn-lg btn-primary my-3" href="{{route('teachers.timetable', ['teacher_id' => $loggedID])}}"><i class="bi bi-clock"></i> Il Mio Orario</a>
            </div>
            <div class="col" align="center">
                <a class="btn btn-lg btn-primary my-3" href="{{route('teacher.mySubstitutions', ['teacher_id' => $loggedID])}}"><i class="bi bi-journal"></i> Le Mie Supplenze</a>
            </div>
            <div class="col" align="center">
                <a class="btn btn-lg btn-primary my-3" href="{{route('teacher.myAbsences', ['teacher_id' => $loggedID])}}"><i class="bi bi-journal-medical"></i> Le Mie Assenze</a>
            </div>
        </div>      
    </div>
</div>
@endsection    