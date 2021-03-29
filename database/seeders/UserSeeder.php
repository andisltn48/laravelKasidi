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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => hash::make('admin'),
            'role' => 'admin',
        ]);
        User::insert([
                        'id' => 2,
                        'name' => 'member',
                        'email' => 'member@gmail.com',
                        'password' => hash::make('member'),
                        'role' => 'member',
        ]);
    }
}