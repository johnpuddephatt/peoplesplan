<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Auth;
use Socialite;

class OAuthController extends Controller
{

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = '/';

  /**
   * Redirect the user to the OAuth Provider.
   *
   * @return Response
   */
  public function redirectToProvider($provider)
  {
      return Socialite::driver($provider)->redirect();
  }

  /**
    * Obtain the user information from provider.  Check if the user already exists in our
    * database by looking up their provider_id in the database.
    * If the user exists, log them in. Otherwise, create a new user then log them in. After that
    * redirect them to the authenticated users homepage.
    *
    * @return Response
    */
   public function handleProviderCallback($provider)
   {
       $user = Socialite::driver($provider)->user();

       $authUser = $this->findOrCreateUser($user, $provider);
       Auth::login($authUser, true);
       flash('Success. You’re now signed in and ready to post or discuss ideas.');
       return redirect($this->redirectTo);
   }

   /**
    * If a user has registered before using social auth, return the user
    * else, create a new user object.
    * @param  $user Socialite user object
    * @param $provider Social auth provider
    * @return  User
    */
  public function findOrCreateUser($user, $provider)
  {
    $authUser = User::where('provider_id', $user->id)->first();

    // User already exists, all good
    if ($authUser) {
       return $authUser;
    }

    // OAuth returned email address matches existing account. Update accordingly.
    $existingEmailUser = User::where('email', $user->email)->first();
    if($existingEmailUser && $user->email) {
      $existingEmailUser->provider = $provider;
      $existingEmailUser->name = $user->name;
      $existingEmailUser->provider_id = $user->id;
      $existingEmailUser->avatar = str_replace('http://','https://',$user->avatar);
      $existingEmailUser->verified = 1;
      $existingEmailUser->save();
      return $existingEmailUser;
    }

    // New user
    $newUser = User::create([
       'name'     => $user->name,
       'email'    => $user->email,
       'provider' => $provider,
       'provider_id' => $user->id,
       'avatar' => str_replace('http://','https://',$user->avatar),
       'verified' => 1,
    ]);
    return $newUser;
  }

}
