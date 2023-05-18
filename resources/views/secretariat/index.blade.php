@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Tutti i Segretari')

@section('page_title', 'Tutti i Segretari')


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
                                <form action="{{route('secretary.destroy', $secretary->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary" value="$secretary->id" name="secretary_id"><i class="bi bi-person-dash"></i> Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection