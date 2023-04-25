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
    <nav class="navbar navbar-light">
        <img class="mw-100 my-navbar" src="{{url('/img/Leopardi.png')}}" alt="Max-width 100%">
    </nav>
</div>


<!--NAVBAR-->
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav col-lg-6">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Sedi
                    </a>
                    <ul class="dropdown-menu">
                        <!--TODO: for item in database-->
                        <li><a class="dropdown-item" href="{{route('bergamo.index')}}">Bergamo</a></li>
                        <li><a class="dropdown-item" href="{{route('brescia.index')}}">Brescia</a></li>
                        <li><a class="dropdown-item" href="{{route('milano.index')}}">Milano</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" href="{{route('sedi.index')}}" >Visualizza Tutte</a></li>
                    </ul>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="{{route('docenti.index')}}" role="button">Tutti i Docenti</a>
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