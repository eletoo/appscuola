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
                                    <form class="form-horizontal" name="delete" method="post" action="{{ route('teacher.destroy', $teacher->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-primary" id="delete" type="submit" value=" Elimina" class="hidden"><i class="bi bi-trash"></i> Elimina</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection