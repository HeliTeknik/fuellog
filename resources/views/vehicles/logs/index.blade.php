@extends('_layouts.master')

@section('content')

    <h1 class="h1 mb0">New Vehicle</h1>

    {!! Form::open(['route' => 'vehicles.store']) !!}


        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'block full-width mb0 field-light']) !!}

        {!! Form::label('initial_odometer', 'Initial Odometer') !!}
        {!! Form::text('initial_odometer', null, ['class' => 'block full-width mb0 field-light']) !!}

        <div class="mt2">
            <button type="submit" class="button">Create Vehicle</button>
        </div>

    {!! Form::close() !!}

@stop