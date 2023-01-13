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
    $likes = DB::table("likes")->where('video_id', $video_id)->get();
    return new JsonResponse($likes);
});

Route::get("/isliked/{data}", function($data){
    $data = json_decode($data);
    $user_id = $data[0];
    $video_id = $data[1];
    $likes = DB::table("likes")->where(["user_id" => $user_id, "video_id" => $video_id])->get();
    if(count($likes) === 0){
        return new JsonResponse(false);
    }else{
        return new JsonResponse(true);
    }
    
});

Route::post("/like", function(Request $request){
    $user_id = $request->input("user_id");
    $video_id = $request->input("video_id");
    DB::table('likes')->where(["user_id" => $user_id, "video_id" => $video_id])->delete();
    DB::table('likes')->insert([
        "user_id" => $user_id,
        "video_id" => $video_id
    ]);
    return new JsonResponse(["status" => "ok"]);
});
Route::get("/unlike/{data}", function($data){
    $data = json_decode($data);
    $user_id = $data[0];
    $video_id = $data[1];
    DB::table('likes')->where(["user_id" => $user_id, "video_id" => $video_id])->delete();
    return new JsonResponse(true);
});

