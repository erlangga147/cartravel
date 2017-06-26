<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class TicketsTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $tickets = [
        	[
        		'carSchedule_id' => '1',
                'booking_id' => '1',
                'passenger_id' => '1',
        		'seat_number' => '1',
        		'departure_date' => '2018-01-01'
        	],
        	[
        		'carSchedule_id' => '1',
                'booking_id' => '1',
                'passenger_id' => '2',
        		'seat_number' => '2',
        		'departure_date' => '2018-01-01'
        	],
        	[
        		'carSchedule_id' => '3',
                'booking_id' => '2',
                'passenger_id' => '3',
        		'seat_number' => '1',
        		'departure_date' => '2018-01-01'
        	]
        ];


        foreach ($tickets as $key => $ticket) {
            App\Ticket::create($ticket);
        }
        
    }
}
