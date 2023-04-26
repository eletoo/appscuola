@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title')
    Elenco Sedi
@endsection

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
<div class="container">
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
                @foreach($lista_sedi as $sede)
                <tr>
                    <td>
                        {{$sede->nome_sede}}
                    </td>
                    <td>
                        {{$sede->via}} 
                        {{$sede->civico}}, 
                        {{$sede->CAP}}, 
                        {{$sede->citta}} 
                        ({{$sede->provincia}})
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary">
                            <a href="#">
                            <i class="bi bi-calendar-event"></i> Calendario</a></button>
                        <button type="button" class="btn btn-primary">
                            <a href="{{route(strtolower($sede->citta).'.index')}}">
                            <i class="bi bi-person"></i> Docenti</a></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>                
    </div>
</div>
</div>
@endsection