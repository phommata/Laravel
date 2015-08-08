<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about(){

        $name = 'Andrew <span style="color: red;"> Phommathep</span>';

//        return 'About Page';
        return view('pages.about')->with('name', $name);
    }

}
