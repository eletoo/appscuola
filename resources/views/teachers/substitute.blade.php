@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Sostituzione')

@section('page_title')
Sostituzione 
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item">Sedi</li>
        <li class="breadcrumb-item"><a href="{{route('sites.index')}}">Elenco Sedi</a></li>
        <li class="breadcrumb-item"><a href="{{route('school.index', $site->id)}}">{{$site->city}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('events.school', $site->id)}}">Calendario Assenze</a></li>
        <li class="breadcrumb-item"><a href="{{route('events.show', $event->id)}}">{{$teacher->firstname}} {{$teacher->lastname}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sostituzione</li>
    </ol>
</nav>
@endsection

@section('body')
<div class="container-fluid">
    <div class="row">
        @if(sizeof($available_teachers)==0)
            <div class="text-align-center my-md-5 my-3">
                Non ci sono docenti disponibili per la sostituzione
            </div>
            <a href="{{route('events.school', $site->id)}}" class="btn btn-primary btn-lg d-flex justify-content-center mx-auto my-2 my-md-4">
            <i class="bi bi-chevron-left"></i> Torna al Calendario
            </a>
        @else
        <a href="{{route('events.school', $site->id)}}" class="btn btn-primary btn-lg d-flex justify-content-center mx-auto my-2 my-md-4">
        <i class="bi bi-chevron-left"></i> Torna al Calendario
        </a>
        <div class="col-md-offset-10 col-md-12">
            <table class="table table-striped table-hover table-responsive table-bordered">
                <col width="80%"/>
                <col width="20%"/>
                <thead>
                    <td><b>Docenti Disponibili</b></td>
                    <td><b>Opzioni</b></td>
                </thead>
                <tbody>
                    
                    @foreach($available_teachers as $available_teacher)
                    <tr>
                        <td>{{$available_teacher->lastname}} {{$available_teacher->firstname}}</td>
                        <td>
                            <form class="form-horizontal" name="substitute" method="post" action="{{ route('events.update', ['event' => $event->id]) }}">
                                @method('PUT')
                                @csrf
                                <button class="btn btn-primary" id="selectSubstitute" type="submit" value=" Seleziona" class="hidden"><i class="bi-check-lg"></i> Seleziona</button>
                                <input id="selectSubstitute" type="hidden" value="{{$available_teacher->id}}" name="substitute_id"/>
                                <input id="city" type="hidden" value="{{$site->city}}" name="city"/>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection