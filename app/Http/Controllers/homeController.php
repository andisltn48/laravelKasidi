<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;
use App\Models\User;
use App\Models\saldo;
use App\Models\tasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $testsaldo = saldo::where('user_id','=',$id)->get();
        $allUser = userAcc::where('role','=','member')->get();
        $user = userAcc::where('user_id','=',$id)->first();
        $task = tasks::where('user_id','=',$id)->get();
        $User = User::where('id','=',$id)->first();
        $userSaldo = $testsaldo->SUM('saldo');

        $saldoupdate = userAcc::where('user_id',$id)->update([
            'saldo' => $userSaldo,
        ]);

        function convert($saldo){
            return 'Rp. '.strrev(implode('.',str_split(strrev(strval($saldo)),3)));
        };
        $saldoRupiah = convert($userSaldo);
        // dd($userSaldo);
        if ($User->role == "member") {
            return view('vUserHome', compact('user','task','User','saldoRupiah'));
        }
        else {
            return view('vAdminHome', ['allUser'=>$allUser] ,compact('user','task','User'));
        }
        echo $User;
        dd($id,$task,$user);



    }

    public function delete($id)
    {
        $user = userAcc::where('id','=',$id)->delete();
        $User = User::where('id','=',$id)->delete();
        return redirect()->route('riwayat')->with('pesan', 'Riwayat Berhasil Dihapus!');
    }
}
