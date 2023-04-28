<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

    <!--STYLESHEETS-->
    <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ url('/') }}/css/@yield('style')" />
    <link rel="stylesheet" href="{{ url('/') }}/css/timetable.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!--JAVASCRIPT-->
    <script src="{{ url('/') }}/js/bootstrap.bundle.min.js"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
</head>

<body>

<!--BANNER-->
<div class="container-fluid">
    <nav class="navbar navbar-light d-none d-md-block">
        <img class="mw-100 my-navbar" src="{{url('/img/Leopardi.png')}}" alt="Max-width 100%">
    </nav>
    <nav class="navbar navbar-light d-block d-md-none">
        <img class="mw-100 my-navbar" src="{{url('/img/Leopardi_mobile.png')}}" alt="Max-width 800px">
    </nav>
</div>

<div class="container-fluid">
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
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
                        <li><a class="dropdown-item" href="{{route('sedi.index')}}" >Visualizza Tutte</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('docenti.index')}}" role="button">Tutti i Docenti</a>
                </li>       
            </ul> 
            <ul class="navbar-nav mt-2 mt-lg-0 ms-auto">
                <li class="nav-item ms-auto">
                    <a class="nav-link" role="button" href="{{route('personale.loginDocenti')}}">Login Docenti</a>
                </li>
                <li class="nav-item ms-auto">
                    <a class="nav-link" role="button" href="{{route('personale.loginSegreteria')}}">Login Segreteria</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

</body>

<!--BREADCRUMBS-->
<div class="container-fluid">
    @yield('breadcrumb')
</div>

<!--HEADER/TITLE-->
<div class="container-fluid">
    <header class="section-header">
        <h1>
            @yield('title')
        </h1>
    </header>
</div>



<!--BODY-->
<div class="container-fluid">
    @yield('body')
</div>

</html>