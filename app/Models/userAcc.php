<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class userAcc extends Model
{

    protected $casts = [
        'tasks' => 'array',
    ];

    public function profileData(){
        $email = Auth::user()->email;
        return DB::table('user_data')->where('email', $email)->get();
    }

    // public function tasks(){
    //     $email = Auth::user()->email;
    //     return DB::table('user_acc')->where('email', $email)->get();
    // }
}
