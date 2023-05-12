@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title')
    Informazioni Lezione
@endsection

@section('page_title')
    Informazioni Lezione
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item">Sedi</li>
    <li class="breadcrumb-item"><a href="{{route('sites.index')}}">Elenco Sedi</a></li>
    <li class="breadcrumb-item"><a href="{{route(strtolower($site_city).'.index')}}">{{$site_city}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('teachers.timetable', $teacher->id)}}">{{$teacher->firstname}} {{$teacher->lastname}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Informazioni</li>
  </ol>
</nav>
@endsection

@section('body')
<div class="container-fluid">
    <div class="row" style="margin-top: 5em;">
        <div class="col" style="border: 3px solid #7b99c4; padding-left: 3em; font-size: larger; display: flex;  align-items: center;">
            Prof. {{$teacher->firstname}} {{$teacher->lastname}}
            <br></br>
            @if($timetable->class==null)
                Orario di Ricevimento
            @else   
                Lezione con la classe {{strtoupper($timetable->class)}}
            @endif
        </div>
        <div class="col-md">
            <figure>
                <img src="/img/views/teacher.jpg" alt="teacher in class" width="100%">
                <figcaption>
                <i>
                    <a style="font-size: small" href="https://www.freepik.com/free-vector/teacher-standing-near-blackboard-holding-stick-isolated-flat-vector-illustration-cartoon-woman-character-near-chalkboard-pointing-alphabet_10173643.htm#query=teacher&position=0&from_view=search&track=sph">
                        Image by pch.vector on Freepik
                    </a> 
                </i>
                </figcaption>
            </figure>
        </div>
    </div>
</div>
@endsection