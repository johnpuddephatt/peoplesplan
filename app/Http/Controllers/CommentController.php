<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\User;
use App\Models\Idea;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use Mail;
use App\Mail\IdeaCommented;
use Auth;

class CommentController extends Controller
{

  public function index(){
  	return view('comments.like');
  }

  public function add(Request $request){

    if (!Auth::check()) {
  		return response()->json(['flag' => 0]);
  	}

    $new_comment = new Comment($request->all());
    $new_comment->user_id = Auth::user()->id;
    $new_comment->save();

    if($new_comment->commentable_type == "App\Models\Idea") {
      $idea = Idea::find($new_comment->commentable_id);
      if($idea->user->email) {
        $email = new IdeaCommented($idea,$new_comment);
        Mail::to($idea->user->email)->send($email);
      }
    }


  	return response()->json(['flag' => 1, 'id' => $new_comment->id, 'comment' => $new_comment->comment, 'commentable_id' => $new_comment->commentable_id, 'commentable_type' => $new_comment->commentable_type, 'userName' => Auth::user()->name, 'userPic' => Auth::user()->getAvatar()]);
  }

}
