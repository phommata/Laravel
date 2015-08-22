<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

class Bar{
    /**
     * @var Baz
     */
    private $baz;

    public function __construct(Baz $baz){

        $this->baz = $baz;
    }

}

Route::get('bar', function(Bar $bar){
    dd($bar);
});

Route::get('/', 'WelcomeController@index');

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::resource('articles', 'ArticlesController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
