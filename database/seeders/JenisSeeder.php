<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis')->insert([
            'jenis_surat' => 'Surat Personalia & SK'
        ]);
        DB::table('jenis')->insert([
            'jenis_surat' => 'Surat Kegiatan Mahasiswa'
        ]);
        DB::table('jenis')->insert([
            'jenis_surat' => 'Surat Undangan'
        ]);
        DB::table('jenis')->insert([
            'jenis_surat' => 'Surat Tugas'
        ]);
        DB::table('jenis')->insert([
            'jenis_surat' => 'Surat Berita Acara Kegiatan'
        ]);
    }
}
