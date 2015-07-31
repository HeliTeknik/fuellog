@if (isset($errors))
    @if ($errors->has())

        <div class="p2 white bg-red">
            <div class="container">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        </div>
    @endif
@endif


@if (Session::has('error'))
    @include('_partials.messages._danger', ['message' => session('message')])
@endif

@if (Session::has('message'))
    @include('_partials.messages._success', ['message' => session('message')])
@endif

@if (Session::has('success'))
    @include('_partials.messages._success', ['message' => session('message')])
@endif

<noscript>
    @include('_partials.messages._danger', ['message' => "Fuellog doesn't work correctly while Javascript is disabled. Please activate Javascript."])
</noscript>