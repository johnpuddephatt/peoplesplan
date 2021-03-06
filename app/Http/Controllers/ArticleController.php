<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
  public function show($slug)
  {
    $article = Article::where('slug',$slug)->with(['comments.user','comments','likes'])->firstOrFail();
    return view('article.single', compact('article'));
  }

  public function index()
  {
    $articles = Article::withCount('comments')->orderBy('id', 'desc')->get();
    return view('article.index', compact('articles'));
  }

}