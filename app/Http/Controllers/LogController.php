<?php

namespace Fuellog\Http\Controllers;

use Fuellog\Http\Controllers\Controller;
use Fuellog\Http\Requests;
use Fuellog\Http\Requests\CreateLogRequest;
use Fuellog\Log;
use Fuellog\Vehicle;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Vehicle $vehicle)
    {
        $logs = $vehicle->logs()->latest()->get();

        return view('vehicles.logs.index', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Vehicle $vehicle)
    {
        return view('vehicles.logs.create', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateLogRequest $request, Vehicle $vehicle)
    {
        $data = $request->all();
        $data['vehicle_id'] = $vehicle->id;
        $data['average_usage'] = Log::calculateAverageUsage($request->get('fueled_units'), $request->get('driven_units'));

        $log = Log::create($data);

        return redirect()->route('vehicles.show', [$vehicle->id])->withMessage("Log created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  Log $log
     * @return Response
     */
    public function show(Vehicle $vehicle, Log $log)
    {
        return view('vehicles.logs.show', compact('vehicle', 'log'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Log $log
     * @return Response
     */
    public function edit(Vehicle $vehicle, Log $log)
    {
        return view('vehicles.logs.edit', compact('vehicle', 'log'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Log $log
     * @return Response
     */
    public function update(CreateLogRequest $request, Vehicle $vehicle, Log $log)
    {
        $data = $request->all();
        $data['average_usage'] = Log::calculateAverageUsage($request->get('fueled_units'), $request->get('driven_units'));

        $log = $log->update($data);

        return redirect()->route('vehicles.show', [$vehicle->id])->withMessage("Log updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Log $log
     * @return Response
     */
    public function destroy(Vehicle $vehicle, Log $log)
    {
        $log->delete();

        return redirect()->route('vehicles.show', [$vehicle->id])->withMessage('Log deleted.');
    }
}
