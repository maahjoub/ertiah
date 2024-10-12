<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\My_Parent;
use App\Models\Type_blode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();
         Student::create([
            'name' => ['en'=> 'Mahgoub Mohamed Eltaher', 'ar'=> 'محجوب محمد الطاهر'],
            'email'  => 'app1@gmail.com',
            'password'  => bcrypt(123123123),
            'gender_id'  => Gender::all()->unique()->random()->id,
            'nationalitie_id'  => random_int(1,200),
            'blood_id'  => Type_blode::all()->unique()->random()->id,
            'Date_Birth'  => date('Y-m-d '),
            'Grade_id'  => Grade::all()->unique()->random()->id,
            'Classroom_id'  => Classroom::all()->unique()->random()->id,
            'section_id'  => Section::all()->unique()->random()->id,
            'parent_id'  => My_Parent::all()->unique()->random()->id,
            'academic_year'  => 2021,
        ]);
         Student::create([
            'name' => ['en'=> 'Abbas Mohammed Al-Taher', 'ar'=> 'عباس محمد الطاهر '],
            'email'  => 'app2@gmail.com',
           'password'  => bcrypt(123123123),
            'gender_id'  => Gender::all()->unique()->random()->id,
            'nationalitie_id'  => random_int(1,200),
            'blood_id'  => Type_blode::all()->unique()->random()->id,
            'Date_Birth'  => date('Y-m-d '),
            'Grade_id'  => Grade::all()->unique()->random()->id,
            'Classroom_id'  => Classroom::all()->unique()->random()->id,
            'section_id'  => Section::all()->unique()->random()->id,
            'parent_id'  => My_Parent::all()->unique()->random()->id,
            'academic_year'  => 2021,
        ]);
        
    }
}
