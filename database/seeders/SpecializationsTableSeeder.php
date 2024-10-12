<?php

namespace Database\Seeders;

use App\Models\Specializations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'Sciences', 'ar'=> 'علوم'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي'],
            ['en'=> 'English', 'ar'=> 'انجليزي'],
            ['en'=> 'engineering', 'ar'=> 'هندسة'],
            ['en'=> 'history', 'ar'=> 'تاريخ'],
            ['en'=> 'geography', 'ar'=> 'جغرافيا'],
            ['en'=> 'Religious education', 'ar'=> 'تربية اسلامية'],
            ['en'=> 'Biology', 'ar'=> 'احياء'],
            ['en'=> 'chemistry', 'ar'=> 'كيمياء'],
            ['en'=> 'physics', 'ar'=> 'فيزياء'],
            ['en'=> 'Mathematics', 'ar'=> 'رياضيات'],
        ];
        foreach ($specializations as $S) {
            Specializations::create(['Name' => $S]);
        }
    }
}
