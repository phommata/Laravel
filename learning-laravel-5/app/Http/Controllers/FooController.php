<?php

namespace App\Http\Controllers;

use App\Repositories\FooRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FooController extends Controller
{
//    private $repository;
//
//    public function __construct(FooRepository $repository) // FooRepository is referenced by use full path
//    {
//
//        $this->repository = $repository;
//    }

    public function foo(FooRepository $repository)
    {
//        $repository = new \App\Repositories\FooRepository();

        return $repository->get();
    }
}
