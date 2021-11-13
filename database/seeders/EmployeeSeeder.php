<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'username' => 'Admin',
            'name' => 'Gabriel Manaor',
            'email' => 'gabriel@gmail.com',
        ]);
    }
}
