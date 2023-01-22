<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;


class FBController extends Controller
{
    public function index(Request $request){
        $fb_user = Socialite::driver('facebook')->user();
        $user = User::where("email", $fb_user->email)->first();
        if(is_null($user)){
            $user = User::create([
                "name" => $fb_user->name,
                "email" => $fb_user->email,
                "avatar" => $fb_user->avatar,
                "password" => bcrypt("fb_access"),
            ]);
            Auth::login($user);
            $request->session()->regenerate();
            return redirect("/home");
        }else{
            Auth::login($user);
            $request->session()->regenerate();
            return redirect("/home");
        }
    }
}
