<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;
use App\Models\saldo;

class saldoController extends Controller
{
    public function __construct(){
        $this->userAcc = new userAcc();
    }

    public function index(){
        $data = [
            'user' => $this->userAcc->profileData(),
        ];
        return view('vTambahSaldo', $data);
        return view('layouts/vNav', $data);
        
    }

    public function insertSaldo(){
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

        $data = [
            'email' => Request()->email,
            'waktuPembayaran' => date('Y-m-d', strtotime($rawdate)),
            'buktiPembayaran' => $fileName,
        ];
        $this->saldo = new saldo();
        $this->saldo->addsaldo($data);
        return redirect()->route('home')->with('pesan', 'Saldo Berhasil Ditambahkan');

    }
}
