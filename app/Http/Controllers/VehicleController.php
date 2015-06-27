<?php

namespace Fuellog\Http\Controllers;

use Illuminate\Http\Request;

use Fuellog\Http\Requests;
use Fuellog\Http\Controllers\Controller;
use Fuellog\Vehicle;
use Fuellog\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(VehicleRequest $request)
    {
        $data            = $request->all();
        $data['user_id'] = auth()->id();
        $data['color']   = Vehicle::pickColor();

        $vehicle = Vehicle::create($data);

        return redirect()->route('vehicles.index')->withMessage('Vehicle created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Vehicle $vehicle
     * @return Response
     */
    public function show(Vehicle $vehicle)
    {
        $logs = $vehicle->logs()->orderBy('log_date', 'DESC')->get();

        return view('vehicles.show', compact('vehicle', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Vehicle $vehicle
     * @return Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Vehicle $vehicle
     * @return Response
     */
    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());

        return redirect()->route('vehicles.show', [$vehicle->id])->withMessage("{$vehicle->name} updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Vehicle $vehicle
     * @return Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $message = "Your vehicle \"{$vehicle->name}\" was successfully deleted.";

        foreach($vehicle->logs as $log) {
            $log->delete();
        }

        $vehicle->delete();

        return redirect()->route('home')->withMessage($message);
    }
}
