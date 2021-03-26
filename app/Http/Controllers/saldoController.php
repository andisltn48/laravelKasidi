<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;
use App\Models\user_saldo;
use Illuminate\Support\Facades\Auth;

class saldoController extends Controller
{
    public function __construct(){
        $this->userAcc = new userAcc();
    }

    public function index(){
        $user = $this->userAcc->profileData();

        return view('vTambahSaldo', ['user' => $user]);
        return view('layouts/vNav', ['user' => $user]);
        
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
        $id = Auth::user()->id;

        $data = [
            'user_id' => $id,
            'jumlah_saldo' => Request()->jumlahSaldo,
            'created_at' => date('Y-m-d', strtotime($rawdate)),
            'bukti_pembayaran' => $fileName,
        ];
        $this->saldo = new user_saldo();
        $this->saldo->addsaldo($data);
        return redirect()->route('home')->with('pesan', 'Saldo Berhasil Ditambahkan');

    }
}
