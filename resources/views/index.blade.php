@extends('layouts.master')

@section('title','Calendario Liceo "G. Leopardi"')

@section('style', 'mystyle.css')

@section('body')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <button type="button" class="btn btn-primary home-page-button">
                <a href="#">
                    <i class="bi bi-calendar-event"></i> 
                    <br/>Calendari Scuole
                </a>
            </button>
            <button type="button" class="btn btn-primary home-page-button">
                <a href="{{route('personale.loginDocenti')}}">
                    <i class="bi bi-person"></i> 
                    <br/>Area Riservata Docenti
                </a>
            </button>
            <button type="button" class="btn btn-primary home-page-button">
                <a href="{{route('personale.loginSegreteria')}}">
                    <i class="bi bi-person"></i> 
                    <br/>Area Riservata Segreteria 
                </a>
            </button>
        </div>            
                        
    </div>
</div>
</div>

<!--WEEKLY TIMETABLE-->
<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="bg-light-gray">
                    <th class="text-uppercase">Orario
                    </th>
                    <th class="text-uppercase">Lunedì</th>
                    <th class="text-uppercase">Martedì</th>
                    <th class="text-uppercase">Mercoledì</th>
                    <th class="text-uppercase">Giovedì</th>
                    <th class="text-uppercase">Venerdì</th>
                    <th class="text-uppercase">Sabato</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">8:00</td>
                    <td>
                        <div class="font-size13">Ivana Wong</div>
                    </td>
                    <td>
                        <div class="font-size13">Marta Healy</div>
                    </td>

                    <td>
                        <div class="font-size13">Ivana Wong</div>
                    </td>
                    <td>
                        <div class="font-size13">Ivana Wong</div>
                    </td>
                    <td>
                        <div class="font-size13">Kate Alley</div>
                    </td>
                    <td>
                        <div class="font-size13">James Smith</div>
                    </td>
                </tr>

                <tr>
                    <td class="align-middle">9:00</td>
                    <td>
                        <div class="font-size13">Ivana Wong</div>
                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>
                        <div class="font-size13">Kate Alley</div>
                    </td>
                    <td>
                        <div class="font-size13">Marta Healy</div>
                    </td>
                    <td>
                        <div class="font-size13">James Smith</div>
                    </td>
                    <td class="bg-light-gray">

                    </td>
                </tr>

                <tr>
                    <td class="align-middle">10:00</td>
                    <td>

                    </td>
                    <td>
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                </tr>

                <tr>
                    <td class="align-middle">11:00</td>
                    <td class="bg-light-gray">

                    </td>
                    <td>
                        <div class="font-size13">Kate Alley</div>
                    </td>
                    <td>
                        <div class="font-size13">Ivana Wong</div>
                    </td>
                    <td>
                        <div class="font-size13">Ivana Wong</div>
                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>
                        <div class="font-size13">Marta Healy</div>
                    </td>
                </tr>

                <tr>
                    <td class="align-middle">12:00</td>
                    <td>
                        <div class="font-size13">James Smith</div>
                    </td>
                    <td>
                        <div class="font-size13">Ivana Wong</div>
                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>
                        <div class="font-size13">James Smith</div>
                    </td>
                    <td>
                        <div class="font-size13">Marta Healy</div>
                    </td>
                    <td>
                        <div class="font-size13">Ivana Wong</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<br/>
@endsection