@extends('_layouts.master')

@section('content')

<div class="clearfix mxn2">

    @if ($vehicles->count() > 0)

        @foreach($vehicles as $vehicle)

            <div class="sm-col sm-col-6 md-col-5 lg-col-6 px2">

                @include('vehicles._card')

            </div>

        @endforeach

    @else

        @include('_partials.messages._warning', ['message' => "Looks like you don't have a vehicle yet."])

        <div class="clearfix center p3">
            @include('_partials.elements.buttons.success', ['route' => 'vehicles.create', 'label' => 'Create your first vehicle'])
        </div>

    @endif

</div>

@stop