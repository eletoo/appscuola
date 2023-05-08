@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Calendario Assenze - Tutti')

@section('page_title', 'Calendario Assenze Docenti - Tutti gli Istituti')

<head>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
</head>

@section('body')
<div class="container">
<div id='calendar'></div>
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
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($events as $task)
                {
                    title : decodeHtml('{{ $teachers_list->where('id',$task->teacher_id)->first()->lastname." ".$teachers_list->where('id',$task->teacher_id)->first()->firstname }}'),
                    start : decodeHtml('{{ $task->day_of_week }}'),
                    url : decodeHtml('{{ route('events.show', $task->id) }}')
                },
                @endforeach
            ],
            locale: 'it'
        })
    });
</script>

@endsection