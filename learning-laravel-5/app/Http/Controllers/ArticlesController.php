<?php

namespace App\Http\Controllers;

use App\Article;
//use Illuminate\Http\Request;
use App\Http\Requests\CreateArticleRequest;
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

        dd($article->published_at);

        return view('articles.show', compact('article'));
    }

    public function create(){

        return view('articles.create');
    }

    /**
     * Save a new article
     *
     * @param CreateArticleRequest $request
     * @return Response
     */
    public function store(CreateArticleRequest $request){

        // validation

        Article::create(Request::all());

        return redirect('articles');

    }
}
