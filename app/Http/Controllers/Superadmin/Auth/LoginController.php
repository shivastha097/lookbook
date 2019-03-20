<?php

namespace App\Http\Controllers\Superadmin\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function __construct()
    {
        $this->middleware('guest:superadmin');
    }

    public function showLoginForm()
    {
        return view('superadmin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' =>  'required|email',
            'password'  =>  'required|min:8'
        ]);

        if( Auth::guard('superadmin')->attempt([
            'email' =>  $request->email,
            'password'  =>  $request->password
        ], $request->remember) ){
            return redirect()->intended(route('superadmin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


}
