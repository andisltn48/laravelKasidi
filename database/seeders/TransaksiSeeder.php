<?php

namespace Database\Seeders;

use App\Models\transaksi;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        transaksi::insert([
            'id' => 1,
            'user_id' => 1,
            'jumlah_saldo' => 30000,
            'jenis_pembayaran' => 'Pembayaran',
            'status' => 'Konfirmasi',
            'bukti_pembayaran' => 'bukti1.jpg'
        ]);
        transaksi::insert([
            'id' => 2,
            'user_id' => 1,
            'jumlah_saldo' => 50000,
            'jenis_pembayaran' => 'Top-up',
            'status' => 'Belum Terkonfirmasi',
            'bukti_pembayaran' => 'bukti2.jpg'
        ]);
    }
}
