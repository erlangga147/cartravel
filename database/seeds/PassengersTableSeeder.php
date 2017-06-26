<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PassengersTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $passengers = [
        	[
        		'name' => 'Erlangga'
        	],
        	[
        		'name' => 'Sudais'
        	],
        	[
        		'name' => 'Saad'
        	],
        ];

        foreach ($passengers as $key => $passenger) {
        	# code...
        	\App\Passenger::create($passenger);
        }
    }
}
