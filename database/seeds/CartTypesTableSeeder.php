<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CarTypesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $carTypes = [
        	[
        		'name' => 'Class_A',
        		'display_name' => 'Class A',
        		'description' => 'This is Class A',
        		'capacity' => '10',
        	],
        	[
        		'name' => 'Class_S',
        		'display_name' => 'Class S',
        		'description' => 'This is Class S. Special.',
        		'capacity' => '7',
        	]
        ];

        foreach ($carTypes as $key => $carType) {
        	# code...
        	App\CarType::create($carType);
        }
    }
}
