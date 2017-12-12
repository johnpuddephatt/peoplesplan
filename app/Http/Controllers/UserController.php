<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

  public function ideas()
  {
    $user_id = Auth::user()->id;
    $ideas = Idea::where([['approved',true],['user_id',$user_id]])->with(['user','likes'])->withCount('comments')->get();
    $pending_ideas = Idea::where([['approved',false],['user_id',$user_id]])->with(['user','likes'])->withCount('comments')->get();
    return view('user/ideas', compact('ideas','pending_ideas'));
  }

  public function showPreferences()
  {
    $preference_contactable = Auth::user()->contactable;
    $preference_gravatar = Auth::user()->gravatar;
    return view('user/preferences', compact('preference_contactable','preference_gravatar'));
  }


  public function storePreferences(Request $request)
  {

    $user = Auth::user();

    $user->contactable = $request['preference_contactable'] ? 1 : 0 ;
    $user->gravatar = $request['preference_gravatar'] ? 1 : 0 ;


    $user->save();

    flash('Your preferences have been saved');
    return back();
  }


}