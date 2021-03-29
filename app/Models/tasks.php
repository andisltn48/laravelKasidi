<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    use HasFactory;
    public $table = 'tasks';
    protected $fillable = [
        'id',
        'user_id',
        'nama_task',
        'harga',
        'keterangan_task',
        'batas_pembayaran',
        'status',
    ];
}