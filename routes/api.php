<?php

use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
/*
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("/", function(){
    return new JsonResponse("API/");
});
Route::get("/videos", function(){
    $videos = Video::all();
    return new JsonResponse($videos);
});
Route::get("/videos/{id}", function(){
    return new JsonResponse(5);
});
Route::get("/likes/{video_id}", function($video_id){

    $likes = DB::table("likes")->join("users", function($join) use($video_id){

        $join->on("likes.user_id", "=", "users.id")->where('likes.video_id', '=', $video_id);
    })->get();
    return new JsonResponse($likes);
});

Route::get("/isliked/{video_id}", function($data){
    $data = json_decode($data);
    $user_id = $data[0];
    $video_id = $data[1];
    $likes = DB::table("likes")->join("users", function($join) use($video_id, $user_id){
        // dd($user_id);
        $join->on("likes.user_id", "=", "users.id")->where('likes.video_id', '=', $video_id)->where('likes.user_id', '=', $user_id);
        
    })->get();
    if($likes == []){
        return new JsonResponse(false);
    }else{
        return new JsonResponse(true);
    }
    
});