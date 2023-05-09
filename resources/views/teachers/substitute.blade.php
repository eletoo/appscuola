@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Sostituzione')

@section('page_title')
Sostituzione 
@endsection

@section('breadcrumb')
<!--TODO-->
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
                        <td class="TODO">BOTTONE SELEZIONA</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection