@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', 'Registra Nuovo Docente')

@section('page_title', 'Registra Nuovo Docente')

@section('breadcrumb')

@endsection

@section('body')
<!-- Form that lets the user compile the firstname and lastname fields and select one of the sites in sites_list to associate with the new teacher.
the added teacher will have an automatic email in the form of "firstname.lastname@leopardi.it" and password "password". 
the form is submitted by calling the AuthController::teacherRegistration function-->
<form action="{{ route('teachers.store') }}" method="post">
    @method('POST')
    @csrf

    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Informazioni Nuovo Docente</h3>

                    <form class="px-md-2">

                    <div class="form-outline mb-4">
                        <input type="text" name="firstname" class="form-control" />
                        <label class="form-label" for="firstname">Nome</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" name="lastname" class="form-control" />
                        <label class="form-label" for="lastname">Cognome</label>
                    </div>

                        <div class="row mb-4 pb-2 pb-md-0 mb-md-5">
                        <div class="col-md-6 mb-4">

                        <select class="select" name="site_id">
                            <option value="0" disabled selected>Sede</option>
                            <option value="2">Bergamo</option>
                            <option value="1">Brescia</option>
                            <option value="3">Milano</option>
                        </select>

                        </div>
                    </div>

                    <input type="hidden" name="teacher_id" value=count($employees_list)+1>
                    <input type="hidden" name="password" value="password">
                    <button type="submit" class="btn btn-success btn-lg mb-1">Registra</button>

                    </form>

                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</form>
@endsection