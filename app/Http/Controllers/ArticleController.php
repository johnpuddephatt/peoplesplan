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
      $article = Article::where('slug',$slug)->firstOrFail();
      $comment_item_id = 'article-' . $article->id;
      $comments = CommentController::getCommentsWithUsersandLikes($comment_item_id);
      // $likedata = \App\Http\Controllers\LikeController::getLikeViewData($like_item_id);
      return view('article.single', compact('article', 'comment_item_id', 'comments', 'likedata'));
    }

    public function index()
    {
      $articles = Article::all();
      return view('article.index', compact('articles'));
    }


}