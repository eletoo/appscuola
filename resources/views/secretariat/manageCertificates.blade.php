@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Gestisci Certificati Assenze')

@section('page_title', 'Gestisci Certificati Assenze')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('teachers.index')}}">Tutti i Docenti</a></li>
    <li class="breadcrumb-item active" aria-current="page">Gestione Certificati</li>
  </ol>
</nav>
@endsection

@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-10 col-md-12">
            <table class="table table-striped table-hover table-responsive table-bordered">
                <col width="25%"/>
                <col width="25%"/>
                <col width="25%"/>
                <col width="25%"/>

                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Ora</th>
                        <th>Certificato</th>
                        <th>Convalida</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($certificates_list as $certificate)
                        <tr>
                            <td>{{date('d/m/Y', strtotime($certificate->day_of_week))}}</td>
                            <td>{{$certificate->hour_of_schoolday}}</td>
                            <td>
                                @if($certificate->certificate == true)
                                    <a href="{{route('teacher.viewCertificate', $certificate->id)}}" class="btn btn-primary"><i class="bi bi-download"></i> Visualizza</a>
                                @else
                                    <i class="bi bi-circle-fill" style="color: red;"> Nessun Certificato</i>
                                @endif
                            <td>
                                @if($certificate->certificate == true)
                                    @if($certificate->validated == true)
                                        <i class="bi bi-circle-fill" style="color: green;"> Certificato Valido</i>
                                    @else
                                        <form action="{{route('teacher.validateCertificate', $certificate->id)}}" method="post" class="mt-2 mb-1">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success" value="$certificate->id" name="certificate_id"><i class="bi bi-check-lg"></i> Convalida</button>
                                        </form>
                                        <form action="{{route('teacher.invalidateCertificate', $certificate->id)}}" method="post" class="mt-1 mb-2">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger" value="$certificate->id" name="certificate_id" onclick="sendAlertEmail('{{$teacher->email}}')"><i class="bi bi-check-lg"></i> Rifiuta</button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection