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
    'name',
    'email',
    'password',
    'is_admin',
    'provider',
    'provider_id',
    'avatar',
    'login_count',
    'email_token'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
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

  public function ideas() {
    return $this->hasMany('App\Models\Idea');
  }

  public function comments() {
    return $this->hasMany('Comment');
  }

  // Set the verified status to true and make the email token null
  public function verified()
  {
    $this->verified = 1;
    $this->email_token = null;
    $this->save();
  }


  public function getAvatar() {
    if($this->avatar) {
      return $this->avatar;
    }
    else {
      return \Gravatar::get($this->email);
    }
  }

}
