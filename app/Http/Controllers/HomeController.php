<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\Article;
use App\Models\Idea;
use App\Models\Interview;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

  public function __construct()
  {
      // $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $themes = Theme::all();
      $articles = Article::withCount(['comments','likes'])->get();
      // $featuredtheme = Theme::whereMonth('date',date("m"))->first();
      // if($featuredtheme) {
      //   $featuredidea = Idea::where('theme_id',$featuredtheme->id)->withCount(['comments','likes'])->get()->sortByDesc('likes_count')->first();
      // }
      $popularideas = Idea::withCount(['comments','likes'])->orderBy('likes_count', 'desc')->paginate(5);
      // $featuredinterview = Interview::where('featured',true)->withCount('comments')->first();
      $interviews = Interview::withCount('comments')->get()->sortByDesc('id');
      return view('home', compact('themes','articles','interviews','popularideas'));
  }

  public function static() {
    $interviews = Interview::all();
    return view('static', compact('interviews'));
  }

  public function welcome() {
    $user = Auth::user();
    $user->load('ideas');
    return view('welcome', compact('user'));
  }

}
