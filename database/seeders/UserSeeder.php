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
            'tempat_lahir' => 'Rumah Sakit',
            'tgl_lahir' => '1990-05-24',
            'jekel' => 'Laki-Laki',
            'agama' => 'Kristen',
            'alamat' => 'Tidak Diketahui',
            'prodi' => 'Sistem Informasi',
            'semester' => 'Gasal',
            'periode' => '2010/2011',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'kode' => '72190315',
            'name' => 'Ferry',
            'email' => 'ferry@gmail.com',
            'password' => Hash::make('ferry123'),
            'telpon' => '0812345678',
            'role' => 'mahasiswa',
            'tempat_lahir' => 'Rumah Sakit',
            'tgl_lahir' => '2001-08-24',
            'jekel' => 'Laki-Laki',
            'agama' => 'Katolik',
            'alamat' => 'Tidak Diketahui',
            'prodi' => 'Sistem Informasi',
            'semester' => 'Gasal',
            'periode' => '2019/2020',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'kode' => '72190273',
            'name' => 'Yonathan Sebastian',
            'email' => 'yonas@gmail.com',
            'password' => Hash::make('yonas123'),
            'telpon' => '0812345678',
            'role' => 'mahasiswa',
            'tempat_lahir' => 'Rumah Sakit',
            'tgl_lahir' => '2001-01-23',
            'jekel' => 'Laki-Laki',
            'agama' => 'Kristen',
            'alamat' => 'Tidak Diketahui',
            'prodi' => 'Sistem Informasi',
            'semester' => 'Gasal',
            'periode' => '2019/2020',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'kode' => '72190331',
            'name' => 'Gabriel Manaor Adi Pratama',
            'email' => 'mana@gmail.com',
            'password' => Hash::make('mana123'),
            'telpon' => '0812345678',
            'role' => 'mahasiswa',
            'tempat_lahir' => 'Rumah Sakit',
            'tgl_lahir' => '2001-08-27',
            'jekel' => 'Laki-Laki',
            'agama' => 'Kristen',
            'alamat' => 'Tidak Diketahui',
            'prodi' => 'Sistem Informasi',
            'semester' => 'Gasal',
            'periode' => '2019/2020',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'kode' => '72190325',
            'name' => 'Indra Nugraha',
            'email' => 'indra@gmail.com',
            'password' => Hash::make('indra123'),
            'telpon' => '0812345678',
            'role' => 'mahasiswa',
            'tempat_lahir' => 'Rumah Sakit',
            'tgl_lahir' => '2001-11-10',
            'jekel' => 'Laki-Laki',
            'agama' => 'Kristen',
            'alamat' => 'Tidak Diketahui',
            'prodi' => 'Sistem Informasi',
            'semester' => 'Gasal',
            'periode' => '2019/2020',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'kode' => '72190295',
            'name' => 'Yosua Tjhangesto',
            'email' => 'yosua@gmail.com',
            'password' => Hash::make('admin123'),
            'telpon' => '0812345678',
            'role' => 'mahasiswa',
            'tempat_lahir' => 'Rumah Sakit',
            'tgl_lahir' => '2001-03-19',
            'jekel' => 'Laki-Laki',
            'agama' => 'Katolik',
            'alamat' => 'Tidak Diketahui',
            'prodi' => 'Sistem Informasi',
            'semester' => 'Gasal',
            'periode' => '2019/2020',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'kode' => '12345678',
            'name' => 'Gabriel Indra W.T',
            'email' => 'gabriel@gmail.com',
            'password' => Hash::make('gabriel123'),
            'telpon' => '0812345678',
            'role' => 'dosen',
            'tempat_lahir' => 'Rumah Sakit',
            'tgl_lahir' => '1990-05-23',
            'jekel' => 'Laki-Laki',
            'agama' => 'Kristen',
            'alamat' => 'Tidak Diketahui',
            'prodi' => 'Sistem Informasi',
            'semester' => 'Gasal',
            'periode' => '2020/2021',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'kode' => '12345679',
            'name' => 'Argo Wibowo',
            'email' => 'argo@gmail.com',
            'password' => Hash::make('argo123'),
            'telpon' => '0812345678',
            'role' => 'dosen',
            'tempat_lahir' => 'Rumah Sakit',
            'tgl_lahir' => '1990-05-25',
            'jekel' => 'Laki-Laki',
            'agama' => 'Kristen',
            'alamat' => 'Tidak Diketahui',
            'prodi' => 'Sistem Informasi',
            'semester' => 'Gasal',
            'periode' => '2008/2009',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
    }
}
