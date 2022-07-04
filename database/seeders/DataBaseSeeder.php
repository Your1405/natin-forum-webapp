<?php 

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Database\Seeders\UserTypeSeeder;
use Database\Seeders\GeslachtSeeder;
use Database\Seeders\CategorieSeeder;

class DatabaseSeeder extends Seeder {
    public function run(){
        $this->call([UserTypeSeeder::class, GeslachtSeeder::class, CategorieSeeder::class]);
    }
}