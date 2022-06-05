<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_type')->insert([
            'userTypeId' => 1,
            'userTypeDescription' => 'User'
        ]);

        DB::table('user_type')->insert([
            'userTypeId' => 2,
            'userTypeDescription' => 'Moderator'
        ]);
    }
}
