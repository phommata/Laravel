<?php namespace App\Http\Composers;
use App\Article;
use Illuminate\Contracts\View\View;

/**
 * Created by PhpStorm.
 * User: andrewphommathep
 * Date: 8/22/15
 * Time: 2:52 AM
 */

class NavigationComposer {

    public function compose(View $view)
    {

        $view->with('latest', Article::latest()->first());

    }
}