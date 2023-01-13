<?php
namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MyClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_classes')->delete();
        $ct = ClassType::pluck('id')->all();

        $data = [
            ['name' => 'Kelas Satu', 'class_type_id' => $ct[0]],
            ['name' => 'Kelas Dua', 'class_type_id' => $ct[1]],
            ['name' => 'Kelas Tiga', 'class_type_id' => $ct[2]],
            ['name' => 'Kelas Empat', 'class_type_id' => $ct[3]],
            ['name' => 'Kelas Lima', 'class_type_id' => $ct[4]],
            ['name' => 'Kelas Enam', 'class_type_id' => $ct[5]],
        ];

        DB::table('my_classes')->insert($data);

    }
}
