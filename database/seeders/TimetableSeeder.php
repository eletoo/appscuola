<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\Timetable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Creates the timetables
         $teachers_list = json_decode(Teacher::all());
         for ($i = 0; $i < count($teachers_list); $i++) {
             Timetable::factory()->count(25)->create(['teacher_id' => $teachers_list[$i]->id]);
         }
    }
}
