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
    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function index(){
    	return view('comments.like');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function add(Request $request){
    	$userId = Auth::user()->id;
    	$parent = $request->parent;
    	$commentBody = $request->comment;
    	$itemId = $request->item_id;

        $user = self::getUser($userId);
        $userPic = $user['avatar'];
        if($userPic == 'gravatar'){
            $hash = md5(strtolower(trim($user['email'])));
            $userPic = "http://www.gravatar.com/avatar/$hash?d=identicon";
        }

	    $comment = new Comment;
	    $comment->user_id = $userId;
	    $comment->parent_id = $parent;
	    $comment->item_id = $itemId;
	    $comment->comment = $commentBody;

	    $comment->save();

	    $id = $comment->id;
    	return response()->json(['flag' => 1, 'id' => $id, 'comment' => $commentBody, 'item_id' => $itemId, 'userName' => $user['name'], 'userPic' => $userPic]);
// dd($comment);
    }

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public static function viewLike($id){
        echo view('comments.like')
                ->with('like_item_id', $id);
    }

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public static function getCommentsWithUsersandLikes($itemId){
        $comments = Comment::where('item_id', $itemId)->orderBy('id', 'desc')->get();

        foreach ($comments as $comment){
            $comment->withUsers();
            $comment->withLikes();
        }
        return $comments;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public static function getUser($userId){
        return User::getAuthor($userId);
    }
}
