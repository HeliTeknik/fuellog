@extends('_layouts.master')

@section('content')

<h1 class="h1 mb0">Register</h1>

<form method="POST" class="sm-col-6" action="/auth/register">
    {!! csrf_field() !!}

    {!! Form::label('name', 'Username') !!}
    {!! Form::text('name', null, ['class' => 'block full-width mb0 field-light']) !!}


    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'block full-width mb0 field-light']) !!}


    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'block full-width mb0 field-light']) !!}


    {!! Form::label('password_confirmation', 'Confirm Password') !!}
    {!! Form::password('password_confirmation', ['class' => 'block full-width mb0 field-light']) !!}

    <div>
        {!! Form::submit('Register now', ['class' => 'button py1 mt2 bg-green regular h5 button-upper', 'type' => 'submit']) !!}
    </div>
</form>

@stop


