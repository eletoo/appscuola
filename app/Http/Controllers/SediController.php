<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class SediController extends Controller
{
    public function index()
    {
        $dl = new DataLayer();
        $lista_sedi = $dl->listaSedi();
        return view('sede.all')->with('lista_sedi', $lista_sedi);
    }

    public function brescia()
    {
        $dl = new DataLayer();
        $docenti = $dl->listaDocentiSede(1);
        $info_sede = $dl->infoSede('Brescia');
        return view('sede.index')->with(['lista_docenti' => $docenti, 'info_sede' => $info_sede]);
    }

    public function bergamo()
    {
        $dl = new DataLayer();
        $docenti = $dl->listaDocentiSede(2);
        $info_sede = $dl->infoSede('Bergamo');
        return view('sede.index')->with(['lista_docenti' => $docenti, 'info_sede' => $info_sede]);
    }

    public function milano()
    {
        $dl = new DataLayer();
        $docenti = $dl->listaDocentiSede(3);
        $info_sede = $dl->infoSede('Milano');
        return view('sede.index')->with(['lista_docenti' => $docenti, 'info_sede' => $info_sede]);
    }
}