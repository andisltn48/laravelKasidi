<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'id' => 1,
            'name' => 'member',
            'email' => 'member@gmail.com',
            'password' => hash::make('member'),
            'foto' => 'foto1.jpg',
            'role' => 'member',
        ]);
        User::insert([
            'id' => 2,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => hash::make('admin'),
            'foto' => 'foto2.jpg',
            'role' => 'admin',
        ]);
    }
}
