@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Tutti i Docenti')

@section('page_title', 'Tutti i Docenti')


@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tutti i Docenti</li>
  </ol>
</nav>
@endsection

<script src="{{ url('/') }}/js/confirmDeleteTeacher.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-10 col-md-12">
            <table class="table table-striped table-hover table-responsive table-bordered">
                <col width="25%"/>
                <col width="25%"/>
                <col width="25%"/>
                <col width="25%"/>
                <thead>
                    <tr>
                        <th>Cognome</th>
                        <th>Nome</th>
                        <th>Sede</th>
                        <th>Azioni</th>                            
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers_list as $teacher)
                        <tr>
                            <td>{{$teacher->lastname}}</td>
                            <td>{{$teacher->firstname}}</td>
                            @foreach($sites_list as $site)
                                @if($site->id == $teacher->site_id)
                                    <td>{{$site->city}}</td>
                                @endif
                            @endforeach
                            <td>
                                <a class="btn btn-primary" href="{{route('teachers.timetable', $teacher->id)}}"><i class="bi bi-clock"></i> Orario</a>
                                @if($logged && ($loggedRole == 'Admin' || $loggedRole == 'Segreteria'))
                                    <br></br>
                                    <a class="btn btn-primary" href="{{route('teacher.manageCertificates', $teacher->id)}}"><i class="bi bi-journal"></i> Certificati</a>
                                    
                                    <br></br>
                                    
                                    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{$teacher->id}}')"><i class="bi bi-person-dash"></i> Elimina</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Attenzione</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Sei sicuro di voler eliminare il docente?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close-modal" data-bs-dismiss="modal">Annulla</button>
                <button class="btn btn-danger" id="delete"><i class="bi bi-person-dash"></i> Elimina</button>
            </div>
        </div>
    </div>
</div>

@endsection

