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

        @include('partials.flash.blade.php')

        @yield('content')

    </div>

    <script src="//code.jquery.com/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>

        $('div.alert').not('.alert-important').delay(300).slideUp(300);

    </script>
    @yield('footer')

</body>
</html>