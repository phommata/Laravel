<?php

namespace App\Http\Controllers;

use App\Article;
//use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Tag;
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

    /**
     * Show all articles
     *
     * @return Response \Illuminate\View\View
     */
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

        $tags = Tag::lists('name', 'name');

        return view('articles.create', compact('tags'));
    }

    /**
     * Save a new article
     *
     * @return Response
     */
    public function store(ArticleRequest $request){

        dd($request->input('tags'));

        // Auth::user()->articles; // Collection
        \Auth::user()->articles()->create($request->all());

//        flash('You are now logged in');
//        flash()->overlay('Your article has been successfully created!', 'Good job');

        return redirect('articles')->with('flash_message', 'You are now logged in.');

    }

    /**
     * Edit an existing article.
     *
     * @param Article $article
     * @return Response \Illuminate\View\View
     */
    public function edit(Article $article){

        return view('articles.edit', compact('article'));
    }

    /**
     * Update an article.
     *
     * @param Article $article
     * @param ArticleRequest $request
     * @return Response \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, ArticleRequest $request){

        $article->update($request->all());

        return redirect('articles');
    }
}
