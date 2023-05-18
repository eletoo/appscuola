@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Registra Nuovo Segretario')

@section('page_title', 'Registra Nuovo Segretario')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Area Riservata</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuovo Segretario</li>
  </ol>
</nav>
@endsection

@section('body')
<form action="{{ route('secretary.store') }}" method="post">
    @method('POST')
    @csrf

    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Informazioni Nuovo Segretario</h3>

                    <form class="px-md-2">

                    <div class="form-outline mb-4">
                        <input type="text" name="firstname" class="form-control" />
                        <label class="form-label" for="firstname">Nome</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" name="lastname" class="form-control" />
                        <label class="form-label" for="lastname">Cognome</label>
                    </div>

                    <input type="hidden" name="teacher_id" value=count($employees_list)+1>
                    <input type="hidden" name="password" value="password">
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