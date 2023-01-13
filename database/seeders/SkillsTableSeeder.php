<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->delete();

        $this->createSkills();
    }

    protected function createSkills()
    {

        $types = ['AF', 'PS']; // Affective & Psychomotor Traits/Skills
        $d = [

            [ 'name' => 'KETEPATAN WAKTU', 'skill_type' => $types[0] ],
            [ 'name' => 'KEJUJURAN', 'skill_type' => $types[0] ],
            [ 'name' => 'KEANDALAN', 'skill_type' => $types[0] ],
            [ 'name' => 'HUBUNGAN DENGAN ORANG LAIN', 'skill_type' => $types[0] ],
            [ 'name' => 'KESOPANAN', 'skill_type' => $types[0] ],
            [ 'name' => 'KEWASPADAAN', 'skill_type' => $types[0] ],
            [ 'name' => 'TULISAN TANGAN', 'skill_type' => $types[1] ],
            [ 'name' => 'PERMAINAN & OLAHRAGA', 'skill_type' => $types[1] ],
            [ 'name' => 'MENGGAMBAR', 'skill_type' => $types[1] ],
            [ 'name' => 'MELUKIS', 'skill_type' => $types[1] ],
            [ 'name' => 'SKILL MUSIK', 'skill_type' => $types[1] ],
            [ 'name' => 'FLEXIBILITAS', 'skill_type' => $types[1] ],

        ];
        DB::table('skills')->insert($d);
    }

}
