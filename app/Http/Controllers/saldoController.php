<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;
use App\Models\user_saldo;
use App\Models\transaksi;
use Illuminate\Support\Facades\Auth;

class saldoController extends Controller
{

    public function show($id){
        
        $user = userAcc::where('user_id','=',$id)->get();
        // echo $user;
        return view('vTambahSaldo', ['user' => $user] );
        return view('layouts/vLink',['user' => $user]);
        
    }

    public function store(){
        Request()->validate([
            'foto_pembayaran' => 'required|mimes:jpg,png',
        ],[
            'foto_pembayaran.required' => 'foto pembayaran harus di isi!',
            'foto_pembayaran.mimes' => 'foto pembayaran harus format jpg atau png!',
            'foto_pembayaran.max' => 'ukuran tidak boleh lebih dari 5mb!',
            
        ]);

        $file = Request()->foto_pembayaran;
        $fileName = Request()->nama . '.' .$file->extension();
        $file->move(public_path('images/buktiPembayaran'), $fileName);
        $rawdate = htmlentities(Request()->tanggal);
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
            'user_id' => Request()->id,
            'jumlah_saldo' => Request()->jumlahSaldo,
            'jenis_pembayaran' => Request()->jenisPembayaran,
            'status' => 'Belum Terkonfirmasi',
            'bukti_pembayaran' => $fileName
        ]);

        return redirect()->route('home')->with('pesan', 'Saldo Berhasil Ditambahkan');

    }
}
