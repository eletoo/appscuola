@extends('layouts.personalArea')

@section('buttons')

@if(@isset($success))
    <div class="alert alert-success" role="alert">
        {{$success}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('home', ['teacher_id' => $loggedID])}}"><i class="bi bi-clock"></i> Registra Nuovo Docente</a>
    </div>
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('home', ['teacher_id' => $loggedID])}}"><i class="bi bi-journal-medical"></i> Gestisci Certificati Assenze</a>
    </div>
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('home', ['teacher_id' => $loggedID])}}"><i class="bi bi-arrow-left-right"></i> Effettua Sostituzioni</a>
    </div>
</div>
@endsection