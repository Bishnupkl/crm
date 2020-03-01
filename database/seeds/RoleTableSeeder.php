<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            [
                'name'  => 'Super Admin',
                'slug'  => 'super-admin'
            ]
        );

        Role::create(
            [
                'name'  => 'Admin',
                'slug'  => 'admin'
            ]
        );

        Role::create(
            [
                'name'      => 'Counselor',
                'slug'      => 'counselor'
            ]
        );
        Role::create(
            [
                'name'      => 'Reception',
                'slug'      => 'reception'
            ]
        );
    }
}
