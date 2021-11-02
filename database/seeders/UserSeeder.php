<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'kode' => '4DM1N',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'telpon' => '0812345678',
            'role' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'kode' => '72190331',
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'password' => Hash::make('mahasiswa123'),
            'telpon' => '0812345678',
            'role' => 'mahasiswa',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'kode' => '72190001',
            'name' => 'Mahasiswa',
            'email' => 'gabrielmanaor@gmail.com',
            'password' => Hash::make('gabriel123'),
            'telpon' => '0812345678',
            'role' => 'mahasiswa',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'kode' => 'D053N',
            'name' => 'Dosen',
            'email' => 'dosen@gmail.com',
            'password' => Hash::make('dosen123'),
            'telpon' => '0812345678',
            'role' => 'dosen',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
    }
}
