@extends('layouts.master')

@section('title', 'Calendario Assenze - Tutti')

@section('page_title', 'Calendario Assenze Docenti - Tutti gli Istituti')

<head>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

@section('body')
<div class="container">
<div id='calendar'></div>
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/locale/it.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($events as $task)
                {
                    title : '{{ $teachers_list->where('id',$task->teacher_id)->first()->lastname." ".$teachers_list->where('id',$task->teacher_id)->first()->firstname }}',
                    start : '{{ $task->day_of_week }}',
                    url : '{{ route('events.edit', $task->id) }}'
                },
                @endforeach
            ],
            locale: 'it'
        })
    });
</script>
</head>
@endsection