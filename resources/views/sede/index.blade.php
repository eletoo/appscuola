@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title')
  {{$info_sede->nome_sede}}
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item">Sedi</li>
    <li class="breadcrumb-item active" aria-current="page">{{$info_sede->nome_sede}}</li>
  </ol>
</nav>
@endsection

@section('body')
<div class="row">
    <!--TEXT-->
    <div class="col-sm-9 col-md-6">
        <p>
            Informazioni generali
            <br></br>
            {{$info_sede->nome_sede}}
            <br></br>
            {{$info_sede->via}} 
            {{$info_sede->civico}}, 
            {{$info_sede->CAP}}, 
            {{$info_sede->citta}} 
            ({{$info_sede->provincia}})
            <br></br>
        </p>
        
    </div>
</div>
@endsection