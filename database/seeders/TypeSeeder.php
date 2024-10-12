<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();
        DB::table('categories')->delete();

        $types = [
            ['en'=> 'Paid', 'ar'=> 'مدفوع'],
            ['en'=> 'Free', 'ar'=> 'مجاني'],
        ];

        foreach($types as  $type){
            Type::create(['name' => $type]);
        }

        $cats = [
            ['en'=> 'English', 'ar'=> 'انجليزي'],
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'French', 'ar'=> 'فرنسي'],
        ];

        foreach($cats as  $cat){
            Category::create(['name' => $cat]);
        }
    }
}
