<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class SeatLayoutsTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $seats = [
        	[
        		'carType_id' => '1',
        		'seat_number' => '0',
        		'row' => '1',
        		'column' => '3'
        	],
        	[
        		'carType_id' => '1',
        		'seat_number' => '1',
        		'row' => '1',
        		'column' => '1'
        	],
        	[
        		'carType_id' => '1',
        		'seat_number' => '2',
        		'row' => '2',
        		'column' => '1'
        	],
        	[
        		'carType_id' => '1',
        		'seat_number' => '3',
        		'row' => '2',
        		'column' => '2'
        	],
        	[
        		'carType_id' => '1',
        		'seat_number' => '4',
        		'row' => '2',
        		'column' => '3'
        	],
        	[
        		'carType_id' => '1',
        		'seat_number' => '5',
        		'row' => '3',
        		'column' => '1'
        	],
        	[
        		'carType_id' => '1',
        		'seat_number' => '6',
        		'row' => '3',
        		'column' => '2'
        	],
        	[
        		'carType_id' => '1',
        		'seat_number' => '7',
        		'row' => '3',
        		'column' => '3'
        	],
        	[
        		'carType_id' => '1',
        		'seat_number' => '8',
        		'row' => '4',
        		'column' => '1'
        	],
        	[
        		'carType_id' => '1',
        		'seat_number' => '9',
        		'row' => '4',
        		'column' => '2'
        	],
        	[
        		'carType_id' => '1',
        		'seat_number' => '10',
        		'row' => '4',
        		'column' => '3'
        	],
        	[
        		'carType_id' => '2',
        		'seat_number' => '0',
        		'row' => '1',
        		'column' => '3'
        	],
        	[
        		'carType_id' => '2',
        		'seat_number' => '1',
        		'row' => '1',
        		'column' => '1'
        	],
        	[
        		'carType_id' => '2',
        		'seat_number' => '2',
        		'row' => '2',
        		'column' => '1'
        	],
        	[
        		'carType_id' => '2',
        		'seat_number' => '3',
        		'row' => '2',
        		'column' => '2'
        	],
        	[
        		'carType_id' => '2',
        		'seat_number' => '4',
        		'row' => '2',
        		'column' => '3'
        	],
        	[
        		'carType_id' => '2',
        		'seat_number' => '5',
        		'row' => '3',
        		'column' => '1'
        	],
        	[
        		'carType_id' => '2',
        		'seat_number' => '6',
        		'row' => '3',
        		'column' => '2'
        	],
        	[
        		'carType_id' => '2',
        		'seat_number' => '7',
        		'row' => '3',
        		'column' => '3'
        	]
        ];

        foreach ($seats as $key => $seat) {
        	# code...
        	App\SeatLayout::create($seat);
        }
    }
}
