<?php

namespace Database\Seeders;

use App\Models\MyClass;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();

        $this->createSubjects();
    }

    protected function createSubjects()
    {
        $subjects = ['Pendidikan Agama dan Budi Pekerti', 'Pendidikan Pancasila dan Kewarganegaran', 'Bahasa Indonesia', 'Bahasa Inggris' , 'Matematika', 'Ilmu Pengetahuan Alam', 'Ilmu Pengetahuan Sosial', 'Seni Budaya dan Keterampilan', 'Pendidikan Jasmani, Olahraga, dan Kesehatan'];
        $sub_slug = ['Agama', 'Ppkn', 'Bindo', 'Binggris','Mtk', 'IPA', 'IPS', 'SBK', 'PJOK'];
        $teacher_id = User::where(['user_type' => 'teacher'])->first()->id;
        $my_classes = MyClass::all();

        foreach ($my_classes as $my_class) {

            $data = [

                [
                    'name' => $subjects[0],
                    'slug' => $sub_slug[0],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ],

                [
                    'name' => $subjects[1],
                    'slug' => $sub_slug[1],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ],

                [
                    'name' => $subjects[2],
                    'slug' => $sub_slug[2],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ],

                [
                    'name' => $subjects[3],
                    'slug' => $sub_slug[3],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ],

                [
                    'name' => $subjects[4],
                    'slug' => $sub_slug[4],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ],

                [
                    'name' => $subjects[5],
                    'slug' => $sub_slug[5],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ],

                [
                    'name' => $subjects[6],
                    'slug' => $sub_slug[6],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ],

                [
                    'name' => $subjects[7],
                    'slug' => $sub_slug[7],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ],

                [
                    'name' => $subjects[8],
                    'slug' => $sub_slug[8],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ],

            ];

            DB::table('subjects')->insert($data);
        }

    }

}
