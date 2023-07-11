@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Le Mie Supplenze')

@section('page_title', 'Le Mie Supplenze')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('teacher.home')}}">Area Riservata</a></li>
    <li class="breadcrumb-item active" aria-current="page">Supplenze</li>
  </ol>
</nav>
@endsection

@section('body')

@if($substitutions_list->count() == 0)
<div class="col-md-offset-10 col-md-12 my-5" style="font-size: large;">
    Non hai supplenze da effettuare.
</div>
@else
<div class="container-fluid">
    <div class="col-md-offset-10 col-md-12">
        <div class="row my-5" style="font-size: large;">
            Queste sono le ore in cui dovrai sostituire un collega:
        </div> 
        <div class="row">
            <table class="table table-striped table-hover table-responsive table-bordered">
                <col width="25%"/>
                <col width="25%"/>
                <col width="25%"/>
                <thead>
                    <tr>
                        <th>Giorno</th>
                        <th>Ora</th>
                        <th>Docente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($substitutions_list as $substitution)
                        <tr>
                            <td>{{date('d/m/Y', strtotime($substitution->day_of_week))}}</td>
                            <td>{{$substitution->hour_of_schoolday}}</td>
                            <td>{{$teachers_list->get($substitution->teacher_id)->firstname}} {{$teachers_list->get($substitution->teacher_id)->lastname}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection