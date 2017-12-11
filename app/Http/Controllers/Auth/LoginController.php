<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function credentials(Request $request)
    {
      return [
        'email' => $request->email,
        'password' => $request->password,
        'verified' => 1,
      ];
    }


    protected function sendFailedLoginResponse(Request $request)
    {
      $errors = ['loginfailed' => 'Login failed.'];

      // Load user from database
      $user = \App\User::where($this->username(), $request->{$this->username()})->first();
      // Check if user was successfully loaded, that the password matches
      // and active is not 1. If so, override the default error message.
      if ($user && \Hash::check($request->password, $user->password) && $user->verified != 1) {
        $errors = ['loginfailed' => 'Login failed because your email has not been verified. Please click the link in the confirmation email.'];
      }

      if ($request->expectsJson()) {
      return response()->json($errors, 422);
      }

      return redirect()->back()
      ->withInput($request->only('email', 'remember'))
      ->withErrors($errors);
    }

}
