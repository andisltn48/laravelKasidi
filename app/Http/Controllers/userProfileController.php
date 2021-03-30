<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAcc;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class userProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;

        $user = userAcc::where('user_id','=',$id)->first();

        return view('vUserProfile', compact('user') );
    }

    public function create($id){
        $user = userAcc::where('user_id','=',$id)->first();
        // echo $user;
        return view('vEditProfile', ['user' => $user] );
    }

    public function store($id){
        $file = Request()->foto;
        $fileName = Request()->nama . '.' .$file->extension();
        $file->move(public_path('images/fotoProfile'), $fileName);
        $userAcc = userAcc::where('user_id','=',$id)->update([
            'nama' => Request()->nama,
            'nim' => Request()->nim,
            'jenis_kelamin' => Request()->jenisKelamin,
            'prodi' => Request()->prodi,
            'jurusan' => Request()->jurusan,

        ]);
        $user = User::where('id','=',$id)->update([
            'foto' => $fileName,
        ]);

        return redirect()->route('profile.index')->with('pesan', 'Profil Berhasil Disimpan!');
    }
}
