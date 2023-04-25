@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Tutti i Docenti')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tutti i Docenti</li>
  </ol>
</nav>
@endsection

@section('body')
<div class="row">
        <div class="col-md-offset-10 col-md-12">
            <div class="input-group">            
                <input type="search" class="form-control rounded" placeholder="Cerca" aria-label="Search"
                    aria-describedby="search-addon" />
                <button type="button" class="btn btn-primary">Cerca</button>
            </div>
        </div>
    </div>
        

    <div class="row ">
        <div class="col-md-12">
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
                    @foreach($lista_docenti as $doc)
                        <tr>
                            <td>{{$doc->lastname}}</td>
                            <td>{{$doc->firstname}}</td>
                            <td><a class="btn btn-primary" href="#">Orario</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection