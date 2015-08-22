<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    {{--<link rel="stylesheet" href="{{ elixir('css/all.css') }}">--}}
    <link rel="stylesheet" href="/css/all.css">
</head>
<body>
    @include('partials.nav')

    <div class="container">

        @include('flash::message')

        @yield('content')

    </div>

    <script src="/js/all.js"></script>
    <script>

        $('#flash-overlay-modal').modal();

//        $('div.alert').not('.alert-important').delay(300).slideUp(300);

    </script>
    @yield('footer')

</body>
</html>