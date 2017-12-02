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
      $idea = Idea::where('slug',$slug)->firstOrFail();
      $comment_item_id = 'idea-' . $idea->id;
      $like_item_id = $comment_item_id;
      $comments = CommentController::getCommentsWithUsersandLikes($comment_item_id);
      $likedata = LikeController::getLikeViewData($like_item_id);
      return view('idea.single', compact('idea', 'comment_item_id', 'like_item_id', 'comments', 'likedata'));
    }


    public function index()
    {
      $themes = Theme::all();

      $ideas = Idea::where('approved',true)->get();
      foreach ($ideas as $idea){
          $idea->withLikes();
          $idea->withUser();
      }
      return view('idea.index', compact('ideas','themes'));
    }

    public function add() {
      $themes = Theme::all();
      return view('idea.add', compact('themes'));
    }



    public function store(Request $request, $userhash)
    {

      $author_id = Hashids::decode($userhash)[0];
      $request['author_id'] = $author_id;
      $request['slug'] = str_slug($request->title);
      $request['approved'] = 0;

      $theme = Theme::find($request->theme_id);

      $theme->addIdea(
        new Idea($request->all())
      );


      return back();
    }



}