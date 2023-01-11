<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller{
    
    public function index($id){
        $user = User::where("id", $id)->first();
        return view("account", compact("user"));
    }

}
