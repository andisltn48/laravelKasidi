<?php

namespace Database\Seeders;
use App\Models\userAcc;
use Illuminate\Database\Seeder;

class User_dataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        userAcc::insert([
            'id' => 1,
            'nama' => 'member',
            'nim' => 11181024,
            'jenis_kelamin' => 'laki-laki',
            'prodi' => 'INFORMATIKA',
            'jurusan' => 'JMTI',
            'saldo' => 5000,
       
            'user_id' => 1,
        ]);
    }
}
