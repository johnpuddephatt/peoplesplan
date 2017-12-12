<?php

namespace App\Http\Controllers\Auth;

use DB;
use Mail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Auth;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
   * Where to redirect users after registration.
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
      $this->middleware('guest');
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
      return Validator::make($data, [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
      ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\User
   */
  protected function create(array $data)
  {
      if(array_key_exists('gravatar',$data)) {
        $gravatar = 1;
      }
      else {
        $gravatar = 0;
      }
      return User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'email_token' => str_random(10),
          'gravatar' => $gravatar,

      ]);
  }

  public function register(Request $request)
  {
    // Laravel validation
    $validator = $this->validator($request->all());
    if ($validator->fails())
    {
      $errors = ['registrationfailed' => 'Registration failed. This email may already be in use.'];
      return redirect()->back()
      ->withErrors($errors);
    }
    // Using database transactions is useful here because stuff happening is actually a transaction
    DB::beginTransaction();
    try
    {
      $user = $this->create($request->all());
      // After creating the user send an email with the random token generated in the create method above
      $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name]));
      Mail::to($user->email)->send($email);
      DB::commit();
      flash('Account sucessfully created. You will receive an account activation email shortly.');
      return redirect('/login/');
    }
    catch(Exception $e)
    {
      DB::rollback();
      $errors = ['registrationfailed' => 'An unknown error as occurred.'];
      return back()
      ->withErrors($errors);
    }
  }


  // Get the user who has the same token and change his/her status to verified i.e. 1
  public function verify($token)
  {
    // The verified method has been added to the user model and chained here
    // for better readability
    $user = User::where('email_token',$token)->firstOrFail();
    $user->verified();
    Auth::login($user, true);
    flash('Account sucessfully verified. You’re now signed in and ready to join the debate.');
    return redirect($this->redirectTo);
  }

}