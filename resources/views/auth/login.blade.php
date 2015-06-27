@extends('_layouts.master')

@section('content')

<h1 class="h1 mb0">Login</h1>

<form method="POST" class="sm-col-6" action="/auth/login">
    {!! csrf_field() !!}

    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'block full-width mb0 field-light']) !!}

    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'block full-width mb0 field-light']) !!}

    <div class="block full-width mt2 mb2">
        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label>
    </div>

    <div>
        <button type="submit" class="button py1 mt2 bg-blue regular h5 button-upper">Login</button>
    </div>
</form>

@stop