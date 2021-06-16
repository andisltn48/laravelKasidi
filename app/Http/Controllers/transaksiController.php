<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;
use App\Models\User;
use App\Models\tasks;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class transaksiController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;

        if (Auth::user()->role == "admin") {
            $allTransaksi = transaksi::where('status', '=', 'Belum Terkonfirmasi')->get();
            $user = userAcc::where('user_id', '=', $id)->first();
            $task = tasks::where('user_id', '=', $id)->get();
            $User = User::where('id', '=', $id)->first();

            return view('vAdminTransaksi', ['allTransaksi' => $allTransaksi], compact('user', 'task', 'User'));
        } else {
            $allTransaksi = tasks::where('user_id', '=', $id)->orderBy('id','asc')->paginate(5);
            $user = userAcc::where('user_id', '=', $id)->first();
            $task = tasks::where('user_id', '=', $id)->get();
            $User = User::where('id', '=', $id)->first();
            // dd($task);
            return view('vUserTransaksi',['allTransaksi' => $allTransaksi], compact('user', 'task', 'User'));
        }
    }

    public function store($id)
    {
        $user = transaksi::where('id', '=', $id)->update([
            'status' => 'Konfirmasi',
        ]);
        $transaksi = transaksi::where('id', '=', $id)->first();
        $userSaldo = userAcc::where('user_id', '=', $transaksi->user_id)->first();
        if ($transaksi->status == 'Konfirmasi') {
            if ($transaksi->jenis_pembayaran == 'Top-up') {
                $userSaldo = userAcc::where('user_id', '=', $transaksi->user_id)->update([
                    'saldo' => $userSaldo->saldo + $transaksi->jumlah_saldo,
                ]);
            } else {
                $userTask = tasks::where('user_id', '=', $transaksi->user_id)->update([
                    'status' => 'LUNAS',
                ]);
            }
        }
        // $user = transaksi::where('status','=','Konfirmasi')->delete();

        return redirect()->route('transaksi')->with('pesan', 'Konfirmasi Berhasil Dilakukan');
    }

    public function getHargaTask(Request $request){
        echo $request->id;
        $tasks = DB::table("tasks")
            ->where("nama_task",$request->name)
            ->get();
            return response()->json($tasks);
    }
}
