<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Review_userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('review_user')->insert([
            'user_id'=>1,
            'review_id' => 1,
            
            'islike'=> 1
        ]); 
        DB::table('review_user')->insert([
            'user_id'=>1,
            'review_id' => 2,
            
            'islike'=> 1
        ]); 
        DB::table('review_user')->insert([
            'user_id'=>1,
            'review_id' => 3,
            
            'islike'=> 0
        ]); 
        DB::table('review_user')->insert([
            'user_id'=>1,
            'review_id' => 4,
            
            'islike'=> 0
        ]); 
    }
}
