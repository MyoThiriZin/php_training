<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $majors = ['HTML', 'CSS', 'JS', 'PHP', 'SQL', 'LARAVEL'];
        foreach($majors as $major) {
            DB::table('majors')->insert([
                    'name' => "$major"]);
        }
    }
}
