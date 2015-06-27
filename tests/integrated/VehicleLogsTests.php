<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehicleLogsTests extends TestCase
{
    use DatabaseTransactions, LoginAsUser, CreateVehicle;

    /**
     * @test
     */
    public function it_loads_create_view()
    {
        $this->login()
            ->createVehicle()
            ->visit('vehicles/1/logs/create')
            ->see('Store log');
    }


    public function it_tests()
    {
        // $user = factory(Fuellog\User::class)->create();

        // $vehicles = factory(Fuellog\Vehicle::class, 3)
        //     ->create(['user_id' => $user->id])
        //     ->each(function($vehicle) {
        //         $vehicle->logs()->save(factory(Fuellog\Log::class)->make());
        //     });

        // foreach($vehicles as $vehicle) {

        //     dd($vehicle->logs->toArray());

        // }

        // dd($vehicles->toArray());

    }


}