<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;

class PersonaleController extends Controller
{
    public function docenti()
    {
        $dl = new DataLayer();
        $docenti = $dl->listaDocenti();
        $lista_sedi = $dl->listaSedi();
        return view('personale.index')->with(['lista_docenti' => $docenti, 'lista_sedi' => $lista_sedi]);
    }

    public function loginDocenti()
    {
        $dl = new DataLayer();
        $docenti = $dl->listaDocenti();
        return view('personale.loginDocenti')->with(['lista_docenti' => $docenti]);
    }

    public function loginSegreteria()
    {
        $dl = new DataLayer();
        $docenti = $dl->listaDocenti();
        return view('personale.loginSegreteria')->with(['lista_docenti' => $docenti]);
    }
}
