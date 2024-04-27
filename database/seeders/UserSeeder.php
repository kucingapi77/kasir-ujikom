<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('1234567'),
            'role'=>'Admin',
            'status'=>'Aktif',
        ],[
            'name'=>'kasir',
            'email'=>'kasir@gmail.com',
            'password'=>bcrypt('7654321'),
            'role'=>'Petugas',
            'status'=>'Aktif',
        ]);
    }
}
