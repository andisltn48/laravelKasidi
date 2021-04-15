<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;
use App\Models\User;
use App\Models\tasks;
use App\Models\transaksi;
use Illuminate\Support\Facades\Auth;

class transaksiController extends Controller
{
    public function index(){
        $id = Auth::user()->id;

        $allTransaksi = transaksi::where('status','=','Belum Terkonfirmasi')->get();
        $user = userAcc::where('user_id','=',$id)->first();
        $task = tasks::where('user_id','=',$id)->get();
        $User = User::where('id','=',$id)->first();

        if ($User->role == "member") {
            return view('vUserTransaksi', compact('user','task','User'));    
        }
        else {
            return view('vAdminTransaksi', ['allTransaksi'=>$allTransaksi] ,compact('user','task','User'));
        }
        // echo $User;
        // dd($id,$task,$user);
        


    }
}
