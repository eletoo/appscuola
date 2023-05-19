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
        <a class="btn btn-lg btn-primary my-3" href="{{route('teacher.add')}}"><i class="bi bi-person-add"></i> Nuovo Docente</a>
    </div>
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('teachers.index')}}"><i class="bi bi-person-dash"></i> Rimuovi Docente</a>
    </div>
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('teachers.index')}}"><i class="bi bi-journal-medical"></i> Certificati Assenze</a>
    </div>
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('sites.index')}}"><i class="bi bi-arrow-left-right"></i> Effettua Sostituzioni</a>
    </div>
</div>
@endsection