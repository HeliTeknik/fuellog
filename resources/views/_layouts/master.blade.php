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

        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="/images/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="/images/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="/images/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="/images/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="/images/apple-touch-icon-152x152.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon-180x180.png" />

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