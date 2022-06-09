<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeslachtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('geslacht')->insert([
            'geslachtId' => 1,
            'geslachtBeschrijving' => 'Man'
        ]);

        DB::table('geslacht')->insert([
            'geslachtId' => 2,
            'geslachtBeschrijving' => 'Vrouw'
        ]);

        DB::table('geslacht')->insert([
            'geslachtId' => 3,
            'geslachtBeschrijving' => 'N/A'
        ]);
    }
}
