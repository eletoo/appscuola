@extends('layouts.master')

@section('title', 'Inserisci Assenza')

@section('style', 'mystyle.css')

@section('page_title', 'Inserisci Assenza')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('teacher.home')}}">Area Riservata</a></li>
    <li class="breadcrumb-item"><a href="{{route('teacher.myAbsences', $loggedID)}}">Assenze</a></li>
    <li class="breadcrumb-item active" aria-current="page">Inserisci Assenza</li>
  </ol>
</nav>
@endsection

<head>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ url('/') }}/js/absenceFields.js"></script>
</head>

@section('body')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form action="{{ route('events.store') }}" method="post" name="absenceForm" id="absenceForm">
    @method('POST')
    @csrf
    <input type="hidden" name="teacher_id" value={{$teacher_id}}>

    <div class="invalid-input" id="invalidDescription"></div> 
    <div class="form-group row">
        <label class="col-4 col-form-label" for="description">Motivazione Assenza</label> 
        <div class="col-8">
            <div class="input-group">
                <input id="description" name="description" placeholder="Motivazione Assenza" type="text" class="form-control" aria-describedby="descriptionHelpBlock">
            </div> 
            <span id="descriptionHelpBlock" class="form-text text-muted">Inserisci le motivazioni della tua assenza</span>
        </div>
    </div>

    <div class="invalid-input" id="invalidDate"></div> 
    <div class="form-group row">
        <label class="col-4 col-form-label" for="day_of_week">Data Assenza</label> 
        <div class="col-8">
            <div class="input-group">
                <input id="day_of_week" name="day_of_week" placeholder="Data Assenza" type="date" class="form-control date" aria-describedby="dateHelpBlock" value="$('#datePicker').val()" data-date-format="dd/mm/yyyy">
            </div> 
            <span id="dateHelpBlock" class="form-text text-muted">Seleziona la data della tua assenza</span>
        </div>
    </div>

    <div class="invalid-input" id="invalidHour"></div> 
    <div class="form-group row">
        <label class="col-4 col-form-label" id="hour_of_schoolday">Ore della giornata</label>
        <div class="col-8">
            <div class="custom-controls-stacked">
                <div class="custom-control custom-checkbox">
                <input name="hour_of_schoolday" id="hour_of_schoolday_1" type="checkbox" class="custom-control-input" value="1" aria-describedby="hour_of_schooldayHelpBlock"> 
                <label for="hour_of_schoolday_1" class="custom-control-label">8:00-9:00</label>
                </div>
            </div>
            <div class="custom-controls-stacked">
                <div class="custom-control custom-checkbox">
                <input name="hour_of_schoolday" id="hour_of_schoolday_2" type="checkbox" class="custom-control-input" value="2" aria-describedby="hour_of_schooldayHelpBlock"> 
                <label for="hour_of_schoolday_2" class="custom-control-label">9:00-10:00</label>
                </div>
            </div>
            <div class="custom-controls-stacked">
                <div class="custom-control custom-checkbox">
                <input name="hour_of_schoolday" id="hour_of_schoolday_3" type="checkbox" class="custom-control-input" value="3" aria-describedby="hour_of_schooldayHelpBlock"> 
                <label for="hour_of_schoolday_3" class="custom-control-label">10:00-11:00</label>
                </div>
            </div>
            <div class="custom-controls-stacked">
                <div class="custom-control custom-checkbox">
                <input name="hour_of_schoolday" id="hour_of_schoolday_4" type="checkbox" class="custom-control-input" value="4" aria-describedby="hour_of_schooldayHelpBlock"> 
                <label for="hour_of_schoolday_4" class="custom-control-label">11:00-12:00</label>
                </div>
            </div>
            <div class="custom-controls-stacked">
                <div class="custom-control custom-checkbox">
                <input name="hour_of_schoolday" id="hour_of_schoolday_5" type="checkbox" class="custom-control-input" value="5" aria-describedby="hour_of_schooldayHelpBlock"> 
                <label for="hour_of_schoolday_5" class="custom-control-label">12:00-13:00</label>
                </div>
            </div>
            <div class="custom-controls-stacked">
                <div class="custom-control custom-checkbox">
                <input name="hour_of_schoolday" id="hour_of_schoolday_6" type="checkbox" class="custom-control-input" value="6" aria-describedby="hour_of_schooldayHelpBlock"> 
                <label for="hour_of_schoolday_6" class="custom-control-label">13:00-14:00</label>
                </div>
            </div> 
            <span id="hour_of_schooldayHelpBlock" class="form-text text-muted">Seleziona almeno una fascia oraria per la tua assenza</span>
        </div>
    </div> 

    <div class="form-group row">
        <div class="offset-4 col-8">
            <button type="submit" value="save" class="btn btn-primary" onclick="event.preventDefault(); checkAbsenceFields('save')">Crea</button>
        </div>
    </div>
</form>
@endsection