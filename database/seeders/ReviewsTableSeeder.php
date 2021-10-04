<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('reviews')->insert([
            'user_id'=>1,
            'product_id' => 1,
            'review' => '6.7 inch display is too big. 240g too heavy. However I am happy about battery upgrade and ProMotion.',
            'rating' => 4,
            'create_date'=> date("Y-m-d H:i:s")
        ]); 
        DB::table('reviews')->insert([
            'user_id'=>2,
            'product_id' => 1,
            'review' => "please tell me. can i install custom modded apps without jailbreak or pc in iOS. and can i mod games on iOS like android. if i can't does its, iOS trash for me.",
            'rating' => 4,
            'create_date'=> date("Y-m-d H:i:s")
        ]); 
        DB::table('reviews')->insert([
            'user_id'=>3,
            'product_id' => 1,
            'review' => "Why Apple is obsessed with stainless steel frames? I don't get it, change to grade 5 titanium instead and weight would drop to less than 200 g. And I could buy one.",
            'rating' => 4,
            'create_date'=> date("Y-m-d H:i:s")
        ]); 
        DB::table('reviews')->insert([
            'user_id'=>4,
            'product_id' => 1,
            'review' => "Heavy weight gain .240grs.Even heavier than s21 ultra !!! Suitable only for body buliders hands.",
            'rating' => 4,
            'create_date'=> date("Y-m-d H:i:s")
        ]); 
        DB::table('reviews')->insert([
            'user_id'=>5,
            'product_id' => 1,
            'review' => "It's a good one, buy it! I'm happy with the battery life.",
            'rating' => 4,
            'create_date'=> date("Y-m-d H:i:s")
        ]); 
        DB::table('reviews')->insert([
            'user_id'=>6,
            'product_id' => 1,
            'review' => "So far so good,Apple has really improved the battery life of the 13pro max being it 4352mAh..It sounds pretty good and can take a whole day to use until it dies..Apple has really done a great job..The cinematic video and the prores and the smaller notch has made the phone stand among all...big ups to apple..",
            'rating' => 4,
            'create_date'=> date("Y-m-d H:i:s")
        ]); 
    }
}
