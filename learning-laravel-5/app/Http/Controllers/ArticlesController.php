<?php

namespace App\Http\Controllers;

use App\Article;
//use Illuminate\Http\Request;
use Carbon\Carbon;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index(){

//        $articles = Article::order_by('published_at', 'desc')->get();
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
//        return view('articles.index')->with('articles', $articles);
    }

    public function show($id){

        $article = Article::findOrFail($id);

        dd($article->updated_at->addDays(8)->diffForHumans());

        return view('articles.show', compact('article'));
    }

    public function create(){

        return view('articles.create');
    }

    public function store(){

        Article::create(Request::all());

        return redirect('articles');

    }
}
