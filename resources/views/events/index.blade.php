@extends('layouts.master')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>

@section('title', 'Calendario')

@section('page_title', 'Calendario Istituti')

@section('body')
<div class="container-fluid">
<div id='calendario'></div>
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/locale/it.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendario').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($eventi as $evento)
                {
                    title : '{{ $evento->docente->nome }}',
                    start : '{{ $evento->data_evento }}',
                    url : '{{ route('eventi.edit', $evento->id) }}'
                },
                @endforeach
            ],
            locale : 'it'
        });
    });
</script>
@endsection