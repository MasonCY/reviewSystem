<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
                'name' => 'iPhone 13 Pro Max',
                'price' => 1399,
                'manufacturer' => 'Apple',
                'description' => 'Released 2021,September 24, 240g,7.7mm thickness, 1284*2778 pixels(6.7)',
            
        ]);
        DB::table('products')->insert([
            'name' => 'iPhone 13 Pro',
            'price' => 1299,
            'manufacturer' => 'Apple',
            'description' => 'Released 2021,September 24, 204g,7.7mm thickness, 1170*2532 pixels(6.1)',
        
         ]);
        DB::table('products')->insert([
                'name' => 'iPhone 13',
                'price' => 929,
                'manufacturer' => 'Apple',
                'description' => 'Released 2021,September 24, 174g,7.7mm thickness, 1170*2532 pixels(6.1)'
            
        ]);
        DB::table('products')->insert([
            'name' => 'iPhone 13 mini',
            'price' => 829,
            'manufacturer' => 'Apple',
            'description' => 'Released 2021,September 24, 141g,7.7mm thickness, 1080*2340 pixels(5.4)',
        
        
        ]);
        DB::table('products')->insert([
            'name' => 'iPhone 12 Pro Max',
            'price' => 1199,
            'manufacturer' => 'Apple',
            'description' => 'Released 2020,October 23, 228g,7.4mm thickness, 1284*2778 pixels(6.7)'
        
        
        ]);
        DB::table('products')->insert([
            'name' => 'iPhone 12 Pro',
            'price' => 1099,
            'manufacturer' => 'Apple',
            'description' => 'Released 2020,October 23, 189g,7.4mm thickness, 1170*2532 pixels(6.1)'
        
        
        ]);
        DB::table('products')->insert([
            'name' => 'iPhone 12',
            'price' => 879,
            'manufacturer' => 'Apple',
            'description' => 'Released 2020,October 23, 164g,7.4mm thickness, 1170*2532 pixels(6.1)',
        
        
        ]);
        DB::table('products')->insert([
            'name' => 'iPhone 12 mini',
            'price' => 779,
            'manufacturer' => 'Apple',
            'description' => 'Released 2020,November 13, 135g,7.4mm thickness, 1080*2340 pixels(5.4)',
        
        
        ]);
       
    }
}
