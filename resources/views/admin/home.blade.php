@extends('layouts.personalArea')

@section('success_or_fail')
    @isset($success)
    <div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="alert alert-success alert-dismissible">
            {{$success}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    </div>
    @endif
@endsection

@section('buttons')
<div class="row my-3">
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('secretary.add', ['teacher_id' => $loggedID])}}"><i class="bi bi-person-add"></i> Registra Nuovo Segretario</a>
    </div>
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('home', ['teacher_id' => $loggedID])}}"><i class="bi bi-person-dash"></i> Rimuovi Segretario</a>
    </div>
</div>
<div class="row my-3">
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('teacher.add', ['teacher_id' => $loggedID])}}"><i class="bi bi-person-add"></i> Registra Nuovo Docente</a>
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