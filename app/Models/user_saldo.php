<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_saldo extends Model
{
    use HasFactory;
    public $table = 'user_saldo';
    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'penjual_id',
        'foto'
    ];
}
