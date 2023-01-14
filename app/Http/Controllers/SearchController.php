<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class SearchController extends Controller
{
    public function index(Request $request){
        $data = $request->input("search");
        $videos = DB::table("videos")
            ->join('user_video', 'videos.id', '=', 'user_video.video_id')
            ->join('users', 'users.id', '=', 'user_video.user_id')
            ->where('videos.title', 'like', "%$data%")
            ->orWhere('users.name', 'like', "%$data%")
            ->get();
        return view('search', compact('videos'));
    }
}
