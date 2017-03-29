<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;
use DB;

class ArticlesController extends Controller
{
    public function index()
    {
        /* Eloquent */

        // Using Eloquent to get all the articles
         $articles = Article::paginate(10);

        // Using Eloquent to get all the live articles
        // $articles = Article::whereLive(1)->all();

        // Using Eloquent to get first live articles
        // $articles = Article::whereLive(1)->all();

        /* Query Builder */

        // Using Query builder for getting all the articles
        // $articles = DB::table('articles')->get();

        // Using Query builder for getting all the live articles
        // $articles = DB::table('articles')->whereLive(1)->get();

        // Using Query Builder for getting first article which is live
        // $article = DB::table('articles')->whereLive(1)->first();
        // dd($article);

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        /*
        // Using Instance
        $article = new Article;

        $article->user_id = Auth::user()->id;
        $article->article_content = $request->article_content;
        $article->live = (boolean)$request->live;
        $article->post_on = $request->post_on;

        $article->save();
        */

        // Use this for same naming convention from database to input field
        Article::create($request->all());

        // Using Query Builder to insert data into table 'articles'
        // DB::table('articles')->insert($request->except('_token'));

        /*
        // Use this for different naming convention from database to input field
        Article::create([
            'user_id' => Auth::user()->id,
            'article_content' => $request->article_content,
            'live' => $request->live,
            'post_on' => $request->post_on,
        ]);
        */

        return redirect('/articles');

    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        if(!isset($request->live))
            $article->update(array_merge($request->all(), ['live' => false]));
        else
            $article->update($request->all());

        return redirect('/articles');

    }

    public function destroy($id)
    {
        //
    }
}
