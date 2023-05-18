@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Registra Nuova Sede')

@section('page_title', 'Registra Nuova Sede')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Area Riservata</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuova Sede</li>
  </ol>
</nav>
@endsection

@section('body')
<form action="{{ route('site.store') }}" method="post">
    @method('POST')
    @csrf

    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Informazioni Nuova Sede</h3>

                    <form class="px-md-2">

                    <div class="form-outline mb-4">
                        <input type="text" name="site_name" class="form-control" />
                        <label class="form-label" for="site_name">Nome Istituto</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" name="street" class="form-control" />
                        <label class="form-label" for="street">Via</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" name="number" class="form-control" />
                        <label class="form-label" for="number">Numero Civico</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" name="postcode" class="form-control" />
                        <label class="form-label" for="postcode">CAP</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" name="city" class="form-control" />
                        <label class="form-label" for="city">Città</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" name="province" class="form-control" />
                        <label class="form-label" for="province">Provincia</label>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg mb-1">Registra</button>
                    
                    <a href="{{route('admin.home')}}" class="btn btn-primary btn-lg d-flex justify-content-center mx-auto my-2 my-md-4">
                        <i class="bi bi-chevron-left"></i> Annulla
                    </a>

                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</form>
@endsection