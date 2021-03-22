<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detailUser;

class homeController extends Controller
{
    public function __construct(){
        $this->detailUser = new detailUser();
    }

    public function index(){
        $data = [
            'user' => $this->detailUser->allData(),
        ];
        return view('vHome', $data);
        return view('layouts/vNav', $data);
        
    }
}
