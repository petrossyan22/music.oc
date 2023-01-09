<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // users => [
        //      id`s
        //
        //      admin => 1
        //      Pentatonix => 2
        //      Alan wWlker => 3
        // ]
        $videos = [
            [
                "title"=>"hello world",
                "poster"=>"hello world.png",
                "video"=>"alan-walker-torine-hello-world_287106.mp4",
            ],
            [
                "title"=>"The Sound of Silence",
                "poster"=>"13731-pentatonix-video.jpg",
                "video"=>"y2mate.com - OFFICIAL VIDEO The Sound of Silence  Pentatonix_v144P.mp4",
            ],
            [
                "title"=>"Hallelujah",
                "poster"=>"Hallelujah - Pentatonix.jpg",
                "video"=>"[OFFICIAL VIDEO] Hallelujah - Pentatonix [LRP8d7hhpoQ].mp4",
            ],
            [
                "title"=>"Big Jet Plane",
                "poster"=>"big-jet-plane.jpg",
                "video"=>"Angus and Julia Stone - Big Jet Plane [Official Music Video] [yFTvbcNhEgc].mp4",
            ],
            [
                "title"=>"Helium",
                "poster"=>"helium sia.jpg",
                "video"=>"Sia - Helium (Lyrics) [nLnpvbBSjUY].mp4",
            ],
            [
                "title"=>"More Than You Know",
                "poster"=>"45.jpg",
                "video"=>"Axwell Λ Ingrosso - More Than You Know (Lyrics).mp4",
            ],
        ];
        $user_video = [
            [
                "user_id" => 3,
                "video_id" => 1
            ],
            [
                "user_id" => 2,
                "video_id" => 2
            ],
            [
                "user_id" => 2,
                "video_id" => 3
            ],
            [
                "user_id" => 4,
                "video_id" => 4
            ],
            [
                "user_id" => 5,
                "video_id" => 4
            ],
            [
                "user_id" => 6,
                "video_id" => 5
            ],
            [
                "user_id" => 7,
                "video_id" => 6
            ],
            [
                "user_id" => 8,
                "video_id" => 6
            ]
        ];
        $likes = [
            [
                "user_id" => 1,
                "video_id" => 1
            ]
        ];
        DB::table("videos")->insert($videos);
        DB::table("user_video")->insert($user_video);
        DB::table("likes")->insert($likes);
    }
}
