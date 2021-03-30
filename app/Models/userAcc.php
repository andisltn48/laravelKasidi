<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userAcc extends Model
{
    use HasFactory;
    public $table = 'user_data';
    protected $fillable = [
        'id',
        'nama',
        'nim',
        'jenis_kelamin',
        'prodi',
        'jurusan',
        'saldo',
        'user_id',
    ];
}
