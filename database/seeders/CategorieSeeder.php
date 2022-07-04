<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorie')->insert([
            'categorieId' => 1,
            'categorieBeschrijving' => 'Regels'
        ]);

        DB::table('categorie')->insert([
            'categorieId' => 2,
            'categorieBeschrijving' => 'Klachten'
        ]);

        DB::table('categorie')->insert([
            'categorieId' => 3,
            'categorieBeschrijving' => 'Mededelingen'
        ]);

        DB::table('categorie')->insert([
            'categorieId' => 4,
            'categorieBeschrijving' => 'Discussies'
        ]);

        DB::table('categorie')->insert([
            'categorieId' => 5,
            'categorieBeschrijving' => 'Suggesties'
        ]);

        DB::table('categorie')->insert([
            'categorieId' => 6,
            'categorieBeschrijving' => 'Info'
        ]);
    }
}
