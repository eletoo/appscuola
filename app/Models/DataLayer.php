<?php

namespace App\Models;

use App\Models\Personale;

class DataLayer
{
    // contiene tutti i metodi per interagire con il DB
    public function listaDocenti()
    {
        return Personale::where('ruolo','Docente')->orderBy('lastname', 'asc')->orderBy('firstname', 'asc')->get();
    }

    public function listaDocentiSede($idsede)
    {
        return Personale::where('ruolo','Docente')->where('sede_id', $idsede)->orderBy('lastname', 'asc')->orderBy('firstname', 'asc')->get();
    }

    public function infoSede($cittasede)
    {
        return Sede::where('citta', $cittasede)->first();
    }

    public function listaSedi()
    {
        return Sede::orderBy('citta', 'asc')->get();
    }
}
