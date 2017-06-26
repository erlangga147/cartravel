<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class FaresTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $fares = [
        	[
        		'route_id' => '1',
                'carType_id' => '1',
        		'departure_time' => '08:00:00',
                'price' => 100000
        	],
            [
                'route_id' => '1',
                'carType_id' => '1',
                'departure_time' => '09:00:00',
                'price' => 100000
            ],
        	[
        		'route_id' => '1',
                'carType_id' => '2',
        		'departure_time' => '08:00:00',
                'price' => 120000
        	],
        	[
        		'route_id' => '2',
                'carType_id' => '1',
        		'departure_time' => '08:00:00',
                'price' => 100000
        	],
        	[
        		'route_id' => '2',
                'carType_id' => '2',
        		'departure_time' => '08:00:00',
                'price' => 120000
        	],
        ];

        foreach($fares as $key => $fare)
        {
        	App\Fare::create($fare);
        }
    }
}
