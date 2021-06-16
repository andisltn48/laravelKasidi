<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;
use App\Models\User;
use App\Models\user_saldo;
use App\Models\transaksi;
use App\Models\tasks;
use Illuminate\Support\Facades\Auth;

class createTasksController extends Controller
{

    public function create($id){
        $ID = Auth::user()->id;
        $user = userAcc::where('user_id','=',$id)->first();

        $User = User::where('id','=',$ID)->first();
        // echo $user;
        return view('vCreateTask', compact('user','User'));


    }

    public function store($id){

        $transaksi = tasks::create([
            'user_id' => $id,
            'nama_task' => Request()->nama,
            'harga' => Request()->harga,
            'keterangan_task' => Request()->keterangan,
            'batas_pembayaran' => Request()->batasPembayaran,
            'status' => 'BELUM LUNAS',
        ]);

        return redirect()->route('home')->with('pesan', 'Task Berhasil Ditambahkan');

    }
}
