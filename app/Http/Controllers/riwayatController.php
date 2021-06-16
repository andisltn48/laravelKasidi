<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;
use App\Models\User;
use App\Models\tasks;
use App\Models\transaksi;
use Illuminate\Support\Facades\Auth;

class riwayatController extends Controller
{
    public function index(){
        $id = Auth::user()->id;

        if(Auth::user()->role == 'admin'){
        $allTransaksi = transaksi::where('status','=','Konfirmasi')->get();
        $user = userAcc::where('user_id','=',$id)->first();
        $task = tasks::where('user_id','=',$id)->get();
        $User = User::where('id','=',$id)->first();
        }
        else{
            $allTransaksi = transaksi::where('status','=','Konfirmasi')->where('user_id','=',Auth::user()->id)->get();
            $user = userAcc::where('user_id','=',$id)->first();
            $task = tasks::where('user_id','=',$id)->get();
            $User = User::where('id','=',$id)->first();
        }


        return view('vAdminRiwayat', ['allTransaksi'=>$allTransaksi] ,compact('user','task','User'));
    }
        // echo $User;
        // dd($id,$task,$user);





    public function delete($id){
        $user = transaksi::where('id','=',$id)->delete();

        return redirect()->route('riwayat')->with('pesan', 'Riwayat Berhasil Dihapus!');
    }
}
