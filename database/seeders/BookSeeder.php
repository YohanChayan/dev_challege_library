<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'published_date' =>  date("Y-m-d", mt_rand(strtotime("10 September 2000"), strtotime("22 July 2015"))),

        DB::table('books')->insert([
            'name' => "Alice's Adventures in Wonderland",
            'author' => 'Lewis Carroll',
            'category' => 'Fantasy',
            'published_date' =>  date('Y-m-d', strtotime('5 November 1865')),
            'created_at' =>  Carbon::now(),
        ]);
        
        DB::table('books')->insert([
            'name' => "Picture You Dead",
            'author' => 'Peter James',
            'category' => 'Crime',
            'published_date' =>  date('Y-m-d', strtotime('26 July 2022')),
            'created_at' =>  Carbon::now(),
        ]);

        DB::table('books')->insert([
            'name' => "The Book Thief",
            'author' => 'Markus Zusak',
            'category' => 'Historical fiction',
            'published_date' =>  date('Y-m-d', strtotime('22 March 2005')),
            'created_at' =>  Carbon::now(),
        ]);
        
        DB::table('books')->insert([
            'name' => "Gone Girl",
            'author' => 'Gillian Flynn',
            'category' => 'Thrillers',
            'published_date' =>  date('Y-m-d', strtotime('24 May 2012')),
            'created_at' =>  Carbon::now(),
        ]);
        
        DB::table('books')->insert([
            'name' => "The Way of Men",
            'author' => 'Jack Donovan',
            'category' => 'War',
            'published_date' =>  date('Y-m-d', strtotime('22 March 2012')),
            'created_at' =>  Carbon::now(),
        ]);

        DB::table('books')->insert([
            'name' => "Frankenstein",
            'author' => 'Mary Shelley',
            'category' => 'Science fiction',
            'published_date' =>  date('Y-m-d', strtotime('1 January 1818')),
            'created_at' =>  Carbon::now(),
        ]);
    }
}
