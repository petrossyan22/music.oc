<?php

namespace App\Http\Controllers;

use App\FSAPI\FSAPI;
use App\Models\Video;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index(){
        $videos = Video::orderBy('id', 'DESC')->take(8)->get();
        return view("index", compact("videos"));
    }
}
