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
    protected $table = 'comments';


    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }


    /**
	 * Fillable array
     */
    protected $fillable = ['user_id', 'parent_id', 'commentable_id', 'commentable_type', 'comment'];

}
