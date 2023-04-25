<?php

namespace Database\Seeders;

use App\Models\Personale;
use App\Models\Sede;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Le due sedi sono inserite manualmente
        Sede::factory()
                    ->count(3)
                    ->sequence(
                        [
                            'nome_sede'=>'Liceo Classico "G. Leopardi"', 
                            'via'=>'Via Aristotele', 
                            'civico'=>56, 
                            'CAP'=>25121,
                            'citta'=>'Brescia', 
                            'provincia'=>'BS'],
                        [
                            'nome_sede'=>'Liceo Scientifico "G. Leopardi"', 
                            'via'=>'Via Alessandro Magno', 
                            'civico'=>86, 
                            'CAP'=>24100,
                            'citta'=>'Bergamo', 
                            'provincia'=>'BG'],
                        [
                            'nome_sede'=>'Liceo Linguistico "G. Leopardi"', 
                            'via'=>'Via Sofocle', 
                            'civico'=>128, 
                            'CAP'=>20019,
                            'citta'=>'Milano', 
                            'provincia'=>'MI']
                    )
                    ->create();

        $lista_sedi = json_decode(Sede::all());
        for ($i = 0; $i < count($lista_sedi); $i++) {
            Personale::factory()->count(50)->create(['sede_id' => $lista_sedi[$i]->id]);
        }
    }
}
