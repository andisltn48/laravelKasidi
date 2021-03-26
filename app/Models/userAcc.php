<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class userAcc extends Model
{

    // protected $casts = [
    //     'tasks' => 'array',
    // ];

    public function profileData(){
        $id = Auth::user()->id;
        return DB::table('user_data')->where('user_id', $id)->get();
    }

    public function userData(){
        $id = Auth::user()->id;
        return DB::table('users')->where('id', $id)->get();
    }

    public function insertData($data){
        // $email = Auth::user()->email;
        return DB::table('user_data')->insert($data);
    }



    // public function tasks(){
    //     $email = Auth::user()->email;
    //     return DB::table('user_acc')->where('email', $email)->get();
    // }
}
