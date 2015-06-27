@extends('_layouts.master')

@section('title') {{ $vehicle->name }} @stop

@section('content')

<div class="clearfix mxn2 p2">

    <h2 class="h2 m0">{{ $vehicle->name }}</h2>

    {!! link_to_route('vehicles.edit', 'Edit Vehicle', [$vehicle->id], ['class' => 'button regular h5 button-upper']) !!}
    {!! link_to_route('vehicles.logs.create', 'New Log', [$vehicle->id], ['class' => 'button bg-green regular h5 button-upper']) !!}

    @include('_partials.delete', ['route' => ['vehicles.destroy', $vehicle->id]])

    <hr>


        @if ($logs->count() > 0)

            @include('vehicles.logs._timeline', ['logs' => $logs])

        @else

            @include('_partials.messages._warning', ['message' => "{$vehicle->name} doesn't have any logs yet."])

            <div class="clearfix center p3">
                @include('_partials.elements.buttons.success', ['route' => 'vehicles.logs.create', 'params' => [$vehicle->id], 'label' => 'Create your first log'])
            </div>

        @endif


</div>


@stop