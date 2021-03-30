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

        $user = userAcc::where('user_id','=',$id)->first();

        return view('vUserHome', compact('user'));


    }
}
