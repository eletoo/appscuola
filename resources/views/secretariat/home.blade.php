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
<div class="row">
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="/timetable/create"><i class="bi bi-calendar-plus"></i> Nuova Lezione</a>
    </div>
</div>
<div class="row">
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('teacher.add')}}"><i class="bi bi-person-add"></i> Nuovo Docente</a>
    </div>
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('teachers.index')}}"><i class="bi bi-person-dash"></i> Rimuovi Docente</a>
    </div>
</div>
<div class="row">
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('teachers.index')}}"><i class="bi bi-journal-medical"></i> Certificati Assenze</a>
    </div>
    <div class="col" align="center">
        <a class="btn btn-lg btn-primary my-3" href="{{route('sites.index')}}"><i class="bi bi-arrow-left-right"></i> Effettua Sostituzioni</a>
    </div>
</div>
<br>
@endsection('buttons')
