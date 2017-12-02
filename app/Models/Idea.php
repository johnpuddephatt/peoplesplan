<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Http\Controllers\LikeController;
use App\User;


class Idea extends Model
{
    use CrudTrait;

    protected $fillable = ['title','theme_id','description_what','description_why','author_id','approved','slug'];

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    /**
     * The table associated with the model.
     *
     * @var string
     */
    // protected $table = 'ideas';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    // protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    // public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    // protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays
     *
     * @var array
     */
    // protected $hidden = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    // protected $dates = [];

    protected $casts = [
      'approved' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function theme()
    {
      return $this->belongsTo('App\Models\Theme');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function commentTotal()
    {
      $total = Comment::where('item_id', 'idea-' . $this->id)->count();
      return $total;
    }


    public function withUser() {
      $userId = $this->author_id;
      $user = User::getAuthor($userId);
      $this->name = $user['name'];
      $this->email = $user['email'];
      $this->url = $user['url'];
      $this->avatar = $user['avatar'];
      if($this->avatar == 'gravatar'){
          $hash = md5(strtolower(trim($user['email'])));
          $this->avatar = "http://www.gravatar.com/avatar/$hash?d=identicon";
      }
      return $this;
    }


    public function withLikes() {
      $this->likes = LikeController::getLikeViewData('idea-' . $this->id);
      return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
