<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehicleTest extends TestCase
{
    use DatabaseTransactions, LoginAsUser, CreateVehicle;

    /**
     * @test
     */
    public function it_loads_view()
    {
        $this->login()
            ->visit('vehicles/create')
            ->see("Add new vehicle");
    }

    /**
     * @test
     */
    public function it_shows_validation_errors()
    {
        $this->login()
            ->visit('vehicles/create')
            ->submitForm('Create vehicle', [])
            ->seePageIs('vehicles/create')
            ->see("The name field is required.");
    }

    /**
     * @test
     */
    public function it_creates_vehicles()
    {
        $this->login()
            ->visit('vehicles/create')
            ->submitForm('Create vehicle', [
                'name'             => 'Ferrari',
                'initial_odometer' => 10
            ])
            ->seePageIs('/')
            ->seeInDatabase('vehicles', ['name' => 'Ferrari']);
    }

    /**
     * @test
     */
    public function it_loads_show_view()
    {
        $this->login()->createVehicle()->visit('vehicles/1')->see('Delete');
    }

    /**
     * @test
     */
    public function it_loads_edit_view()
    {
        $this->login()->createVehicle()->visit('vehicles/1/edit')->see('Update Vehicle');
    }
}
