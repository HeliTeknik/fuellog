<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="@yield('description', '')">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700|Noto+Sans:400,700' rel='stylesheet' type='text/css'>
        <title>@yield('title', 'Fuellog')</title>
        <link rel="stylesheet" href="/css/main.css">
        <link rel="author" href="humans.txt">

        <link rel="apple-touch-icon" href="/images/icon.256.png">

    </head>
    <body>

        <div class="flex flex-column" style="min-height:100vh">

            @include('_layouts._navigation')
            @include('_layouts._notifications')

            <main class="flex-auto p1">

                <div class="container m0">
                    @yield('content')
                </div>

            </main>

            @include('_layouts._footer')
        </div>

        <script src="http://maps.google.com/maps/api/js"></script>

        <script src="/js/app.js"></script>

        @yield('scripts')
    </body>
</html>