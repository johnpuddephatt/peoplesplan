<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;

use App\Models\Idea;
use Backpack\CRUD\CrudTrait;

use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'provider', 'provider_id', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['new_user'];

    protected $dates = ['deleted_at'];

    protected $casts = [
            'is_admin' => 'boolean',
            'is_blocked' => 'boolean',
            'first_login' => 'boolean'
        ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
      $this->notify(new ResetPasswordNotification($token));
    }

    /**
    * Return the user attributes.

    * @return array
    */
   public static function getAuthor($id)
   {
       $user = self::find($id);
       return [
           'id'     => $user->id,
           'name'   => $user->name,
           'email'  => $user->email,
           'url'    => '',  // Optional
           'avatar' => $user->avatar ? $user->avatar : 'gravatar',  // Default avatar
           'admin'  => $user->is_admin, // bool
       ];
   }

   public function getNewStatus()
    {
        return $this->attributes['new_user']; //some logic to return numbers
    }

   public function ideas() {
     return $this->hasMany('Idea');
   }

   public function comments() {
     return $this->hasMany('Comment');
   }


}
