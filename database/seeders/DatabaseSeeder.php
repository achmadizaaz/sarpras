<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        
        User::create([
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'role_id'=> 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'email' => "user@gmail.com",
            'email_verified_at' => now(),
            'role_id'=> 0,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        Profil::create([
            'user_id' => 1,
            'nama' => "Administrator",
            'telepon' => "08123456789",
            'alamat' => "Universitas Merdeka Pasuruan",
        ]);

        Profil::create([
            'user_id' => 2,
            'nama' => "User",
            'telepon' => "09876543210",
            'alamat' => "Universitas Merdeka Pasuruan",
        ]);

        Option::create([
            'name_app' => "Sarpras App",
            'shortname_app' => "SA",
        ]);
    }
}
