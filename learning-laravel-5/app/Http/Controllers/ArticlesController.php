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

        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }

    /**
     * Save a new article
     *
     * @return Response
     */
    public function store(ArticleRequest $request){

        // Auth::user()->articles; // Collection
        $article = \Auth::user()->articles()->create($request->all());

        // Article with that tags pivot table, we want to associate the
        // use specifically that article id with this array of tags
        // When we call attach, you can pass a single integer: id or an array of id's
        $article->tags()->attach($request->input('tag_list'));

        // We need the id's of these tags, because we will ultimately attach all the id's that we want to associate, but
        // right now we just have the name of the tag
//        $articles->tags()->attach([1, 2, 3, 4]);

        flash('You are now logged in');
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

        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
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
