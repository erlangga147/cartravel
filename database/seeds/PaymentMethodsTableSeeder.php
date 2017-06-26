<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PaymentMethodsTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
    	$paymentMethods = [
    		[
    			'name' => 'Tunai',
    			'display_name' => 'Pembayaran Tunai',
    			'description' => 'Metode pembayaran tunai'
    		],
    		[
    			'name' => 'ATM_Transfer',
    			'display_name' => 'ATM Transfer',
    			'description' => 'Metode pembayaran transfer via ATM'
    		],
    		[
    			'name' => 'Kartu_Kredit',
    			'display_name' => 'Kartu Kredit',
    			'description' => 'Metode pembayaran dengan Kartu Kredit'
    		],
    	];

    	foreach ($paymentMethods as $key => $paymentMethod) {
    		# code...
    		\App\PaymentMethod::create($paymentMethod);
    	}

    }
}
