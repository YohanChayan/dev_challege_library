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

        DB::table('users')->insert([
            'name' => 'Yohan Chayan',
            'password' => bcrypt('iygahksjnoeubki2u3u49823uobfjnaiuyighjnkm'),
            'role' => 'none',
            'email' => 'chayanyhn@gmail.com',
        ]);

        DB::table('users')->insert([
            'name' => 'Carlos Eduardo',
            'password' => bcrypt('iygahksjnoeubki2u3u49823uobfjnaiuyighjnkm'),
            'role' => 'none',
            'email' => 'CarlosEduardo@gmail.com',
        ]);
        DB::table('users')->insert([
            'name' => 'Jonathan Zerquera',
            'password' => bcrypt('iygahksjnoeubki2u3u49823uobfjnaiuyighjnkm'),
            'role' => 'none',
            'email' => 'jzerquera@gmail.com',
        ]);
        DB::table('users')->insert([
            'name' => 'Santiago Moreno',
            'password' => bcrypt('iygahksjnoeubki2u3u49823uobfjnaiuyighjnkm'),
            'role' => 'none',
            'email' => 'SantiMo@gmail.com',
        ]);
        

    }
}
