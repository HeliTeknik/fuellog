<?php

trait CreateVehicle
{

    protected function createVehicle()
    {
        return $this->visit('vehicles/create')
            ->submitForm('Create vehicle', [
                'name'             => 'Ferrari',
                'initial_odometer' => 10
            ]);
    }

}

