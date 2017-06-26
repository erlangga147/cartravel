<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $customers = [
        	[
        		'name' => 'Erlangga',
        		'email' => 'erlangga@divusi.com',
        		'phone' => '+6285721256747'
        	],
    		[
        		'name' => 'Saad',
        		'email' => 'saad@divusi.com',
        		'phone' => '+6285721256746'
        	],
        ];

        foreach ($customers as $key => $customer) {
        	# code...
        	\App\Customer::create($customer);
        }
    }
}
