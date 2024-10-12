<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        $data = [
            ['key'=> 'school_name', 'value'=> 'مدرسة جوبي الخاصة'],
            ['key'=> 'academy_eayr', 'value'=> '2021-2022'],
            ['key'=> 'school_title', 'value'=> 'JPS'],
            ['key'=> 'school_phone', 'value'=> '0912345678'],
            ['key'=> 'school_adders', 'value'=> 'القضارف - ديم بكر محطة 6'],
            ['key'=> 'school_email', 'value'=> 'jouby@info.com'],
            ['key'=> 'school_logo', 'value'=> 'logo.png'],
        ];
        DB::table('settings')->insert($data);
    }
}
