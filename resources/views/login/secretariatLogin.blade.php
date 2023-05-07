@extends('layouts.master')

@section('title', 'Login Segreteria')

@section('page_title', "Accedi all'Area Riservata Segreteria")

@section('style', 'mystyle.css')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Login Segreteria</li>
  </ol>
</nav>
@endsection

@section('body')
<div class="container-fluid">
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <form>
        <div class="form-group">
          <label for="inputEmailSecretariat">Email Segreteria Istituto</label>
          <input type="email" class="form-control" id="inputEmailSecretariat" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="inputPasswordSecretariat">Password</label>
          <input type="password" class="form-control" id="inputPasswordSecretariat" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Accedi</button>
      </form>
    </div>
  </div>
</div>
@endsection