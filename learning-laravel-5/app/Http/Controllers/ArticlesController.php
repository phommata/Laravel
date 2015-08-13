<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\CreateArticleRequest;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){

        $this->validate($request, ['title' => 'required', 'body' => 'required']);

        Article::create($request->all());

        return redirect('articles');

    }
}
