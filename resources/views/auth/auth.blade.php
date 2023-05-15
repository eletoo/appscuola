@extends('layouts.master')

@section('title', 'Login Docenti')

@section('page_title')
    @if($employee_type == 'Docente')
        Accedi alla tua Area Riservata Docenti
    @elseif($employee_type == 'Segreteria')
        Accedi alla tua Area Riservata Segreteria
    @endif
@endsection

@section('style', 'mystyle.css')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    @if($employee_type == 'docenti')
        <li class="breadcrumb-item active" aria-current="page">Login Docenti</li>
    @elseif($employee_type == 'segreteria')
        <li class="breadcrumb-item active" aria-current="page">Login Segreteria</li>
    @endif
  </ol>
</nav>
@endsection

@section('body')
<div class="row d-flex justify-content-center align-items-center" style="margin-top: 4em">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab" tabindex="0">
                @isset($error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Attenzione!</strong> {{$error}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form id="login-form" action="{{ route('user.login', $employee_type) }}" method="post" style="margin-top: 2em">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username"/>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>

                    <a href="{{ route('home') }}" class="btn btn-secondary"><i class="bi-box-arrow-left"></i> Indietro</a>
                    <button type="submit" class="btn btn-primary"><i class="bi-check-lg"></i> Accedi</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection