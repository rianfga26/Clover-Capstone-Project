<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // Seeder untuk tipe admin 'posyandu'
         User::create([
            'username' => 'posyandu',
            'email' => 'posyandu@gmail.com',
            'tipe_admin' => 'utama',
            'password' => Hash::make('password123'),
            
        ]);

        // Seeder untuk tipe admin 'dusun'
        User::create([

            'username' => 'dusun',
            'email' => 'dusun@gmail.com',
            'tipe_admin' => 'dusun',
            'password' => Hash::make('password123'),
            

        ]);
    }
}
