@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Orario')

@section('page_title')
Orario Prof. {{$teacher->firstname}} {{$teacher->lastname}}
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item">Sedi</li>
    <li class="breadcrumb-item"><a href="{{route(strtolower($site_city).'.index')}}">{{$site_city}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$teacher->firstname}} {{$teacher->lastname}}</li>
  </ol>
</nav>
@endsection

<head>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
</head>

@section('body')
<div class="container">
<div id='timetable'></div>
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/locale/it.js'></script>
<script>
    function decodeHtml(html) {
        var txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }

    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#timetable').fullCalendar({
            // put your options and callbacks here
            initialView: 'timeGridWeek',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'timeGridWeek,timeGridDay'
                },
            events : [
                @foreach($events as $task)
                {
                    title : decodeHtml('{{ $teacher->lastname." ".$teacher->firstname }}'), //class name
                    start : decodeHtml('{{ $task->day_of_week }}'), //start hour
                    url : decodeHtml('{{ route('events.edit', $task->id) }}')
                },
                @endforeach
            ],
            locale: 'it'
        })
    });
</script>

@endsection