<?php

namespace App\Http\Controllers\Superadmin\Auth;

use App\SuperAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:superadmin');
    }

    public function showRegisterForm()
    {
        return view('superadmin.auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' =>   'required|string|max:255',
            'email' =>  'required|string|email|max:255|unique:super_admins',
            'password'  =>  'required|string|min:8|confirmed'
        ]);
        
        SuperAdmin::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password'  =>  Hash::make($request->password)
        ]);

        // return redirect()->intended(route('superadmin'));
        return redirect()->route('superadmin.login');
    }
}
