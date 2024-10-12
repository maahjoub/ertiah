<?php

namespace Database\Seeders;

use App\Models\My_Parent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my__parents')->delete();
            My_Parent::create([
            'email'  => 'app11@gmail.com',
            'password'  => bcrypt(123123123),
            'Name_Father' => ['en'=> ' Mohamed Eltaher', 'ar'=> ' محمد الطاهر'],
            'National_ID_Father'  => 1231231230,
            'Passport_ID_Father'  => 1231233210,
            'Phone_Father'  => '0929907142',
            'Job_Father'  => ['en' => 'anu job' , 'ar' => 'اي عمل'],
            'Nationality_Father_id'  => random_int(1,200),
            'Blood_Type_Father_id'  => random_int(1,8),
            'Religion_Father_id'  => random_int(1,3),
            'Address_Father'  => 'القضارف',
            'Name_Mother'  => ['en'=> 'Rasha Mohamed Eltaher', 'ar'=> 'رشا محمد الطاهر'],
            'National_ID_Mother'  => 1231231230,
            'Passport_ID_Mother'  => 1231233210,
            'Phone_Mother'  => '0929907142',
            'Job_Mother'  => ['en' => 'anu job' , 'ar' => 'اي عمل'],
            'Nationality_Mother_id'  => random_int(1,200),
            'Blood_Type_Mother_id'  => random_int(1,8),
            'Religion_Mother_id'  => random_int(1,3),
            'Address_Mother'  => 'القضارف',
        ]);
             My_Parent::create([
            'email'  => 'app12@gmail.com',
            'password'  => bcrypt(123123123),
            'Name_Father' => ['en'=> ' Mahmod Eltaher', 'ar'=> ' احمد الطاهر'],
            'National_ID_Father'  => 1231231230,
            'Passport_ID_Father'  => 1231233210,
            'Phone_Father'  => '0929907142',
            'Job_Father'  => ['en' => 'anu job' , 'ar' => 'اي عمل'],
            'Nationality_Father_id'  => random_int(1,200),
            'Blood_Type_Father_id'  => random_int(1,8),
            'Religion_Father_id'  => random_int(1,3),
            'Address_Father'  => 'القضارف',
            'Name_Mother'  => ['en'=> 'Hosna Mohamed Eltaher', 'ar'=> 'حسنة محمد الطاهر'],
            'National_ID_Mother'  => 1231231230,
            'Passport_ID_Mother'  => 1231233210,
            'Phone_Mother'  => '0929907142',
            'Job_Mother'  => ['en' => 'anu job' , 'ar' => 'اي عمل'],
            'Nationality_Mother_id'  => random_int(1,200),
            'Blood_Type_Mother_id'  => random_int(1,8),
            'Religion_Mother_id'  => random_int(1,3),
            'Address_Mother'  => 'القضارف',
        ]);
    }
}
