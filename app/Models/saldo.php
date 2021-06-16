<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saldo extends Model
{
    use HasFactory;
    public $table = 'saldo_user';
    protected $fillable = [
        'id',
        'user_id',
        'saldo',
        'keterangan',
    ];
}
