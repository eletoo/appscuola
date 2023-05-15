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
        <li class="breadcrumb-item"><a href="{{route(strtolower($city).'.index')}}">{{$city}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('events.school', $city)}}">Calendario Assenze</a></li>
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
        @else
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
                            <a href="#" class="btn btn-primary btn-lg d-flex justify-content-center mx-auto my-2 my-md-4">
                                <!--TODO-->
                                Seleziona
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        <a href="{{route('events.school', $city)}}" class="btn btn-primary btn-lg d-flex justify-content-center mx-auto my-2 my-md-4">
            Torna al Calendario
        </a>
    </div>
</div>
@endsection