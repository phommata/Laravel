<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FooController extends Controller
{
    public function foo()
    {
        $repository = new \App\Repositories\FooRepository();

        return $repository->get();
    }
}
