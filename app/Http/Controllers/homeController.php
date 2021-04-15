<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;
use App\Models\User;
use App\Models\tasks;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index(){
        $id = Auth::user()->id;

        $allUser = userAcc::where('role','=','member')->get();
        $user = userAcc::where('user_id','=',$id)->first();
        $task = tasks::where('user_id','=',$id)->get();
        $User = User::where('id','=',$id)->first();

        if ($User->role == "member") {
            return view('vUserHome', compact('user','task','User'));    
        }
        else {
            return view('vAdminHome', ['allUser'=>$allUser] ,compact('user','task','User'));
        }
        // echo $User;
        // dd($id,$task,$user);
        


    }
}
