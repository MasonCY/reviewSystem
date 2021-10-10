<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=>'Moderator',
            'email'=>'Moderator@a.org',
            'user_type'=>'Moderator',
            'password'=>bcrypt('1234'),
        ]); 
   
        DB::table('users')->insert([
            'name'=>'Chris',
            'email'=>'Chris@a.org',
            'user_type'=>'Moderator',
            'password'=>bcrypt('1234'),
        ]); 
        DB::table('users')->insert([
            'name'=>'Member',
            'email'=>'Member@a.org',
            'user_type'=>'Member',
            'password'=>bcrypt('1234'),
        ]); 
        DB::table('users')->insert([
            'name'=>'Cara',
            'email'=>'Cara@a.org',
            'user_type'=>'Member',
            'password'=>bcrypt('1234'),
        ]); 
        DB::table('users')->insert([
            'name'=>'Bob',
            'email'=>'Bob@a.org',
            'user_type'=>'Member',
            'password'=>bcrypt('1234'),
        ]);
        DB::table('users')->insert([
            'name'=>'Fred',
            'email'=>'Fred@a.org',
            'user_type'=>'Member',
            'password'=>bcrypt('1234'),
        ]);
        DB::table('users')->insert([
            'name'=>'Mason',
            'email'=>'Mason@gmail.com',
            'user_type'=>'Member',
            'password'=>bcrypt('1234'),
        ]); 
        DB::table('users')->insert([
            'name'=>'Paris',
            'email'=>'Paris@gmail.com',
            'user_type'=>'Member',
            'password'=>bcrypt('1234'),
        ]); 
        DB::table('users')->insert([
            'name'=>'Paul',
            'email'=>'Paul@gmail.com',
            'user_type'=>'Member',
            'password'=>bcrypt('1234'),
        ]); 
        DB::table('users')->insert([
            'name'=>'Travis',
            'email'=>'Travis@gmail.com',
            'user_type'=>'Member',
            'password'=>bcrypt('1234'),
        ]); 
        DB::table('users')->insert([
            'name'=>'Tony',
            'email'=>'Tony@gmail.com',
            'user_type'=>'Member',
            'password'=>bcrypt('1234'),
        ]); 
        DB::table('users')->insert([
            'name'=>'Mo',
            'email'=>'Mo@gmail.com',
            'user_type'=>'Moderator',
            'password'=>bcrypt('1234'),
        ]); 
    }
}
