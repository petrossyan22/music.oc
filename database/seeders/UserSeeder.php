<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table("users")->insert([
            [
                "name"=>"Pentatonix",
                "email"=>"Pentatonix@Pentatonix.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                "name"=>"Alan Walker",
                "email"=>"AlanWalker@AlanWalker.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                "name"=>"Angus",
                "email"=>"Angus@Angus.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                "name"=>"Julia Stone",
                "email"=>"JuliaStone@JuliaStone.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                "name"=>"Sia",
                "email"=>"Sia@Sia.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                "name"=>"Axwell",
                "email"=>"Axwell@Axwell.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                "name"=>"Ingrosso",
                "email"=>"Ingrosso@Ingrosso.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ]
        ]);
    }
}
