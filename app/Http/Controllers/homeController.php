<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index(){
        $id = Auth::user()->id;

        $user = userAcc::where('user_id','=',$id)->get();

        return view('vUserHome', ['user' => $user] );
        return view('layouts/vLink',['user' => $user]);

    }
}
