<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(20);
 
        return view('dashboard.article.index')->withArticles($articles);
    }


    /**
     * Display the specified resource.
     *
     * @param  Article  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('dashboard.article.show')->withArticle($article);
    }

}
