<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    {{--<link rel="stylesheet" href="{{ elixir('css/all.css') }}">--}}
    <link rel="stylesheet" href="/css/all.css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Blog</a>
            </div>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/articles">Article</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>{!! link_to_action !!}</li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
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