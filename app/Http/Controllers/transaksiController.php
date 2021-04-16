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

    public function store($jenis){
        $user = transaksi::where('jenis_pembayaran','=',$jenis)->update([
            'status' => 'Konfirmasi',
        ]);
        $transaksi = transaksi::where('jenis_pembayaran','=',$jenis)->first();
        $userSaldo = userAcc::where('user_id','=',$transaksi->user_id)->first();
        if ($transaksi->status == 'Konfirmasi') {
            if ($transaksi->jenis_pembayaran == 'Top-up') {
                $userSaldo = userAcc::where('user_id','=',$transaksi->user_id)->update([
                    'saldo' => $userSaldo->saldo + $transaksi->jumlah_saldo,
                ]);
            } else {
                $userTask = tasks::where('user_id','=',$transaksi->user_id)->update([
                    'status' => 'LUNAS',
                ]);
            }
        }
        $user = transaksi::where('status','=','Konfirmasi')->delete();

        return redirect()->route('transaksi')->with('pesan', 'Konfirmasi Berhasil Dilakukan');
    }
}
