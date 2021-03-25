<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;


class userProfileController extends Controller
{
    public function __construct(){
        $this->userAcc = new userAcc();
    }

    public function index(){
        $data = [
            'user' => $this->userAcc->profileData(),  
        ];

        return view('vUserProfile', $data);
        return view('layouts/vNav', $data);
        
    }
}
