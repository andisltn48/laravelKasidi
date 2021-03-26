<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;

class homeController extends Controller
{
    public function __construct(){
        $this->userAcc = new userAcc();
    }

    public function index(){
        $user = $this->userAcc->profileData();

        // foreach ($user as $key) {
        //     $data = $key->tasks;    # code...
        //     $collection = collect(json_decode($data, true));
        //     $tasks = $collection;
        // }



        // print_r($tasks);

        return view('vUserHome', ['user' => $user] );
        return view('layouts/vNav', $user);

        // return view('vUserHome', ['user' => $user, 'tasks' => $tasks] );
        // return view('layouts/vNav', $user);


    }
}
