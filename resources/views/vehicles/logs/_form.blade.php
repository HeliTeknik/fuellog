<div id="create-log">

    {!! Form::label('log_date', 'Log Date') !!}

    @if (isset($log))
        {!! Form::input('date', 'log_date', $log->log_date->format('Y-m-d'), ['class' => 'block full-width mb1 field-light']) !!}
    @else
        {!! Form::input('date', 'log_date', Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'block full-width mb1 field-light']) !!}
    @endif

    {!! Form::label('driven_units', 'Driven KM') !!}
    {!! Form::text('driven_units', null, [
        'class' => 'block full-width mb1 field-light',
        'v-model' => 'log.driven_units',
        'pattern' => '[0-9].*'
    ]) !!}


    {!! Form::label('fueled_units', 'Fueled Liter') !!}
    {!! Form::text('fueled_units', null, [
        'class' => 'block full-width mb1 field-light',
        'v-model' => 'log.fueled_units',
        'v-on' => 'blur: calcTotal()',
        'pattern' => '[0-9].*'
    ]) !!}

    {!! Form::label('cost_per_unit', 'Cost per Unit') !!}
    {!! Form::text('cost_per_unit', null, [
        'class' => 'block full-width mb1 field-light',
        'v-model' => 'log.cost_per_unit',
        'v-on' => 'blur: calcTotal()',
        'pattern' => '[0-9].*'
    ]) !!}

    {!! Form::label('cost_total', 'Total Cost (We calculate this for you)') !!}
    {!! Form::text('cost_total', null, [
        'class' => 'block full-width mb1 field-light',
        'v-model' => 'log.cost_total',
        'pattern' => '[0-9].*'
    ]) !!}

    {!! Form::hidden('longitude', null, ['v-model' => 'log.longitude']) !!}
    {!! Form::hidden('latitude', null, ['v-model' => 'log.latitude']) !!}

    <div v-if="isLocationAvailable">
        <div v-if="hasLocation" class="mt1 mb1">
            @include('_partials.messages._success', ['message' => "We got your location!"])
        </div>
        <div v-if="grabbingLocation" class="mt1 mb1">
            @include('_partials.messages._info', ['message' => "Hang on. Getting your location ..."])
        </div>

        <div v-if="!hasLocation && !grabbingLocation" class="mt1 mb1">
            <a href="#!" v-on="click: getLocation" class="inline-block button button-upper regular h5">Get Location</a>
        </div>
    </div>
    <div v-if="!isLocationAvailable" class="gray italic">
        <small>You're device doesn't support geolocation. We can't store you're location with this log.</small>
    </div>

    <div class="mt2">
        <button type="submit" class="inline-block button py1 bg-green regular h5 button-upper">{{ $buttonText }}</button>
    </div>

</div>

