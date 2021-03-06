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
    /**
     * Create a new articles controller instance.
     */
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
     * @param Article $article - Uses route model binding
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
     * Save a new article.
     *
     * @param ArticleRequest $request - Do a bit of automatic validation against the form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request){

        // if validation passes
        $this->createArticles($request);

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
     * @param ArticleRequest $request - Perform some validation, using the same form request class.
     * @return Response \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, ArticleRequest $request){

        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }

    /**
     * Sync up the list of tags in the database.
     *
     * @param Article $article
     * @param array   $tags
     */
    public function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }

    /**
     * Save a new article
     *
     * @param  ArticleRequest $request
     * @return mixed
     */
    private function createArticles(ArticleRequest $request)
    {
        // Auth::user()->articles; // Collection
        $article = \Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }
}
