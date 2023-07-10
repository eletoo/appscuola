@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Aggiungi Lezione')

@section('page_title', 'Aggiungi Lezione')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    @if($loggedRole=='Segreteria')
        <li class="breadcrumb-item"><a href="{{route('secretariat.home')}}">Area Riservata</a></li>
    @elseif ($loggedRole=='Admin')
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Area Riservata</a></li>
    @endif
    <li class="breadcrumb-item active" aria-current="page">Aggiungi Lezione</li>
  </ol>
</nav>
@endsection

<head>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ url('/') }}/js/checkTimetable.js"></script>
</head>

@section('body')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form name="timetableAdd" method="post" action="/timetable">
    @method('POST')
    @csrf

    <div class="invalid-input" id="invalidDay"></div> 
    <div class="form-group row">
        <label for="day_of_week" class="col-4 col-form-label">Giorno</label> 
        <div class="col-8">
        <select id="day_of_week" name="day_of_week" class="custom-select" aria-describedby="day_of_weekHelpBlock" required="required">
            <option value="" selected>Scegli...</option>
            <option value="Monday">Lunedì</option>
            <option value="Tuesday">Martedì</option>
            <option value="Wednesday">Mercoledì</option>
            <option value="Thursday">Giovedì</option>
            <option value="Friday">Venerdì</option>
            <option value="Saturday">Sabato</option>
        </select> 
        <span id="day_of_weekHelpBlock" class="form-text text-muted">Seleziona il giorno della settimana</span>
        </div>
    </div>

    <div class="invalid-input" id="invalidHour"></div> 
    <div class="form-group row">
        <label class="col-4 col-form-label">Ora della giornata</label> 
        <div class="col-8">
        <div class="custom-controls-stacked">
            <div class="custom-control custom-radio">
            <input name="hour_of_schoolday" id="hour_of_schoolday_0" type="radio" aria-describedby="hour_of_schooldayHelpBlock" class="custom-control-input" value="1" required="required"> 
            <label for="hour_of_schoolday_0" class="custom-control-label">8:00-9:00</label>
            </div>
        </div>
        <div class="custom-controls-stacked">
            <div class="custom-control custom-radio">
            <input name="hour_of_schoolday" id="hour_of_schoolday_1" type="radio" aria-describedby="hour_of_schooldayHelpBlock" class="custom-control-input" value="2" required="required"> 
            <label for="hour_of_schoolday_1" class="custom-control-label">9:00-10:00</label>
            </div>
        </div>
        <div class="custom-controls-stacked">
            <div class="custom-control custom-radio">
            <input name="hour_of_schoolday" id="hour_of_schoolday_2" type="radio" aria-describedby="hour_of_schooldayHelpBlock" class="custom-control-input" value="3" required="required"> 
            <label for="hour_of_schoolday_2" class="custom-control-label">10:00-11:00</label>
            </div>
        </div>
        <div class="custom-controls-stacked">
            <div class="custom-control custom-radio">
            <input name="hour_of_schoolday" id="hour_of_schoolday_3" type="radio" aria-describedby="hour_of_schooldayHelpBlock" required="required" class="custom-control-input" value="4"> 
            <label for="hour_of_schoolday_3" class="custom-control-label">11:00-12:00</label>
            </div>
        </div>
        <div class="custom-controls-stacked">
            <div class="custom-control custom-radio">
            <input name="hour_of_schoolday" id="hour_of_schoolday_4" type="radio" aria-describedby="hour_of_schooldayHelpBlock" required="required" class="custom-control-input" value="5"> 
            <label for="hour_of_schoolday_4" class="custom-control-label">12:00-13:00</label>
            </div>
        </div>
        <div class="custom-controls-stacked">
            <div class="custom-control custom-radio">
            <input name="hour_of_schoolday" id="hour_of_schoolday_5" type="radio" aria-describedby="hour_of_schooldayHelpBlock" required="required" class="custom-control-input" value="6"> 
            <label for="hour_of_schoolday_5" class="custom-control-label">13:00-14:00</label>
            </div>
        </div> 
        <span id="hour_of_schooldayHelpBlock" class="form-text text-muted">Seleziona l'ora della giornata scolastica</span>
        </div>
    </div>

    <div class="invalid-input" id="invalidTeacher"></div> 
    <div class="form-group row">
        <label for="teacher_id" class="col-4 col-form-label">Docente</label> 
        <div class="col-8">
        <select id="teacher_id" name="teacher_id" class="custom-select" aria-describedby="teacher_idHelpBlock" required="required">
            <option value="0" selected>Scegli...</option>
            @foreach($teachers as $teacher)
                <option value="{{$teacher->id}}">{{$teacher->firstname}} {{$teacher->lastname}}</option>
            @endforeach
        </select> 
        <span id="teacher_idHelpBlock" class="form-text text-muted">Seleziona il docente</span>
        </div>
    </div> 

    <div class="invalid-input" id="invalidClass"></div> 
    <div class="form-group row">
        <label for="class" class="col-4 col-form-label">Classe</label> 
        <div class="col-8">
        <input id="class" name="class" placeholder="Classe" type="text" class="form-control" aria-describedby="classHelpBlock" required="required"> 
        <span id="classHelpBlock" class="form-text text-muted">Inserisci la classe</span>
        </div>
    </div> 

    <div class="form-group row">
        <div class="offset-4 col-8">
        <button name="save" type="submit" class="btn btn-primary" onclick="event.preventDefault(); checkTimetable('save')">Crea</button>
        </div>
    </div>
</form>
@endsection