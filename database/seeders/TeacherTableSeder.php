<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->delete();
            Teacher::create([
            'email'  => 'app99@gmail.com',
            'password'  => bcrypt(123123123),
            'Name' => ['en'=> ' Mohamed Eltaher', 'ar'=> '  علي محمد الطاهر'],
            'Specialization_id'  => random_int(1,12),
            'Gender_id'  => random_int(1,2),
            'Joining_Date'  => date('Y-m-d '),
            'Address'  => 'القضارف',
        ]);
            Teacher::create([
            'email'  => 'app100@gmail.com',
            'password'  => bcrypt(123123123),
            'Name' => ['en'=> ' Mohamed Eltaher', 'ar'=> 'عثمان  محمد الطاهر'],
            'Specialization_id'  => random_int(1,12),
            'Gender_id'  => random_int(1,2),
            'Joining_Date'  => date('Y-m-d '),
            'Address'  => 'القضارف',
        ]);
            Teacher::create([
            'email'  => 'app101@gmail.com',
            'password'  => bcrypt(123123123),
            'Name' => ['en'=> ' Mohamed Eltaher', 'ar'=> '  عمر محمد الطاهر'],
            'Specialization_id'  => random_int(1,12),
            'Gender_id'  => random_int(1,2),
            'Joining_Date'  => date('Y-m-d '),
            'Address'  => 'القضارف',
        ]);
    }
}
