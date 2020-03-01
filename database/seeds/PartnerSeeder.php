<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partners')->insert([
            'name' =>  'Tribhuvan University',
                'slug' =>'tribhuvan university',
                'category' =>'IT',
                'street'=>'abc road',
                'state'=>'tasmania',
                'country_id'=>'001',
                'phone'=>'001-09984887',
                'email'=>'tu@gmail.com',
                'fax'=>'001-44565444',
                'website' => 'http://tu.edu.np',
        ]);

        DB::table('partners')->insert([
            'name' =>  'Purbanchal University',
            'slug' =>'purbanchal university',
            'category' =>'Hotel Management',
            'street'=>'xyz road',
            'state'=>'melbourne',
            'country_id'=>'001',
            'phone'=>'001-09986887',
            'email'=>'abc@campus.edu',
            'fax'=>'001-44565674',
            'website' => 'http://www.xyz.com.au.edu',
        ]);

        DB::table('partners')->insert([
            'name' =>  'Pokhara university',
            'slug' =>'pokhara university',
            'category' =>'IT',
            'street'=>'achieverse road',
            'state'=>'canbera',
            'country_id'=>'001',
            'phone'=>'001-06784887',
            'email'=>'abc@campus.edu',
            'fax'=>'001-445667344',
            'website' => 'http://www.achieverse.com.au.edu',
        ]);

        DB::table('partners')->insert([
            'name' =>  'Kathmandu university',
            'slug' =>'kathmandu university',
            'category' =>'IT',
            'street'=>'achieverse road',
            'state'=>'canbera',
            'country_id'=>'001',
            'phone'=>'001-06784887',
            'email'=>'abc@campus.edu',
            'fax'=>'001-445667344',
            'website' => 'http://www.achieverse.com.au.edu',
        ]);
    }
}
