<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class WatchController extends Controller{
    public function index($id){
        $video = Video::all()->where("id", $id)->first();

        $videos = Video::all();

        return view("watch", compact("video", "videos"));
    }
}
