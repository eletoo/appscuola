@extends('layouts.personalArea')

@section('buttons')
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
@endsection