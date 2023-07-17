{{$logged = false}}
@extends('layouts.master')

@section('style', 'mystyle.css')

@section('title', '404 Not Found')

@section('body')
<body>
    <h1 class="rainbow-text">404</h1>
    <p>Ci dispiace, non troviamo la pagina che stai cercando.</p>
    <p>Perché non torni alla <a href="/">home page</a>?</p>
</body>
@endsection