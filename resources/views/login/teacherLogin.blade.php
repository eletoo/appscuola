@extends('layouts.master')

@section('title', 'Login Docenti')

@section('page_title', 'Accedi alla tua Area Riservata Docenti')

@section('style', 'mystyle.css')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Login Docenti</li>
  </ol>
</nav>
@endsection

@section('body')
<div class="container-fluid">
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <form>
        <div class="form-group">
          <label for="inputEmailTeacher">Email Istituzionale</label>
          <input type="email" class="form-control" id="inputEmailTeacher" aria-describedby="emailHelp" placeholder="Email">
          <small id="emailHelp" class="form-text text-muted">Inserisci la tua Email istituzionale</small>
        </div>
        <div class="form-group">
          <label for="inputPasswordTeacher">Password</label>
          <input type="password" class="form-control" id="inputPasswordTeacher" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Accedi</button>
      </form>
    </div>
  </div>
</div>
@endsection