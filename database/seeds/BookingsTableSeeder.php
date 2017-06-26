<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class BookingsTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $bookings = [
        	[
        		'customer_id' => '1',
        		'paymentMethod_id' => '1',
        		'payment_status' => 'On Process',
        	],
        	[
        		'customer_id' => '2',
        		'paymentMethod_id' => '1',
        		'payment_status' => 'On Process',
        	],
        ];

        foreach ($bookings as $key => $booking) {
        	# code...
        	\App\Booking::create($booking);
        }
    }
}
