<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CarSchedulesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $schedules = [
        	[
        		'fare_id' => '1',
        		'car_id' => '1',
        		'driver_id' => '1',
        		'status' => 'Active',
        		'message' => 'Hati-hati di jalan'
        	],
        	[
        		'fare_id' => '1',
        		'car_id' => '2',
        		'driver_id' => '2',
        		'status' => 'Active',
        		'message' => 'Hati-hati di jalan'
        	],
        	[
        		'fare_id' => '2',
        		'car_id' => '3',
        		'driver_id' => '3',
        		'status' => 'Active',
        		'message' => 'Hati-hati di jalan'
        	],
        	[
        		'fare_id' => '3',
        		'car_id' => '4',
        		'driver_id' => '4',
        		'status' => 'Active',
        		'message' => 'Hati-hati di jalan'
        	],
        	[
        		'fare_id' => '4',
        		'car_id' => '5',
        		'driver_id' => '5',
        		'status' => 'Active',
        		'message' => 'Hati-hati di jalan'
        	],
        	[
        		'fare_id' => '4',
        		'car_id' => '6',
        		'driver_id' => '6',
        		'status' => 'Active',
        		'message' => 'Hati-hati di jalan'
        	],
        	[
        		'fare_id' => '5',
        		'car_id' => '7',
        		'driver_id' => '7',
        		'status' => 'Active',
        		'message' => 'Hati-hati di jalan'
        	]
        ];

        foreach ($schedules as $key => $schedule) {
            # code...
            App\CarSchedule::create($schedule);
        }
    }
}
