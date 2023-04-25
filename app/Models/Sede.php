<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    protected $table = 'sede';
    public $timestamps = false;
    protected $fillable = ['nome_sede', 'via', 'civico', 'CAP', 'citta', 'provincia'];

    public function personale()
    {
        return $this->belongsToMany(Personale::class, 'docente_sede','docente_id', 'id');
    }
}