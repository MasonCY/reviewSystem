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
            'name'=>'Bob',
            'email'=>'Bob@gmail.com',
            'user_type'=>'Moderator',
            'password'=>bcrypt('123456'),
        ]); 
        DB::table('users')->insert([
            'name'=>'Mason',
            'email'=>'Mason@gmail.com',
            'user_type'=>'Member',
            'password'=>bcrypt('123456'),
        ]); 
        DB::table('users')->insert([
            'name'=>'Paris',
            'email'=>'Paris@gmail.com',
            'user_type'=>'Member',
            'password'=>bcrypt('123456'),
        ]); 
        DB::table('users')->insert([
            'name'=>'Paul',
            'email'=>'Paul@gmail.com',
            'user_type'=>'Member',
            'password'=>bcrypt('123456'),
        ]); 
        DB::table('users')->insert([
            'name'=>'Travis',
            'email'=>'Travis@gmail.com',
            'user_type'=>'Member',
            'password'=>bcrypt('123456'),
        ]); 
        DB::table('users')->insert([
            'name'=>'Tony',
            'email'=>'Tony@gmail.com',
            'user_type'=>'Member',
            'password'=>bcrypt('123456'),
        ]); 
    }
}
