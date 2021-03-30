<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return $this->redirectToSns('google');
    }

    public function redirectToGithub()
    {
       return $this->redirectToSns('github');
    }

    public function redirectToTwitter()
    {
        return $this->redirectToSns('twitter');
    }

    public function getGoogleUser()
    {
        return $this->getSocialUser('google');
    }

    public function getGithubUser()
    {
        return $this->getSocialUser('github');
    }

    public function getTwitterUser()
    {
        return $this->getSocialUser('twitter');
    }

    private function redirectToSns(string $sns)
    {
        return Socialite::driver($sns)->redirect();
    }

    private function getSocialUser(string $sns)
    {
        $user = Socialite::driver($sns)->stateless()->user();

        $newUser = User::create([
            'email' => $user->email,
            'name' => $user->name,
        ]);

        return $newUser;
    }


}
