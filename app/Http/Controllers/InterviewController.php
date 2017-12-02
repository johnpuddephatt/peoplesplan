<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Interview;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
    public function show($slug)
    {
      $interview = Interview::where('slug',$slug)->firstOrFail();
      $comment_item_id = 'interview-' . $interview->id;
      $like_item_id = $comment_item_id;
      $comments = CommentController::getCommentsWithUsersandLikes($comment_item_id);
      $likedata = LikeController::getLikeViewData($like_item_id);
      return view('interview.single', compact('interview', 'comment_item_id', 'like_item_id', 'comments', 'likedata'));
    }

}