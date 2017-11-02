<?php

namespace Mejenguitas\Http\Controllers\Auth;

use Mejenguitas\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Mejenguitas\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /*
    * Overwrite the method of redirect path
    */
    public function redirectPath()
    {
      /*  switch (variable) {
            case 'value':
                # code...
                break;
            
            default:
                # code...
                break;
        }*/
        return '/home';
    }

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();


        $new = $this->findUser($user);


        $authUser = $this->findOrCreateUser($user, 'facebook');

        if (!$new) {
            DB::table('assigned_roles')->insert(['user_id' => $authUser->id, 'role_id' => 3]);
        }

        Auth::login($authUser);


        return redirect('/home');
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('facebook_user_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }

        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'avatar' => $user->getAvatar(),
            'facebook_user_id' => $user->id
        ]);
    }

    public function findUser($user)
    {
        $authUser = User::where('facebook_user_id', $user->id)->first();
        if ($authUser) {
            return true;
        }else{
            return false;
        }
    }
}
