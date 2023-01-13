<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types')->delete();

        $data = [
            ['name' => 'Satu', 'code' => 'I'],
            ['name' => 'Dua', 'code' => 'II'],
            ['name' => 'Tiga', 'code' => 'III'],
            ['name' => 'Empat', 'code' => 'IV'],
            ['name' => 'Lima', 'code' => 'V'],
            ['name' => 'Enam', 'code' => 'VI'],
        ];

        DB::table('class_types')->insert($data);

    }
}
