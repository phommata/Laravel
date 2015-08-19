<?php

namespace App\Http\Controllers;

use App\Article;
//use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(){

//        $articles = Article::order_by('published_at', 'desc')->get();
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
//        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show a single article
     *
     * @param Article $article
     * @return Response \Illuminate\View\View
     */
    public function show(Article $article){

        return view('articles.show', compact('article'));
    }

    /**
     * Create a new article
     *
     * @return Response
     */
    public function create(){

        return view('articles.create');
    }

    /**
     * Save a new article
     *
     * @return Response
     */
    public function store(ArticleRequest $request){

        // Let Laravel do the work for us, reference relationship save new user articles
        $article = new Article($request->all());

        // Auth::user()->articles; // Collection
        \Auth::user()->articles()->save($article);

        return redirect('articles');

    }

    public function edit($id){

        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    public function update($id, ArticleRequest $request){

        $article = Article::findOrFail($id);

        $article->update($request->all());

        return redirect('articles');
    }
}
