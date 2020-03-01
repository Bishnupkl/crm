<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            ['name'=>'BSCCSIT','slug'=>'bsccsit'],
            ['name'=>'BIT', 'slug'=>'bit'],
            ['name'=>'BBA', 'slug'=>'bba'],
        ]);
    }
}
