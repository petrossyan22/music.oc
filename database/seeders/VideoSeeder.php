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
        $videos = [
            [
                // 1
                "title"=>"hello world",
                "poster"=>"hello world.png",
                "video"=>"alan-walker-torine-hello-world_287106.mp4",
            ],
            [
                // 2
                "title"=>"The Sound of Silence",
                "poster"=>"13731-pentatonix-video.jpg",
                "video"=>"y2mate.com - OFFICIAL VIDEO The Sound of Silence  Pentatonix_v144P.mp4",
            ],
            [
                // 3
                "title"=>"Hallelujah",
                "poster"=>"Hallelujah - Pentatonix.jpg",
                "video"=>"[OFFICIAL VIDEO] Hallelujah - Pentatonix [LRP8d7hhpoQ].mp4",
            ],
            [
                // 4
                "title"=>"Big Jet Plane",
                "poster"=>"big-jet-plane.jpg",
                "video"=>"Angus and Julia Stone - Big Jet Plane [Official Music Video] [yFTvbcNhEgc].mp4",
            ],
            [
                // 5
                "title"=>"Helium",
                "poster"=>"helium sia.jpg",
                "video"=>"Sia - Helium (Lyrics) [nLnpvbBSjUY].mp4",
            ],
            [
                // 6
                "title"=>"More Than You Know",
                "poster"=>"45.jpg",
                "video"=>"Axwell Λ Ingrosso - More Than You Know (Lyrics).mp4",
            ],
            [
                // 7
                "title"=>"SYMPHONY",
                "poster"=>"siphony.jpg",
                "video"=>"Clean Bandit - SYMPHONY (Lyrics) feat. Zara Larsson.mp4",
            ],
            [
                // 8
                "title"=>"Love_On_The_Brain",
                "poster"=>"love on the brain.jpg",
                "video"=>"Rihanna_-_Love_On_The_Brain__lyrics_.mp4",
            ],
            [
                // 9
                "title"=>"Only Love Can Hurt Like This",
                "poster"=>"maxresdefault.jpg",
                "video"=>"paloma_faith_only_love_can_hurt_like_this_lyrics_h264_45891.mp4",
            ]
        ];
        $user_video = [
            [
                "user_id" => 3,
                "video_id" => 1
            ],
            [
                "user_id" => 9,
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
            ],
            [
                "user_id" => 10,
                "video_id" => 7
            ],
            [
                "user_id" => 11,
                "video_id" => 7
            ],
            [
                "user_id" => 12,
                "video_id" => 8
            ],
            [
                "user_id" => 13,
                "video_id" => 9
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
