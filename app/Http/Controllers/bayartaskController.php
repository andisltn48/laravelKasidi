<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\transaksi;
use App\Models\userAcc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class bayartaskController extends Controller
{
    public function create(){
        $id = Auth::user()->id;
        $user1 = userAcc::where('user_id','=',$id)->first();

        $User = User::where('id','=',$id)->first();
        // echo $user;
        return view('vUserTransaksi', compact('user','User1'));


    }

    public function store($id){
        Request()->validate([
            'foto_pembayaran' => 'required|mimes:jpg,png',
        ],[
            'foto_pembayaran.required' => 'foto pembayaran harus di isi!',
            'foto_pembayaran.mimes' => 'foto pembayaran harus format jpg atau png!',
            'foto_pembayaran.max' => 'ukuran tidak boleh lebih dari 5mb!',

        ]);

        $file = Request()->foto_pembayaran;
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('images/buktiPembayaran'), $fileName);
        // $id = Auth::user()->id;

        // $data = [
        //     'user_id' => $id,
        //     'jumlah_saldo' => Request()->jumlahSaldo,
        //     'created_at' => date('Y-m-d', strtotime($rawdate)),
        //     'bukti_pembayaran' => $fileName,
        // ];
        // $this->saldo = new user_saldo();
        // $this->saldo->addsaldo($data);
        $transaksi = transaksi::create([
            'user_id' => $id,
            'nama' => Request()->nama,
            'jumlah_saldo' => Request()->jumlahSaldo,
            'jenis_pembayaran' => Request()->jenisPembayaran,
            'status' => 'Belum Terkonfirmasi',
            'bukti_pembayaran' => $fileName
        ]);

        return redirect()->route('home')->with('pesan', 'Pembayaran Berhasil Dilakukan');

    }
}
