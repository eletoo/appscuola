<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Site::factory()
            ->count(3)
            ->sequence(
                [
                    'site_name' => 'Liceo Classico "G. Leopardi"',
                    'street' => 'Via Aristotele',
                    'number' => 56,
                    'postcode' => 25121,
                    'city' => 'Brescia',
                    'province' => 'BS'
                ],
                [
                    'site_name' => 'Liceo Scientifico "G. Leopardi"',
                    'street' => 'Via Alessandro Magno',
                    'number' => 86,
                    'postcode' => 24100,
                    'city' => 'Bergamo',
                    'province' => 'BG'
                ],
                [
                    'site_name' => 'Liceo Linguistico "G. Leopardi"',
                    'street' => 'Via Sofocle',
                    'number' => 128,
                    'postcode' => 20019,
                    'city' => 'Milano',
                    'province' => 'MI'
                ]
            )
            ->create();
    }
}
