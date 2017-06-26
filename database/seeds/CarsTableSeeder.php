<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CarsTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $cars = [
        	[
        		'carType_id' => '1',
        		'brand' => 'KIA',
        		'license_plate' => 'D 1111 KI',
        		'year' => '2002'
        	],
            [
                'carType_id' => '1',
                'brand' => 'KIA',
                'license_plate' => 'D 2222 KI',
                'year' => '2002'
            ],
            [
                'carType_id' => '1',                
                'brand' => 'KIA',
                'license_plate' => 'D 3333 KI',
                'year' => '2000'    
            ],
            [
                'carType_id' => '1',                
                'brand' => 'KIA',
                'license_plate' => 'D 4444 KI',
                'year' => '2000'    
            ],
        	[
        		'carType_id' => '2',        		
        		'brand' => 'Hyun',
        		'license_plate' => 'D 1111 HY',
        		'year' => '2000'	
        	],
            [
                'carType_id' => '2',                
                'brand' => 'Hyun',
                'license_plate' => 'D 2222 HY',
                'year' => '2000'    
            ],
            [
                'carType_id' => '2',                
                'brand' => 'Hyun',
                'license_plate' => 'D 3333 HY',
                'year' => '2000'    
            ],        	
        ];

        foreach($cars as $key => $car)
        {
        	App\Car::create($car);
        }
    }
}
