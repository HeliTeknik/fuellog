@extends('_layouts.master')

@section('title') Add new vehicle @stop

@section('content')

    <h1 class="h2 mb0">Add new vehicle</h1>

    {!! Form::open(['route' => 'vehicles.store']) !!}

        @include('vehicles._form', ['buttonText' => 'Create vehicle'])

    {!! Form::close() !!}

@stop