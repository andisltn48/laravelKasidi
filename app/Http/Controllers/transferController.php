<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\userAcc;
use Illuminate\Http\Request;
use App\Models\saldo;
// use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;


class transferController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $user = User::where('id','=',$id)->first();
        $User = userAcc::where('id','=',$id)->first();
        $YA = user::orderBy('id','asc')->paginate(5);
        // echo $user;
        return view('vUserTransfer',['YA' => $YA], compact('user','User','YA'));


    }

    public function store(Request $request){
        $User = userAcc::where('user_id','=',$request->userId)->first();
        $id = Auth::user()->id;
        $user = User::where('id','=',$id)->first();
        if ($request->jumlah_saldo > $User->saldo){
            return redirect()->route('transfer')->with('pesan', 'Saldo Tidak Cukup');
        } else{
            Request()->validate([
                'bukti_pembayaran' => 'required|mimes:jpg,png',
            ],[
                'bukti_pembayaran.required' => 'foto pembayaran harus di isi!',
                'bukti_pembayaran.mimes' => 'foto pembayaran harus format jpg atau png!',
                'bukti_pembayaran.max' => 'ukuran tidak boleh lebih dari 5mb!',

            ]);

            $file = Request()->bukti_pembayaran;
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images/buktiPembayaran'), $fileName);
            $id = Auth::user()->id;

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
                'jumlah_saldo' => Request()->jumlah_saldo,
                'jenis_pembayaran' => Request()->jenis_pembayaran,
                'keterangan' => 'Terkonfirmasi',
                'tujuan' => Request()->tujuan,
                'status' => 'Konfirmasi',
                'bukti_pembayaran' => $fileName
            ]);

            $tf = saldo::create([
                'user_id' => Request()->tujuan,
                'saldo'=>Request()->jumlah_saldo,
                'keterangan'=>'keterangan'

            ]);

            $kurangsaldo = - Request()->jumlah_saldo;

            $tf = saldo::create([
                'user_id' => Auth::user()->id,
                'saldo'=>$kurangsaldo,
                'keterangan'=>'keterangan'

            ]);

            return redirect()->route('home')->with('pesan', 'Saldo Berhasil Ditransfer');
        }



    }
}
