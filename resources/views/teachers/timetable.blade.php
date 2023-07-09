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
    <li class="breadcrumb-item"><a href="{{route('sites.index')}}">Elenco Sedi</a></li>
    <li class="breadcrumb-item"><a href="{{route(strtolower($site_city).'.index')}}">{{$site_city}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$teacher->firstname}} {{$teacher->lastname}}</li>
  </ol>
</nav>
@endsection

<head>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.3/jquery-ui.css' rel='stylesheet' />

</head>

@section('body')
<?php
    function retrieveTime(int $index, bool $start){
        if ($start){
            return intval($index) + 9;
        }
        else{
            return intval($index) + 10; 
        }
    }

    function retrieveDayIndex(string $day){
        return date('N', strtotime($day));
    }
?>
<div class="container">
<div id='timetable'></div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Informazioni Lezione</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="modalBody">
                 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
        </div>
        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/locale/it.js'></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.9.0/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    function decodeHtml(html) {
        var txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }

    var getNextDay = function (dayName, hour, mins, sec) {
        // The current day
        var date = new Date();
        var now = date.getDay();

        // Days of the week
        var days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];

        // The index for the day you want
        var day = days.indexOf(dayName.toLowerCase());

        // Find the difference between the current day and the one you want
        // If it's the same day as today (or a negative number), jump to the next week
        var diff = day - now;
        /*while (diff < 1){
            diff = diff < 1 ? 7 + diff : diff;
        }*/

        // Get the timestamp for the desired day
        var dayTimestamp = date.getTime() + (1000 * 60 * 60 * 24 * diff);

        // Get the next day
        const d = new Date(dayTimestamp);
        d.setHours(hour, mins, sec)
        return d
    };

    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#timetable').fullCalendar({
            // put your options and callbacks here
            defaultView: 'agendaWeek',
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'agendaWeek,agendaDay' // user can switch between the two
            },
            minTime: "07:30:00",
            maxTime: "16:30:00",
            slotDuration: "00:30:00",
            defaultTimedEventDuration: '01:00',
            events : [
                @foreach($lectures as $task)
                {
                    title : decodeHtml('{{strtoupper($task->class)}}'), //class name
                    start : getNextDay('{{$task->day_of_week}}', {{retrieveTime($task->hour_of_schoolday, true)}}, 0, 0).toISOString(), //start hour: number from 1 to 6 turned into a time from 8 to 14
                    //end : getNextDay('{{$task->day_of_week}}', {{retrieveTime($task->hour_of_schoolday, false)}}, 0, 0).toISOString(),
                    url   : "#",
                },
                @endforeach
            ],
            locale: 'it',
            eventClick: function(entry){
                // opens event information in modal window
                // first and last name of the teacher
                // class name (if it's a lesson), else "Orario di Ricevimento"
                const class_name = entry.title == "" ? "Orario di Ricevimento" : "Lezione con la classe " + entry.title;
                $("#modalBody").html("Prof. {{$teacher->firstname}} {{$teacher->lastname}}<br></br> " + class_name);

                $("#myModal").modal("show");
            },
        })
    });
</script>

@endsection