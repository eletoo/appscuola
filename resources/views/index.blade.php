@extends('layouts.master')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>

@section('title', 'Home')

@section('style', 'mystyle.css')

@section('body')
<div class="container-fluid">
    
<!--CAROUSEL-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<div id="homepageCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#homepageCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#homepageCarousel" data-slide-to="1"></li>
        <li data-target="#homepageCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="{{route('school.index',2)}}">
                <img class="d-block w-100" src="{{url('/img/carousel/bergamo.jpg')}}" alt="Bergamo">
            </a>
            <div class="carousel-caption d-none d-md-block">
                <h5>Bergamo</h5>
            </div>
        </div>
        <div class="carousel-item">
            <a href="{{route('school.index',1)}}">
                <img class="d-block w-100" src="{{url('/img/carousel/brescia.jpg')}}" alt="Brescia">
            </a>
            <div class="carousel-caption d-none d-md-block">
                <h5>Brescia</h5>
            </div>
        </div>
        <div class="carousel-item">
            <a href="{{route('school.index',3)}}">
                <img class="d-block w-100" src="{{url('/img/carousel/milano.jpg')}}" alt="Milano">
            </a>
            <div class="carousel-caption d-none d-md-block">
                <h5>Milano</h5>
            </div>
        </div>
    </div>
    
    <a class="carousel-control-prev" href="#homepageCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#homepageCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>

<!--BOTTONI-->
<div class="row">
    <div class="col-md-12">
        <div class="text-center d-flex flex-column flex-md-row justify-content-md-around">
            <a class="btn btn-primary home-page-button my-3 my-md-4" href="{{route('events.index')}}">
                <i class="bi bi-calendar-event"></i> 
                <br/>Tutti i Calendari Assenze
            </a>
            <a class="btn btn-primary home-page-button my-3 my-md-4" href="{{route('user.login', 'Docente')}}">
                <i class="bi bi-person"></i> 
                <br/>Area Riservata Docenti
            </a>
            <a class="btn btn-primary home-page-button my-3 my-md-4" href="{{route('user.login', 'Segreteria')}}">
                <i class="bi bi-person"></i> 
                <br/>Area Riservata Segreteria 
            </a>
        </div>            
                        
    </div>
</div>

</div>
@endsection