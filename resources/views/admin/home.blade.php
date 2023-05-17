@extends('layouts.personalArea')

@section('buttons')
<div class="row my-3">
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('home', ['teacher_id' => $loggedID])}}"><i class="bi bi-person-add"></i> Registra Nuovo Segretario</a>
    </div>
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('home', ['teacher_id' => $loggedID])}}"><i class="bi bi-person-dash"></i> Rimuovi Segretario</a>
    </div>
</div>
<div class="row my-3">
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('home', ['teacher_id' => $loggedID])}}"><i class="bi bi-person-add"></i> Registra Nuovo Docente</a>
    </div>
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('home', ['teacher_id' => $loggedID])}}"><i class="bi bi-person-dash"></i> Rimuovi Docente</a>
    </div>
</div>
<div class="row my-3">
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('home', ['teacher_id' => $loggedID])}}"><i class="bi bi-building-add"></i> Registra Nuova Sede</a>
    </div>
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('home', ['teacher_id' => $loggedID])}}"><i class="bi bi-building-add"></i> Rimuovi Sede</a>
    </div>
</div>
@endsection