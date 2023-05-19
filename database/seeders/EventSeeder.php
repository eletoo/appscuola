<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Teacher;
use App\Models\Timetable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the events 
        $teachers_list = json_decode(Teacher::all());
        for ($i = 0; $i < count($teachers_list); $i++) {
            Event::factory()->count(rand(0,5))->create(['teacher_id' => ($teachers_list[$i])->id, 'substitute_id' => null]);
        }
    }
}
