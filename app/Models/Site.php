<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $table = 'site';
    public $timestamps = false;
    protected $fillable = ['site_name', 'street', 'number', 'postcode', 'city', 'province'];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_site','teacher_id', 'id');
    }
}