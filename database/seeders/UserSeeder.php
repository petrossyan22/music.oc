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
                // 2
                "name"=>"Pentatonix",
                "email"=>"Pentatonix@Pentatonix.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                // 3
                "name"=>"Alan Walker",
                "email"=>"AlanWalker@AlanWalker.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                // 4
                "name"=>"Angus",
                "email"=>"Angus@Angus.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                // 5
                "name"=>"Julia Stone",
                "email"=>"JuliaStone@JuliaStone.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                // 6
                "name"=>"Sia",
                "email"=>"Sia@Sia.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                // 7
                "name"=>"Axwell",
                "email"=>"Axwell@Axwell.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                // 8
                "name"=>"Ingrosso",
                "email"=>"Ingrosso@Ingrosso.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                // 9
                "name"=>"Tornie",
                "email"=>"Tornie@Tornie.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                // 10
                "name"=>"Zara Larsson",
                "email"=>"ZaraLarsson@ZaraLarsson.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                // 11
                "name"=>"Clean Bandit",
                "email"=>"CleanBandit@CleanBandit.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                // 12
                "name"=>"Rihanna",
                "email"=>"Rihanna@Rihanna.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ],
            [
                // 13
                "name"=>"Paloma Faith",
                "email"=>"PalomaFaith@PalomaFaith.com",
                "password"=>bcrypt("123456789"),
                "role"=>"singer"
            ]
        ]);
    }
}
