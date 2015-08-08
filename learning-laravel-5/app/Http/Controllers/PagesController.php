<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about(){

        $data = [];
        $data['first'] = 'Andrew';
        $data['last'] = 'Phommathe';

        return view('pages.about', $data);
    }

}
