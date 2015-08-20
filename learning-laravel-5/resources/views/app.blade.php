<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
</head>
<body>
    <div class="container">

        @if (Session::has('flash_message'))

            <div class="alert alert-success {{ Session::has('flash_message_important' ? 'alert-important' : '') }}">

                @if (Session::has('flash_message_important'))

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                @endif

                {{ session() }}
                {{ Session::get('flash_message') }}

            </div>

        @endif

        @yield('content')

    </div>

    <script src="//code.jquery.com/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    @yield('footer')

</body>
</html>