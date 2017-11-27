<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\User;
use App\Http\Controllers\LikeController;

class Comment extends Model
{
  use CrudTrait;
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pp_comments';

    /**
	 * Fillable array
     */
    protected $fillable = ['user_id', 'parent_id', 'item_id', 'comment'];


    public function withUsers() {
      $userId = $this->user_id;
      $user = User::getAuthor($userId);
      $this->name = $user['name'];
      $this->email = $user['email'];
      $this->url = $user['url'];
      if($user['avatar'] == 'gravatar'){
          $hash = md5(strtolower(trim($user['email'])));
          $this->avatar = "http://www.gravatar.com/avatar/$hash?d=identicon";
      }
      return $this;
    }

    public function withLikes() {
      $this->likes = LikeController::getLikeViewData('comment-' . $this->id);      
      return $this;
    }

}