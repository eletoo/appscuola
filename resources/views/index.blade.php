@extends('layouts.master')

@section('title','Calendario Liceo "G. Leopardi"')

@section('style', 'mystyle.css')

@section('body')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <button type="button" class="btn btn-primary home-page-button">
                <a href="#">
                    <i class="bi bi-calendar-event"></i> 
                    <br/>Calendari Scuole
                </a>
            </button>
            <button type="button" class="btn btn-primary home-page-button">
                <a href="#">
                    <i class="bi bi-person"></i> 
                    <br/>Area Riservata Docenti
                </a>
            </button>
            <button type="button" class="btn btn-primary home-page-button">
                <a href="#">
                    <i class="bi bi-person"></i> 
                    <br/>Area Riservata Segreteria 
                </a>
            </button>
        </div>            
                        
    </div>
</div>
</div>
@endsection