<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UsersTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(PermissionsTableSeeder::class);

        $this->call(PoolsTableSeeder::class);
        $this->call(RoutesTableSeeder::class);
        $this->call(CarTypesTableSeeder::class);
        $this->call(DriversTableSeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(SeatLayoutsTableSeeder::class);
        $this->call(FaresTableSeeder::class);
        $this->call(CarSchedulesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(PassengersTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        Model::reguard();
    }
}
