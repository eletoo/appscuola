<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teacher';
    public $timestamps = false;
    protected $fillable = ['firstname', 'lastname', 'role'];

    public function sites()
    {
        return $this->belongsToMany(Site::class, 'teacher_site', 'site_id', 'id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'teacher_id', 'id');
    }

    public function timetable()
    {
        return $this->hasMany(Timetable::class, 'teacher_id', 'id');
    }
}