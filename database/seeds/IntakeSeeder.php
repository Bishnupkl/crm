<?php

use Illuminate\Database\Seeder;
use  \Illuminate\Support\Facades\DB;
class IntakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intakes')->insert([
          ['name'   =>  'Yearly', 'slug'=>'yearly'],
          ['name'   =>  'Fall','slug'=>'fall'],
          ['name'   =>  'Semester','slug'=>'semester']
            ]
        );
    }
}
