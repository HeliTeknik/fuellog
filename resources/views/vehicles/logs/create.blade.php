@extends('_layouts.master')

@section('content')

    <h1 class="h1 mb0">Create Log for {{ $vehicle->name }} </h1>

    {!! Form::open(['route' => ['vehicles.logs.store', $vehicle->id]]) !!}

        @include('vehicles.logs._form', ['buttonText' => 'Store log'])

    {!! Form::close() !!}

@stop

@section('scripts')

    <script>
        Fuellog.logForm();
    </script>

@stop