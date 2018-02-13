<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Theme;
use App\Models\User;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
  public function show($slug)
  {
    $theme = Theme::where('slug',$slug)->firstOrFail();

    if (strtotime($theme->date) < time() || Auth::user()->is_admin ) {
      $ideas = Idea::where('theme_id',$theme->id)->with(['user','likes'])->withCount('comments')->where('approved',true)->get()->sortByDesc('created_at');
      return view('theme.single', compact('theme','ideas'));
    }
    else {
      return view('errors.403');
    }
  }

  public function index()
  {
    $themes = Theme::all()->with(['ideas.user','ideas.likes']);
    return view('theme.index', compact('themes'));
  }


  public function whitepaper($slug)
  {
    $theme = Theme::where('slug',$slug)->with(['comments.user','comments.likes'])->firstOrFail();
    if($theme->whitepaper_title) {
      return view('theme.whitepaper', compact('theme'));
    }
    else {
      return view('errors.403');
    }
  }


  public function sort($slug,$orderBy)
  {

    $theme = Theme::where('slug',$slug)->firstOrFail();

    if (strtotime($theme->date) < time() || Auth::user()->is_admin ) {
      $ideas = Idea::where('theme_id',$theme->id)->with(['user','likes'])->withCount(['comments','likes'])->where('approved',true)->get()->sortByDesc($orderBy);
      return view('theme.single', compact('theme','ideas','orderBy'));
    }
    else {
      return view('errors.403');
    }

  }
}