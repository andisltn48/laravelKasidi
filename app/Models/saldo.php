<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class saldo extends Model
{
    public function addSaldo($data){
        $email = Auth::user()->email;
        return DB::table('user_saldo')->insert($data);
    }
}
