<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Idea;
use App\Models\Theme;

use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

class IdeaController extends Controller
{

  public function show($slug)
  {
    $idea = Idea::where('slug',$slug)->with(['comments.user','comments.likes','user','likes','theme'])->firstOrFail();
    return view('idea.single', compact('idea'));
  }

  public function index()
  {
    $themes = Theme::all();
    $ideas = Idea::where('approved',true)->with(['user','likes'])->withCount('comments')->get()->sortByDesc('created_at');
    return view('idea.index', compact('ideas','themes'));
  }




  public function add() {
    $themes = Theme::all();
    return view('idea.add', compact('themes'));
  }


  public function store(Request $request, $userhash)
  {
    $validatedData = $request->validate([
      'title' => 'required|max:80',
      'description_what' => 'required|max:600',
      'description_why' => 'required|max:600',
    ]);

    $user_id = Hashids::decode($userhash)[0];
    $request['user_id'] = $user_id;
    $request['slug'] = str_slug($request->title);
    $request['approved'] = 0;

    $theme = Theme::find($request->theme_id);

    $theme->addIdea(
      new Idea($request->all())
    );
    flash('Thank you! Your idea has been submitted and will be reviewed to ensure it meets our community guidelines.')->error();
    return back();
  }

}