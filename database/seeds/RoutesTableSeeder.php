<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class RoutesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
    	$params = [
    		[
    			'Pool_A',
    			'Pool_E',
    			'3.5'
    		],
            [
                'Pool_A',
                'Pool_D',
                '3.5'
            ],
    		[
    			'Pool_B',
    			'Pool_D',
    			'2.5'
    		],
            [
                'Pool_B',
                'Pool_F',
                '3'
            ],
    		[
    			'Pool_C',
    			'Pool_F',
    			'4.0'
    		]
    	];

    	foreach($params as $key => $param)
    	{
	        $origin = \App\Pool::where('name', $param[0])->first();
        	$destination = \App\Pool::where('name', $param[1])->first();
        
    	    $origin->destinations()->save($destination,array('duration' => $param[2]));
            // App\Route::create($param);
    	}

    }
}
