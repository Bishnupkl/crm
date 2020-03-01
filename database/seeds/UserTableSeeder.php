<?php

use Illuminate\Database\Seeder;
use App\Models\Reception;
use App\Models\User;
use App\Models\Counselor;
use App\Models\Admin;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'username'        => 'admin101',
                'name'            => 'Grace Admin',
                'email'           => 'admin@admin.com',
                'password'        => bcrypt('secret'),
                'phone'           => '9854543432',
                'position'        => 'Super Admin',
                'branch'          => 'Baneshwor',
                'morph_id'        => 1,
                'morph_type'      => 'admin',
                'last_login'      => Carbon::now(),
                'email_verified'  => true,
                'mobile_verified' => true
            ]
        );

        Admin::create(
            [
                'role_id' => 2
            ]
        );
        User::create(
            [
                'username'        => 'counselor101',
                'name'            => 'Grace Counsellor',
                'email'           => 'counselor@counselor.com',
                'password'        => bcrypt('secret'),
                'phone'           => '9854543432',
                'position'        => 'Counselor',
                'branch'          => 'Baneshwor',
                'morph_id'        => 1,
                'morph_type'      => 'counselor',
                'last_login'      => Carbon::now(),
                'email_verified'  => true,
                'mobile_verified' => true
            ]
        );

        Counselor::create(
            [
                'role_id' => 3
            ]
        );
        User::create(
            [
                'username'        => 'reception101',
                'name'            => 'Grace reception',
                'email'           => 'reception@reception.com',
                'password'        => bcrypt('secret'),
                'phone'           => '9854543432',
                'position'        => 'Reception',
                'branch'          => 'Baneshwor',
                'morph_id'        => 1,
                'morph_type'      => 'reception',
                'last_login'      => Carbon::now(),
                'email_verified'  => true,
                'mobile_verified' => true
            ]
        );

        Reception::create(
            [
                'role_id' => 4
            ]
        );
    }
}
