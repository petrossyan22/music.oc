<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        \App\Events\MyEvent::dispatch("apeeeeee");
        // event(new \App\Events\MyEvent('hello world'));
        return view('home', compact('users'));
    }
    public function message(Request $request)
    {
        $users = User::all();
        $message = $request->all();
        \App\Events\MyEvent::dispatch($message);
        // event(new \App\Events\MyEvent('hello world'));
        return view('home', compact('users'));
    }
}
