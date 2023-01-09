<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Creeartelo',
            'password' => bcrypt('cre123'),
            'role' => 'admin',
            'email' => 'creeartelo@gmail.com',
        ]);

    }
}
