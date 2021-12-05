<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PejabatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tanda_tangan')->insert([
            'nidn' => '12345671',
            'nama' => 'Restyandito, S.Kom., MSIS, Ph.D.',
            'jabatan' => 'Dekan'
        ]);
        DB::table('tanda_tangan')->insert([
            'nidn' => '12345672',
            'nama' => 'Gloria Virginia, S.Kom., MAI, Ph.D.',
            'jabatan' => 'Wakil Dekan I Bidang Akademik (Ketua Program Studi Informatika) dan Pelaksana InQA Program Studi Informatika'
        ]);
        DB::table('tanda_tangan')->insert([
            'nidn' => '12345673',
            'nama' => 'Drs. Jong Jek Siang, M.Sc.',
            'jabatan' => 'Wakil Dekan I Bidang Akademik (Ketua Program Studi Sistem Informasi) dan Pelaksana InQA Program Studi Sistem Informasi'
        ]);
        DB::table('tanda_tangan')->insert([
            'nidn' => '12345674',
            'nama' => 'Widi Hapsari, Dra., M.T.',
            'jabatan' => 'Wakil Dekan II Bidang Keuangan'
        ]);
        DB::table('tanda_tangan')->insert([
            'nidn' => '12345675',
            'nama' => 'Willy Sudiarto Raharjo, S.Kom., M.Cs.',
            'jabatan' => 'Wakil Dekan III Bidang Kemahasiswaan'
        ]);
    }
}
