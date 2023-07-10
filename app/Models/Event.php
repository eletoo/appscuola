<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';
    public $timestamps = false;
    protected $fillable = ['teacher_id', 'description', 'day_of_week', 'hour_of_schoolday', 'certificate', 'validated', 'substitute_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}