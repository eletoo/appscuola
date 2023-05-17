@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Le Mie Assenze')

@section('page_title', 'Le Mie Assenze')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('teacher.home')}}">Area Riservata</a></li>
    <li class="breadcrumb-item active" aria-current="page">Assenze</li>
  </ol>
</nav>
@endsection

@section('body')
<div class="container-fluid">
    @if($absences_list->count() == 0)
        <div class="col-md-offset-10 col-md-12 my-5" style="font-size: large;">
            Non hai assenze da gestire.
        </div>
    @else
        <div class="col-md-offset-10 col-md-12">
            <div class="row my-5" style="font-size: large;">
                Assenze da gestire:
            </div> 
            <div class="row">
                <table class="table table-striped table-hover table-responsive table-bordered">
                    <col width="40%"/>
                    <col width="40%"/>
                    <col width="10%"/>
                    <col width="10%"/>
                    <thead>
                        <tr>
                            <th>Giorno</th>
                            <th>Ora</th>
                            <th>Azioni</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absences_list as $absence)
                            <tr>
                                <td>{{$absence->day_of_week}}</td>
                                <td>{{$absence->hour_of_schoolday}}</td>
                                <td>
                                    <form class="form-horizontal" name="certificate" method="post" action="/api/certificate" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="absence_id" value="{{$absence->id}}"/>
                                        <input type="file" name="Certificate" onChange="document.getElementById('loadCertificate-{{$absence->id}}').style.display='block'"
                                        @if($absence->certificate != null)
                                            style="display:none"
                                        @endif
                                        />
                                        <button class="btn btn-primary my-2" style="display: none" id="loadCertificate-{{$absence->id}}" type="submit" value=" Carica Certificato" class="hidden"><i class="bi bi-eye"></i> Carica Certificato</button>
                                    </form>
                                </td>
                                <td>
                                    @if($absence->certificate == null) <!-- TODO -->
                                        <i class="bi bi-circle-fill" style="color: red;" > Carica Certificato </i>
                                    @else
                                        <i class="bi bi-circle-fill" style="color: green;"> Situazione Regolare</i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection