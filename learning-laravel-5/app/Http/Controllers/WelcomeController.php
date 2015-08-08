<?php
/**
 * Created by PhpStorm.
 * User: andrewphommathep
 * Date: 8/7/15
 * Time: 6:28 PM
 */

namespace App\Http\Controllers;


class WelcomeController extends Controller{

    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
//        return 'hello world!';
        return view('welcome'); // app/resources/views/{filename}.php
    }

    public function contact(){
//        return 'Contact Me';
        return view('pages.contact');
    }
}