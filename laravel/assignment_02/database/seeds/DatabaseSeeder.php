<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('majors')->insert([
        //    'name' => Str::random(10),
        //]);
         $this->call(MajorSeeder::class);
    }
}
