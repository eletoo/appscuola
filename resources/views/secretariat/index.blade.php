@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Tutti i Segretari')

@section('page_title', 'Tutti i Segretari')

<script src="{{ url('/') }}/js/confirmDeleteTeacher.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Area Riservata</a></li>
    <li class="breadcrumb-item active" aria-current="page">Rimuovi Segretario</li>
  </ol>
</nav>
@endsection

@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-10 col-md-12">
            <table class="table table-striped table-hover table-responsive table-bordered">
                <col width="40%"/>
                <col width="40%"/>
                <col width="20%"/>
                <thead>
                    <tr>
                        <th>Cognome</th>
                        <th>Nome</th>
                        <th>Azioni</th>                            
                    </tr>
                </thead>
                <tbody>
                    @foreach($secretaries_list as $secretary)
                        <tr>
                            <td>{{$secretary->lastname}}</td>
                            <td>{{$secretary->firstname}}</td>

                            <td>
                                <button type="button" class="btn btn-danger" onclick="confirmDelete('{{$secretary->id}},false')"><i class="bi bi-person-dash"></i> Elimina</button>
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
                <p>Sei sicuro di voler eliminare il segretario?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close-modal" data-bs-dismiss="modal">Annulla</button>
                <button class="btn btn-danger" id="delete"><i class="bi bi-person-dash"></i> Elimina</button>
            </div>
        </div>
    </div>
</div>

@endsection