@extends('_layouts.master')

@section('content')

    <h1 class="h2 mb0">Log from {{ $log->log_date->format('d.m.Y') }}</h1>

    {!! link_to_route('vehicles.logs.edit', 'Edit Log', [$vehicle->id, $log->id], ['class' => 'button bg-primary button-small m1 h5 regular button-upper']) !!}
    {!! link_to_route('vehicles.logs.show', 'More Info', [$vehicle->id, $log->id], ['class' => 'button bg-primary button-small m1 h5 regular button-upper']) !!}

    @include('_partials.delete', ['route' => ['vehicles.logs.destroy', $vehicle->id, $log->id]])

    <hr>


    <ul>
        <li>Fueled: {{ $log->fueled_units }}</li>
        <li>Cost per Unit: {{ $log->cost_per_unit }}</li>
        <li>Total Cost: {{ $log->cost_total }}</li>
        <li>Driven Units: {{ $log->driven_units }}</li>
        <li><b>Average Usage:</b> {{ $log->average_usage }}</li>
    </ul>

    {{-- TODO

        - Display log information
        - If geolocation is available, show a map with a pin
        - Make it prettier

     --}}

@stop