<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Like;
use App\Models\TotalLike;
use Auth;

class LikeController extends Controller
{

  public function index()
  {
  	return "It works.";
  }


  public function vote(Request $request)
  {
  	/* Check if user is logged in*/
  	if (!Auth::check()) {
  		return response()->json(['flag' => 0]);
  	}

  	/* Prepare data */
  	$userId = Auth::user()->id;
  	$likeable_id = $request->likeable_id;
    $likeable_type = $request->likeable_type;

  	/* Get user's vote on this item */
		$like = Like::where(['user_id' => $userId, 'likeable_id' => $likeable_id, 'likeable_type' => $likeable_type])->first();

    $upvote_delta = $request->vote == 1 ? 1 : 0;
    $downvote_delta = $request->vote == -1 ? 1 : 0;

    if($like !== null) { // user has already voted
      if ($like->vote !== $request->vote) {  // new vote is not the same as previous.
        if ($request->vote == 1) {  // we have an upvote
          $upvote_delta = 1;
          $downvote_delta = $like->vote == -1 ? -1 : 0;
        }
        elseif ($request->vote == -1) {  // we have a downvote
          $downvote_delta = 1;
          $upvote_delta = $like->vote == 1 ? -1 : 0;
        }
      }
      else {
        if ($request->vote == 1) {
          $upvote_delta = -1;
        }
        if ($request->vote == -1) {
          $downvote_delta = -1;
        }
        $request->vote = 0;
      }
    }

    else {
      $like = new Like;
    }

		/* Update vote data */
		$like->user_id = $userId;
		$like->likeable_id = $likeable_id;
    $like->likeable_type = $likeable_type;
		$like->vote = $request->vote;
		$like->save();		// save like

  	return response()->json(['flag' => 1, 'downvote_delta' => $downvote_delta, 'upvote_delta' => $upvote_delta]);
  }
}

