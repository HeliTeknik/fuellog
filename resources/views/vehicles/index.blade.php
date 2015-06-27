@extends('_layouts.master')

@section('content')

<div class="clearfix mxn2">

    @foreach($vehicles as $vehicle)

        <div class="sm-col sm-col-6 md-col-5 lg-col-6 px2">

            @include('vehicles._card')

        </div>

    @endforeach

</div>


@stop