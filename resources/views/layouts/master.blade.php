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
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 navbar-left">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Sedi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('bergamo.index')}}">Bergamo</a></li>
                        <li><a class="dropdown-item" href="{{route('brescia.index')}}">Brescia</a></li>
                        <li><a class="dropdown-item" href="{{route('milano.index')}}">Milano</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" href="{{route('sites.index')}}" >Visualizza Tutte</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('teachers.index')}}" role="button">Tutti i Docenti</a>
                </li>       
            </ul> 

            <ul class="nav navbar-nav mt-2 mt-lg-0 ms-auto navbar-right">
                @if(false)<!--TODO: if $logged-->
                    <li class="nav-item ms-auto">
                        <i>Benvenuto {{ $loggedName }}</i> 
                        <a class="btn btn-outline" href="{{ route('user.logout', $loggedRole) }}">Logout <i class="bi-box-arrow-left"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Area Riservata
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item ms-auto">
                            <a class="nav-link" role="button" href="{{route('teachers.timetable', ['teacher_id' => $loggedID])}}"><i class="bi bi-clock"></i> Il Mio Orario </a>
                        </li>
                        <li class="nav-item ms-auto">
                            <a class="nav-link" role="button" href="{{route('teacher.mySubstitution', ['teacher_id' => $loggedID])}}"> Le Mie Supplenze</a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" href="{{route('teacher.home')}}">Area Riservata</a></li>
                    </ul>
                </li>
                    
                @else
                    <li class="nav-item ms-auto">
                        <a class="nav-link" role="button" href="{{route('user.login', 'Docente')}}">Login Docenti</a>
                    </li>
                    <li class="nav-item ms-auto">
                        <a class="nav-link" role="button" href="{{route('user.login', 'Segreteria')}}">Login Segreteria</a>
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

</html>