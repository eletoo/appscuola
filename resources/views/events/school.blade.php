@extends('layouts.master')

@section('style','mystyle.css')

@section('title')
Calendario Assenze - {{$site->city}}
@endsection

@section('page_title')
Calendario Assenze - {{$site->city}}
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item">Sedi</li>
    <li class="breadcrumb-item"><a href="{{route('sites.index')}}">Elenco Sedi</a></li>
    <li class="breadcrumb-item"><a href="{{route(strtolower($site->city).'.index')}}">{{$site->city}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Calendario Assenze</li>
  </ol>
</nav>
@endsection


<head>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>
</head>

@section('body')
<div class="container">
<div id='calendar'></div>
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/locale/it.js'></script>
@include('layouts.calendar', ['events'=> $events, 'teachers_list' => $teachers_list])
@endsection