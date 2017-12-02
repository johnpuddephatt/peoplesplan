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
        $ideas = Idea::where('theme_id',$theme->id)->where('approved',true)->get();
        foreach ($ideas as $idea){
            $idea->withLikes();
            $idea->withUser();
        }
        return view('theme.single', compact('theme','ideas'));
      }
      else {
        return view('errors.403');
      }
    }

    public function index()
    {
      $themes = Theme::all();
      return view('theme.index', compact('themes'));
    }


}