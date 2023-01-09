<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Crime',
            'description' => 'From murder mysteries to true crime stories, crime is an enduringly popular genre. It tells terrifying stories of wrongdoing, and the search for justice.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Fantasy',
            'description' => 'These stories take readers on a journey beyond the known world, to places conjured in the author’s imagination.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Historical fiction',
            'description' => 'These books give readers a glimpse into the past, with many stories set in times of great conflict and change.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Literary fiction',
            'description' => 'Literary fiction is reserved for books that don’t slot neatly into more traditional genres, although it can also be used to differentiate from lighter fiction.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Poetry',
            'description' => 'It contains a wealth of genres in itself, from nonsense verse to war poetry.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Science fiction',
            'description' => 'Sci-fi is often combined with fantasy, and there are some similarities between these types of books. But sci-fi books are usually bound by the laws of science as we know them in the real world.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Thrillers',
            'description' => 'Thrillers are your typical page-turner. Full of action and suspense, thrillers can also often cross genres, particularly with crime and mystery.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'War',
            'description' => 'War is a truly formative experience, on an individual, national, and international level.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
