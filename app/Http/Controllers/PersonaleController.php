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
        return view('personale.index')->with('lista_docenti', $docenti);
    }
}
