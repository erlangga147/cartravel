<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
// use Laracasts\TestDummy\Factory as TestDummy;

class PoolsTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $pools = [
        	[
        		'name'	=> 'Pool_A',
        		'display_name'	=> 'Pool A',
        		'description'	=> 'This is Pool A',
        		'address'	=> 'Jl Pool A Selatan No 1',
        		'city'	=> 'Bandung',
        	],
        	[
        		'name'	=> 'Pool_B',
        		'display_name'	=> 'Pool B',
        		'description'	=> 'This is Pool B',
        		'address'	=> 'Jl Pool B Utara No 1',
        		'city'	=> 'Bandung',
        	],
        	[
        		'name'	=> 'Pool_C',
        		'display_name'	=> 'Pool C',
        		'description'	=> 'This is Pool C',
        		'address'	=> 'Jl Pool C Utara No 1',
        		'city'	=> 'Bandung',
        	],
        	[
        		'name'	=> 'Pool_D',
        		'display_name'	=> 'Pool D',
        		'description'	=> 'This is Pool D',
        		'address'	=> 'Jl Pool D Selatan No 1',
        		'city'	=> 'Jekardah',	
        	],
        	[
        		'name'	=> 'Pool_E',
        		'display_name'	=> 'Pool E',
        		'description'	=> 'This is Pool E',
        		'address'	=> 'Jl Pool E Selatan No 1',
        		'city'	=> 'Jekardah',	
        	],
        	[
        		'name'	=> 'Pool_F',
        		'display_name'	=> 'Pool E',
        		'description'	=> 'This is Pool F',
        		'address'	=> 'Jl Pool F Barat No 1',
        		'city'	=> 'Jekardah',	
        	],
        ];

        foreach ($pools as $key => $pool) {
        	# code...
        	App\Pool::create($pool);
        }
    }
}
