<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personale extends Model
{
    use HasFactory;
    protected $table = 'personale';
    public $timestamps = false;
    protected $fillable = ['firstname', 'lastname', 'ruolo'];

    public function sedi()
    {
        return $this->belongsToMany(Sede::class, 'docente_sede','sede_id', 'id');
    }
}