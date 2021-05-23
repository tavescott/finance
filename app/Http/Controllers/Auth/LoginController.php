<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function redirectTo()
    {
        if (auth()->user()->role->name == 'Admin'){
            return $this->redirectTo = '/admin';
        }
        elseif (auth()->user()->role->name == 'Owner'){
            return $this->redirectTo = '/owners';
        }
        elseif (auth()->user()->role->name == 'Helper'){
            return $this->redirectTo = '/helpers';
        }
        else{
            return $this->redirectTo = '/login';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
