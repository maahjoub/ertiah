<?php

namespace Database\Seeders;

use Database\Factories\VideoFactory;
use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\BloodTableSeeder;
use Database\Seeders\GradeTableSeeder;
use Database\Seeders\TeacherTableSeder;
use Database\Seeders\SectionTableSeeder;
use Database\Seeders\religionTableSeeder;
use Database\Seeders\NationalitiesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(BloodTableSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(religionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(GradeTableSeeder::class);
        $this->call(ClassromTableSeeder::class);
        $this->call(SectionTableSeeder::class);
        $this->call(ParentTableSeeder::class); //parent
        $this->call(StudentTableSeeder::class);
        $this->call(TeacherTableSeder::class);
        $this->call(TypeSeeder::class);
        $this->call(VideoSeeder::class);
    }
}
