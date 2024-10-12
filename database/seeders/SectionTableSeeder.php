<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('sections')->delete();

           $Sections = [
            ['en'=> 'A', 'ar'=> 'أ'],
            ['en'=> 'B', 'ar'=> ' ب'],
            ['en'=> 'C', 'ar'=> ' ت'],
            ['en'=> 'D', 'ar'=> ' ث'],
            ['en'=> 'G', 'ar'=> ' ج'],
            ['en'=> 'H', 'ar'=> ' ح'],
        ];

        foreach ($Sections as $section) {
            Section::create([
                'Name_Section' => $section,
                'Status' => 1,
                'Grade_id' => Grade::all()->unique()->random()->id,
                'Class_id' => Classroom::all()->unique()->random()->id
            ]);
        }
    }
}
