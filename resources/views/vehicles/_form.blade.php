{!! Form::label('name', 'Name') !!}
{!! Form::text('name', null, ['class' => 'block full-width mb0 field-light']) !!}

{!! Form::label('initial_odometer', 'Initial Odometer (How many kilometers have you driven so far?)') !!}
{!! Form::text('initial_odometer', null, ['class' => 'block full-width mb0 field-light']) !!}

<div class="mt2">
    <button type="submit" class="inline-block button py1 bg-green regular h5 button-upper">{{ $buttonText }}</button>
</div>