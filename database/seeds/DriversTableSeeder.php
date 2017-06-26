<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class DriversTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $drivers = [
        	[
        		'name' => 'Asep',
        		'phone' => '081234567890',
        		'address' => 'Jl Abc No 1'
        	],
        	[
        		'name' => 'Budi',
        		'phone' => '081234567891',
        		'Address' => 'Jl Abc No 2'
        	],
        	[
        		'name' => 'Cahayo',
        		'phone' => '081234567892',
        		'address' => 'Jl Bcd No 1'
        	],
        	[
        		'name' => 'Dodi',
        		'phone' => '081234567893',
        		'address' => 'Jl Bcd No 2'
        	],
        	[
        		'name' => 'Enjang',
        		'phone' => '081234567894',
        		'address' => 'Jl Abc No 3'
        	],
        	[
        		'name' => 'Fanny',
        		'phone' => '081234567895',
        		'address' => 'Jl Abc No 4'
        	],
        	[
        		'name' => 'Gaga',
        		'phone' => '081234567896',
        		'address' => 'Jl Abc No 5'
        	]

        ];

        foreach ($drivers as $key => $driver) {
        	# code...
        	App\Driver::create($driver);
        }
    }
}
