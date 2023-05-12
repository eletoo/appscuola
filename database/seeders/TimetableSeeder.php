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
            $count = 0; 
            do{
                $lecture = new Timetable();
                //temporarily save in a variable the created timetable
                $lecture = Timetable::factory()->count(1)->make(['teacher_id' => $teachers_list[$i]->id]);
                // verify that the combination of teacher_id, day_of_week and hour_of_schoolday is unique 
                // (i.e. that the teacher doesn't have two lectures at the same time on the same day)
                if (Timetable::where('teacher_id', $teachers_list[$i]->id)
                ->where('hour_of_schoolday', $lecture->first()->hour_of_schoolday) 
                ->where('day_of_week', $lecture->first()->day_of_week)
                ->count() < 1) {
                    // add the created lecture to the database
                    $lecture->first()->save();
                    $count++;
                }
            }while($count < 30);
        }
    }
}