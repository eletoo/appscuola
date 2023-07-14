<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

    <!--STYLESHEETS-->
    <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/@yield('style')" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!--JAVASCRIPT-->
    <script src="{{ url('/') }}/js/bootstrap.bundle.min.js"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="{{ url('/') }}/js/teacherRegistration.js"></script>
    <script src="{{ url('/') }}/js/secretaryRegistration.js"></script>

</head>

<body>

<!--BANNER-->
<div class="container-fluid">
    <nav class="navbar navbar-light d-none d-md-block">
        <img class="mw-100 my-navbar" src="{{url('/img/banner/Leopardi.png')}}" alt="Max-width 100%">
    </nav>
    <nav class="navbar navbar-light d-block d-md-none">
        <img class="mw-100 my-navbar" src="{{url('/img/banner/Leopardi_mobile.png')}}" alt="Max-width 800px">
    </nav>
</div>

<div class="container-fluid">
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 navbar-left ms-2">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}"><i class="bi bi-house"></i>     Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="bi bi-building"></i> Sedi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('school.index',2)}}">Bergamo</a></li>
                        <li><a class="dropdown-item" href="{{route('school.index',1)}}">Brescia</a></li>
                        <li><a class="dropdown-item" href="{{route('school.index',3)}}">Milano</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" href="{{route('sites.index')}}" >Visualizza Tutte</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('teachers.index')}}" role="button"><i class="bi bi-person-vcard"></i> Tutti i Docenti</a>
                </li>       

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="bi bi-calendar-event"></i> Calendari Assenze
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('events.school', 2)}}">Bergamo</a></li>
                        <li><a class="dropdown-item" href="{{route('events.school', 1)}}">Brescia</a></li>
                        <li><a class="dropdown-item" href="{{route('events.school', 3)}}">Milano</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" href="{{route('events.index')}}" >Tutti i Calendari Assenze</a></li>
                    </ul>
                </li>
            </ul> 

            <ul class="nav navbar-nav mt-2 mt-lg-0 ms-auto navbar-right me-4">
                @if($logged)
                    <li class="nav-item ms-auto">
                        <a class="btn btn-outline" href="{{ route('user.logout', $loggedRole) }}"><i class="bi-box-arrow-left"></i> Logout</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profilo: {{$loggedName}}
                        </a>
                        @if($loggedRole == 'Admin')
                            <ul class="dropdown-menu">
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" role="button" href="{{route('teacher.add')}}"><i class="bi bi-person-add"></i> Nuovo Docente</a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" role="button" href="{{route('teachers.index')}}"><i class="bi bi-person-dash"></i> Rimuovi Docente</a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" role="button" href="{{route('secretary.add')}}"><i class="bi bi-person-add"></i> Nuovo Segretario</a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" role="button" href="{{route('secretaries.index')}}"><i class="bi bi-person-dash"></i> Rimuovi Segretario</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li><a class="nav-link" role="button" href="{{route('admin.home')}}"><i class="bi bi-person"></i> Area Riservata</a></li>
                            </ul>
                        @elseif($loggedRole == 'Docente')
                            <ul class="dropdown-menu">
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" role="button" href="{{route('teachers.timetable', ['teacher_id' => $loggedID])}}"><i class="bi bi-clock"></i> Il Mio Orario</a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" role="button" href="{{route('teacher.mySubstitutions', ['teacher_id' => $loggedID])}}"><i class="bi bi-journal"></i> Le Mie Supplenze</a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" role="button" href="{{route('teacher.myAbsences', ['teacher_id' => $loggedID])}}"><i class="bi bi-journal-medical"></i> Le Mie Assenze</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="{{route('teacher.home')}}"><i class="bi bi-person"></i> Area Riservata</a></li>
                            </ul>
                        @elseif($loggedRole == 'Segreteria')
                            <ul class="dropdown-menu">
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" role="button" href="{{route('teacher.add')}}"><i class="bi bi-person-add"></i> Nuovo Docente</a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" role="button" href="{{route('teachers.index')}}"><i class="bi bi-person-dash"></i> Rimuovi Docente</a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" role="button" href="{{route('teachers.index')}}"><i class="bi bi-journal-medical"></i> Certificati Assenze</a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" role="button" href="{{route('sites.index')}}"><i class="bi bi-arrow-left-right"></i> Effettua Sostituzioni</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" role="button" href="{{route('secretariat.home')}}"><i class="bi bi-person"></i> Area Riservata</a>
                                </li>
                            </ul>
                        @endif
                    </li>
                @else
                    <li class="nav-item ms-auto">
                        <a class="nav-link" role="button" href="{{route('user.login', 'Docente')}}"><i class="bi bi-box-arrow-in-right"></i> Login Docenti</a>
                    </li>
                    <li class="nav-item ms-auto">
                        <a class="nav-link" role="button" href="{{route('user.login', 'Segreteria')}}"><i class="bi bi-box-arrow-in-right"></i> Login Segreteria</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>

</body>
<div class="container">
    <!--BREADCRUMBS-->
    <div class="container-fluid breadcrumb">
        @yield('breadcrumb')
    </div>

    <!--HEADER/TITLE-->
    <div class="container-fluid">
        <header class="section-header">
            <h1>
                @yield('page_title')
            </h1>
        </header>
    </div>

    <!--BODY-->
    <div class="container-fluid">
        @yield('body')
    </div>
</div>

<!--FOOTER-->
<footer class="row row-cols-1 row-cols-sm-2 row-cols-md-4 py-5 my-5 border-top">
    <div class="col mb-3">
        <a href="{{route('home')}}" class="d-flex align-items-center mb-3 link-dark text-decoration-none ps-5">
            <img src="{{url('/img/views/schoolfooter.png')}}" alt="Max-width 100%" width="100" height="100">
        </a>
        <p class="text-muted ps-5">© 2023 Elena Tonini</p>
    </div>

    <div class="col mb-3">
        <h5 class="ps-5">Sezioni</h5>
        <ul class="nav flex-column ps-5">
        <li class="nav-item mb-2"><a href="{{route('home')}}" class="nav-link p-0 text-muted">Home</a></li>
        <li class="nav-item mb-2"><a href="{{route('sites.index')}}" class="nav-link p-0 text-muted">Tutte le sedi</a></li>
        <li class="nav-item mb-2"><a href="{{route('teachers.index')}}" class="nav-link p-0 text-muted">Tutti i docenti</a></li>
        <li class="nav-item mb-2"><a href="{{route('events.index')}}" class="nav-link p-0 text-muted">Tutti i calendari assenze</a></li>
        </ul>
    </div>

    <div class="col mb-3">
        <h5 class="ps-5">Sedi</h5>
        <ul class="nav flex-column ps-5">
        <li class="nav-item mb-2"><a href="{{route('school.index',2)}}" class="nav-link p-0 text-muted">Bergamo</a></li>
        <li class="nav-item mb-2"><a href="{{route('school.index',1)}}" class="nav-link p-0 text-muted">Brescia</a></li>
        <li class="nav-item mb-2"><a href="{{route('school.index',3)}}" class="nav-link p-0 text-muted">Milano</a></li>
        </ul>
    </div>

    <div class="col mb-3">
        <h5 class="ps-5">Accedi</h5>
        <ul class="nav flex-column ps-5">
        <li class="nav-item mb-2"><a href="{{route('user.login', 'Docente')}}" class="nav-link p-0 text-muted">Login Docenti</a></li>
        <li class="nav-item mb-2"><a href="{{route('user.login', 'Segreteria')}}" class="nav-link p-0 text-muted">Login Segreteria</a></li>
        </ul>
    </div>
</footer>

</html>