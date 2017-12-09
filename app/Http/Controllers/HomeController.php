<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
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
      $interviews = Interview::withCount('comments')->get();
      return view('home', compact('themes','interviews'));
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
