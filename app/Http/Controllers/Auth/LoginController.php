<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected function redirectTo() {
        $user = Auth::user();    
        if(($user->tipo == 'A' || $user->tipo == 'F') && $user->bloqueado == 0)
        {
            return RouteServiceProvider::ADMIN;
        }
        else if($user->tipo == 'C' && $user->bloqueado == 0)
        {
            return RouteServiceProvider::HOME;
        }
        else if($user->bloqueado == 1)
        {
            Auth::logout();
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        $this->middleware('guest')->except('logout');
    }
}
