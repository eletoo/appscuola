@extends('layouts.master')

@section('style','mystyle.css')

@section('title')
Assenza {{$teacher->lastname}}
@endsection

@section('page_title')
Assenza Prof. {{$teacher->firstname}} {{$teacher->lastname}} del {{date("d-m-Y", strtotime($event->day_of_week))}}
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item">Sedi</li>
        <li class="breadcrumb-item"><a href="{{route('sites.index')}}">Elenco Sedi</a></li>
        <li class="breadcrumb-item"><a href="{{route(strtolower($site->city).'.index')}}">{{$site->city}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('events.school', $site->id)}}">Calendario Assenze</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$teacher->firstname}} {{$teacher->lastname}}</li>
    </ol>
</nav>
@endsection

@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-10 col-md-12">
            <table class="table table-striped table-hover table-responsive table-bordered">
                <col width="30%"/>
                <col width="70%"/>
                <tbody>
                    <tr>
                        <td><b>Data</b></td>
                        <td>{{date("d-m-Y", strtotime($event->day_of_week))}}</td>
                    </tr>
                    <tr>
                        <td><b>Ora</b></td>
                        @if($event->hour_of_schoolday==1)
                            <td>8:00-9:00</td>
                        @elseif($event->hour_of_schoolday==2)
                            <td>9:00-10:00</td>
                        @elseif($event->hour_of_schoolday==3)
                            <td>10:00-11:00</td>
                        @elseif($event->hour_of_schoolday==4)
                            <td>11:00-12:00</td>
                        @elseif($event->hour_of_schoolday==5)
                            <td>12:00-13:00</td>
                        @elseif($event->hour_of_schoolday==6)
                            <td>13:00-14:00</td>
                        @else
                            <td>Orario extra-scolastico</td>
                        @endif
                    </tr>
                    <tr>
                        <td><b>Descrizione</b></td>
                        <td>{{$event->description}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        @if($in_class)
			<a class="btn btn-primary btn-lg d-flex justify-content-center mx-auto my-2 my-md-4" href="{{route('teachers.substitute', [ 'teacher_id' => $teacher->id, 'event_id' => $event->id])}}">
            <i class="bi bi-arrow-left-right"></i> &nbsp; Sostituisci Docente Assente
			</a>
        @else 
        <div class="text-align-center my-md-5 my-3">
            Il Docente non necessita di essere sostituito in quanto non impegnato con alcuna classe in quest'ora. 
        </div>
        @endif
    </div>
</div>
@endsection