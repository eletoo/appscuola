<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creo i docenti
        $sites_list = json_decode(Site::all());
        for ($i = 0; $i < count($sites_list); $i++) {
            Teacher::factory()->count(50)->create(['site_id' => $sites_list[$i]->id]);
        }
    }
}
