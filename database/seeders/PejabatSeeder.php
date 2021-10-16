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
        DB::table('pejabat')->insert([
            'nidn' => '72190349',
            'nama' => 'Alex Septimand Gulo',
            'jabatan' => 'Wakil HMSI',
            'ttd' => 'alex.png'
        ]);
    }
}
