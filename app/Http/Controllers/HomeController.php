<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function public()
    {
      $articles = Article::limit(5)->get();
      return view('welcome', compact('articles'));
    }


}