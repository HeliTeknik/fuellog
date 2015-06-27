@extends('_layouts.master')

@section('title') Edit {{ $vehicle->name }} @stop

@section('content')

    <h1 class="h2 mb0">Edit {{ $vehicle->name }}</h1>

    {!! Form::model($vehicle, ['route' => ['vehicles.update', $vehicle->id], 'method' => 'PATCH']) !!}

        @include('vehicles._form', ['buttonText' => 'Update Vehicle'])

    {!! Form::close() !!}

@stop