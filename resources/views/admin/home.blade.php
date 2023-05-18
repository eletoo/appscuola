@extends('layouts.personalArea')

@section('success_or_fail')
    @isset($success)
    <div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="alert alert-success alert-dismissible">
            {{$success}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    </div>
    @endif
@endsection

@section('buttons')

<div class="container-fluid">
<div class="row my-3">
    <div class="col-md-12">
        <table class="table table-striped table-hover table-responsive table-bordered">
            <col width="40%"/>
            <col width="30%"/>
            <col width="30%"/>
            <thead>
                <tr>
                    <th></th>
                    <th>Nuovo</th>
                    <th>Rimuovi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Docenti
                    </td>
                    <td>
                        <div class="col" align="center">
                            <a class="btn btn-lg btn-primary my-3" style="width: 80%" href="{{route('teacher.add', ['teacher_id' => $loggedID])}}"><i class="bi bi-person-add"></i> Nuovo Docente</a>
                        </div>
                    </td>
                    <td>
                        <div class="col" align="center">
                            <a class="btn btn-lg btn-primary my-3" style="width: 80%" href="{{route('home', ['teacher_id' => $loggedID])}}"><i class="bi bi-person-dash"></i> Rimuovi Docente</a>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        Segretari
                    </td>
                    <td>
                        <div class="col" align="center">
                            <a class="btn btn-lg btn-primary my-3" style="width: 80%" href="{{route('secretary.add', ['teacher_id' => $loggedID])}}"><i class="bi bi-person-add"></i> Nuovo Segretario</a>
                        </div>
                    </td>
                    <td>
                        <div class="col" align="center">
                            <a class="btn btn-lg btn-primary my-3" style="width: 80%" href="{{route('secretaries.index', ['teacher_id' => $loggedID])}}"><i class="bi bi-person-dash"></i> Rimuovi Segretario</a>
                        </div>
                    </td>
                </tr>
<!--
                <tr>
                    <td>
                        Sedi
                    </td>
                    <td>
                        <div class="col" align="center">
                            <a class="btn btn-lg btn-primary my-3" style="width: 80%" href="{{route('home', ['teacher_id' => $loggedID])}}"><i class="bi bi-building-add"></i> Nuova Sede</a>
                        </div>
                    </td>
                    <td>
                        <div class="col" align="center">
                            <a class="btn btn-lg btn-primary my-3" style="width: 80%" href="{{route('home', ['teacher_id' => $loggedID])}}"><i class="bi bi-building-dash"></i> Rimuovi Sede</a>
                        </div>
                    </td>
                </tr>
-->
            </tbody>
        </table>                
    </div>
</div>
</div>

@endsection