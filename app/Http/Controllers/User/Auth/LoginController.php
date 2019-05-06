<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
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

    protected $redirectTo = '/user';
    public function showLoginForm()
    {
        return view('user.auth.login');
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect('/user/login');
    }
    protected function guard()
    {
        return Auth::guard('user');
    }
}
