@extends('layouts.master')

@section('style','mystyle.css')

@section('title')
Assenza {{$teacher->lastname}}
@endsection

@section('page_title')
Assenza Prof. {{$teacher->firstname}} {{$teacher->lastname}}
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item">Sedi</li>
    <li class="breadcrumb-item"><a href="{{route('sites.index')}}">Elenco Sedi</a></li>
    <li class="breadcrumb-item"><a href="{{route(strtolower($site_city).'.index')}}">{{$site_city}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$teacher->firstname}} {{$teacher->lastname}}</li>
  </ol>
</nav>
@endsection

@section('body')
@endsection