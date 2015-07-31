<nav>

    <div class="relative clearfix white bg-primary nav-shadow">
        <div class="left">
            <a href="/" class="button py1 m1 button white button-transparent regular button-upper">Fuellog</a>
        </div>
        <div class="left md-show">

            @if (Auth::check())
              @include('_partials.elements.buttons.success', ['route' => 'vehicles.create', 'label' => 'Add Vehicle'])
            @endif

        </div>
        <div class="right">

            @if (Auth::guest())
                <a href="/auth/register" class="button py1 m1 bg-green regular h5 button-upper">Sign Up</a>
                <a href="/auth/login" class="button py1 m1 bg-blue regular h5 button-upper">Login</a>

            @else


            <div id="account-menu" class="inline-block" data-disclosure>
                {{-- <div data-details class="fixed top-0 right-0 bottom-0 left-0"></div> --}}
                <a href="#!" class="button py1 m1 button button-transparent regular button-upper">
                    <span class="md-hide">Menu &#9662;</span>
                    <span class="md-show">More &#9662;</span>
                </a>
                <div data-details class="absolute right-0 xs-left-0 sm-col-6 md-col-4 lg-col-3 nowrap white bg-primary rounded-bottom" style="display: none;">
                    <ul class="h5 list-reset mb0">

                        <li class="md-hide">
                            @if (Auth::check())
                              @include('_partials.elements.buttons.success', ['route' => 'vehicles.create', 'label' => 'Add Vehicle'])
                            @endif
                        </li>

                       @if (Auth::check())
                            <li>
                                <a href="/auth/logout" class="button block py1 m1 button button-transparent regular button-upper">Logout</a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>

            @endif
        </div>
    </div>


</nav>