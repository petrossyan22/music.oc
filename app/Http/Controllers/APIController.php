<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class APIController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $likes = DB::table("likes")->join("users", function($join) use($video_id){
        // // dd($user_id);
        // $join->on("likes.user_id", "=", "users.id")->where('likes.video_id', '=', $video_id);
        // })->get();
        return new JsonResponse(1);
    }
}
