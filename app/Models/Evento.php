<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'evento';
    public $timestamps = false;
    protected $fillable = ['data_inizio', 'data_fine', 'descrizione', 'assente', 'occupato'];

    public function docente()
    {
        return $this->belongsTo(Personale::class, 'docente_id', 'id');
    }
}