<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   public function index() {
      $articles = Article::when(isset(request()->search), function ($query){
         $search = request()->search;
         $query->where("title","LIKE","%$search%")->orWhere("description","LIKE","%$search%");
      })->with(['User','Category'])->latest('id')->paginate(5);

      return view('welcome',compact('articles'));
   }

   public function detail($slug) {
      $article = Article::where("slug",$slug)->first();
      if (empty($article)){
         abort(404);
      }
      return view('blog.detail', compact('article'));
   }

   public function baseOnCategory($id) {

      $articles = Article::when(isset(request()->search), function ($query){
         $search = request()->search;
         $query->where("title","LIKE","%$search%")->orWhere("description","LIKE","%$search%");
      })->where('category_id',$id)->with(['User','Category'])->latest('id')->paginate(5);

      return view('welcome',compact('articles'));
   }

   public function baseOnUser($id) {
      $articles = Article::where('user_id',$id)->when(isset(request()->search), function ($query){
         $search = request()->search;
         $query->where("title","LIKE","%$search%")->orWhere("description","LIKE","%$search%");
      })->with(['User','Category'])->latest('id')->paginate(5);

      return view('welcome',compact('articles'));
   }

   public function baseOnDate($date) {
      $articles = Article::where('created_at',$date)->when(isset(request()->search), function ($query){
         $search = request()->search;
         $query->where("title","LIKE","%$search%")->orWhere("description","LIKE","%$search%");
      })->with(['User','Category'])->latest('id')->paginate(5);

      return view('welcome',compact('articles'));
   }
}
