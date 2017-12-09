<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
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

  	return response()->json(['flag' => 1, 'id' => $new_comment->id, 'comment' => $new_comment->comment, 'commentable_id' => $new_comment->commentable_id, 'commentable_type' => $new_comment->commentable_type, 'userName' => Auth::user()->name, 'userPic' => Auth::user()->avatar]);
  }

}
