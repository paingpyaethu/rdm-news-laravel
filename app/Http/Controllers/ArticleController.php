<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function apiIndex()
    {
       $articles = Article::when(isset(request()->search), function ($query){
          $search = request()->search;
          $query->where("title","LIKE","%$search%")->orWhere("description","LIKE","%$search%");
       })->with(['User','Category'])->latest('id')->paginate(5);

       return $articles;
    }
    public function index()
    {
//       $all = Article::all();
//
//       foreach ($all as $a) {
//          $a->excerpt = Str::words($a->description, 50);
//          $a->update();
//       }
        $articles = Article::when(isset(request()->search), function ($query){
           $search = request()->search;
           $query->where("title","LIKE","%$search%")->orWhere("description","LIKE","%$search%");
        })->with(['User','Category'])->latest('id')->paginate(5);

        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request -> validate([
          'title' => 'required|min:5|max:150',
          'description' => 'required|min:5',
          'category' => 'required|exists:categories,id'
       ]);
       $article = new Article();
       $article->title = $request->title;
       $article->slug = Str::slug($request->title)."-".uniqid();
       $article->description = $request->description;
       $article->excerpt = Str::words($request->description, 50);
       $article->user_id = Auth::id();
       $article->category_id = $request->category;
       $article->save();

       return redirect()->route('article.index')->with('message', 'Title has been added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
       $request -> validate([
          'title' => 'required|min:5|max:150',
          'description' => 'required|min:5',
          'category' => 'required|exists:categories,id'
       ]);
       if ($article->title != $request->title) {
          $article->slug = Str::slug($request->title)."-".uniqid();
       }
       $article->title = $request->title;
       $article->description = $request->description;
       $article->excerpt = Str::words($request->description, 50);
       $article->category_id = $request->category;
       $article->update();

       return redirect()->route('article.index')->with('message', 'The article has been updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
       $article->delete();
       return redirect()->route('article.index',['page'=>request()->page])->with('delMessage', 'The article has been deleted.');
    }
}
