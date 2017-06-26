<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $createInvoice = new \App\Permission();
        $createInvoice->name   = 'create-invoice';
        $createInvoice->display_name   = 'Create Invoice';

        $createInvoice->description = 'Create new invoice';
        $createInvoice->save();

        $editInvoice = new \App\Permission();
        $editInvoice->name  = 'edit-invoice';
        $editInvoice->display_name  = 'Edit Invoice';

        $editInvoice->description   = 'Edit existing invoice';
        $editInvoice->save();

        $deleteInvoice = new \App\Permission();
        $deleteInvoice->name    = 'delete-invoice';
        $deleteInvoice->display_name    = 'Delete Invoice';
        $deleteInvoice->description     = 'Delete existing invoice';
        $deleteInvoice->save();
    }
}
