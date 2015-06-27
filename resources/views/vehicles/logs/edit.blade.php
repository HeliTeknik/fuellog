@extends('_layouts.master')

@section('content')

    <h1 class="h1 mb0">Edit log</h1>

    {!! Form::model($log, ['route' => ['vehicles.logs.update', $vehicle->id, $log->id], 'method' => 'PATCH']) !!}


        @include('vehicles.logs._form', ['buttonText' => 'Update'])

    {!! Form::close() !!}

@stop