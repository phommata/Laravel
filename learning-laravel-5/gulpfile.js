var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.sass('app.scss');

    //mix.styles(['vendor/normalize.css', 'app.css'], null, 'public/css');
    //
    //mix.version('public/css/all.css');

    mix.styles([
       'libs/bootstrap.min.css',
       'app.css',
       'libs/select2.min.css'
    ]);

    mix.scripts([
       'libs/jquery-1.11.3.min.js',
        'libs/select2.min.js'
    ]), 'public/js/output.js';
});
