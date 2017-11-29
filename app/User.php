<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;

use Backpack\CRUD\CrudTrait;

class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'provider', 'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
            'is_admin' => 'boolean',
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
           'avatar' => 'gravatar',  // Default avatar
           'admin'  => $user->is_admin, // bool
       ];
   }

}
