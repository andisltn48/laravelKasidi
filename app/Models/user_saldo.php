<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class user_saldo extends Model
{
    use HasFactory;
    // public $table = 'user_saldo';
    // protected $fillable = [
    //     'nama',
    //     'harga',
    //     'stok',
    //     'penjual_id',
    //     'foto'
    // ];
    public function addSaldo($data){
        // $email = Auth::user()->email;
        return DB::table('transaksi')->insert($data);
    }
}
