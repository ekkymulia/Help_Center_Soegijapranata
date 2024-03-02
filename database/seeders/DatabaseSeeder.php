<?php

namespace Database\Seeders;

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

      
        \App\Models\User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
            'level' => null,
            'role_id' => 1,
            'nim' => null
        ]);

        \App\Models\User::factory(1)->create([
            'name' => 'mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
            'level' => null,
            'role_id' => 2,
            'nim' => 'J03904092093'
        ]);

        \App\Models\User::factory(1)->create([
            'name' => 'pimpinan_keuangan',
            'email' => 'pimpinan_keuangan@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
            'level' => 1,
            'role_id' => 3,
            'nim' => null
        ]);

        \App\Models\User::factory(1)->create([
            'name' => 'keuangan',
            'email' => 'keuangan@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
            'level' => 2,
            'role_id' => 3,
            'nim' => null
        ]);
    }
}