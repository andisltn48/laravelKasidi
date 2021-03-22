<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminAcc;

class LoginController extends Controller
{
    public function __construct(){
        $this->adminAcc = new adminAcc();
    }

    public function index(){
        $data = [
            'admin' => $this->adminAcc->allData(),
        ];
        return view('vLogin', $data);
    }

    public function check(){

        $acc = admin_accounts::all();      
        // foreach()

    }
}
