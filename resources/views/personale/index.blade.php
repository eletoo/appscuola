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
    <div class="container">
        <div class="instructions">
            Filtra per:
        </div>
    </div>
    <div class="TODO">TODO: filtra per disponibilità</div>    
</div>    

<div class="container">
    <div class="row">
        <div class="col-md-offset-10 col-md-12">
            <div>
                <div class="form-group">
                    <label for="SedeField">Sede</label>
                    <select class="form-select" id="SedeField" name="sedefield">
                        @foreach($lista_sedi as $sede)
                            <option value="{{$sede->id}}">{{$sede->citta}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="SedeField">Disponibilità</label>
                    <select class="form-select" id="SedeField" name="sedefield">
                        @foreach($lista_sedi as $sede)
                            <option value="{{$sede->id}}">{{$sede->citta}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <table class="table table-striped table-hover table-responsive table-bordered">
                <col width="45%"/>
                <col width="45%"/>
                <col width="10%"/>
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
                            <td><a class="btn btn-primary" href="#"><i class="bi bi-clock"></i> Orario</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection