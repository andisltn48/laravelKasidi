<?php

namespace Database\Seeders;

use App\Models\tasks;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tasks::insert([
            'id' => 1,
            'user_id' => 1,
            'nama_task' => 'TASK 1',
            'harga' => 5000,
            'keterangan_task' => 'Keterangan Task 1',
            'batas_pembayaran' => '2021-04-22',
            'status' => 'LUNAS',
        ]);
        tasks::insert([
            'id' => 2,
            'user_id' => 1,
            'nama_task' => 'TASK 2',
            'harga' => 9000,
            'keterangan_task' => 'Keterangan Task 2',
            'batas_pembayaran' => '2021-04-22',
            'status' => 'BELUM LUNAS',
        ]);
    }
}
