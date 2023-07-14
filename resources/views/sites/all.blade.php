@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title')
    Elenco Sedi
@endsection

@section('page_title', 'Elenco Sedi')


@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item">Sedi</li>
    <li class="breadcrumb-item active" aria-current="page">Elenco Sedi</li>
  </ol>
</nav>
@endsection

@section('body')
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover table-responsive table-bordered">
            <col width="30%"/>
            <col width="40%"/>
            <col width="30%"/>
            <thead>
                <tr>
                    <th>Istituto</th>
                    <th>Indirizzo</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sites_list as $site)
                <tr>
                    <td>
                        {{$site->site_name}}
                    </td>
                    <td>
                        {{$site->street}} 
                        {{$site->number}}, 
                        {{$site->postcode}}, 
                        {{$site->city}} 
                        ({{$site->province}})
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('events.school', $site->id)}}">
                        <i class="bi bi-calendar-event"></i> Calendario</a>
                        <a class="btn btn-primary" href="{{route('school.index', $site->id)}}">
                        <i class="bi bi-person"></i> Docenti</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>                
    </div>
</div>
</div>
@endsection