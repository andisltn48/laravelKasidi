<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class userProfileController extends Controller
{
    public function index()
    {
        // $id = Auth
        $produk = userAcc::where('user_id','=',$id)


        ->orderBy('id','asc')->paginate(5);
        // dd($produk,$id);
        return view('penjual.produk',compact('produk'))
                ->with('i',(request()->input('page',1) -1)*5);


    }
}
