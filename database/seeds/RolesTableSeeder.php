<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $roles = [
            [
                'name'  =>  'Travel-Administrator',
                'display_name'  =>  'Administrator',
                'description'   =>  'Administrator of The Travel Company'
            ],
            [
                'name'  =>  'Travel-Customer',
                'display_name'  =>  'Customer',
                'description'   =>  'Just ordinary customer'
            ]
        ];

        foreach ($roles as $role)
        {
            App\Role::create($role);
        }
    }
}
