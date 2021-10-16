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
            'jenis_surat' => 'Surat Personalia & SK',
            'href' => 'suratPersonalia'
        ]);
        DB::table('jenis')->insert([
            'jenis_surat' => 'Surat Kegiatan Mahasiswa',
            'href' => 'suratKeterangan'
        ]);
        DB::table('jenis')->insert([
            'jenis_surat' => 'Surat Undangan',
            'href' => 'suratUndangan'
        ]);
        DB::table('jenis')->insert([
            'jenis_surat' => 'Surat Tugas',
            'href' => 'suratTugas'
        ]);
        DB::table('jenis')->insert([
            'jenis_surat' => 'Surat Berita Acara Kegiatan',
            'href' => 'suratBerita'
        ]);
    }
}
