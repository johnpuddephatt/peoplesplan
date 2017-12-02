<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\Idea;
use App\Models\Interview;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function preview()
    {
        $themes = Theme::all();
        $interviews = Interview::all();
        return view('preview', compact('themes','interviews'));

    }

    public function index() {
      $interviews = Interview::all();
      return view('home', compact('interviews'));
    }

    public function welcome() {
      $user = Auth::user();
      $ideas = Idea::where('author_id',Auth::user()->id)->get();
      return view('welcome', compact('user','ideas'));
    }

}
