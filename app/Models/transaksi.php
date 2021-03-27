<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    public $table = 'transaksi';
    protected $fillable = [
        'nama',
        'user_id',
        'jumlah_saldo',
        'jenis_pembayaran',
        'status',
        'bukti_pembayaran'
    ];
}
