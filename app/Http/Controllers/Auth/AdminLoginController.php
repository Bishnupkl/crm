<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function loginForm()
    {
        $this->data('title',$this->title('Login'));
        return view(
            'auth.login.login',
            $this->data
        );
    }

    public function login(Request $request)
    {
        /* Validate login credentials */
        $data = request()->validate(
            [
               'email'  => 'required|email|max:55',
               'password'   => 'required|min:6,max:255'
            ]);

        $remember = isset($request->remember) ? true : false;
        /* Attempt to Login in the system */
        if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']],$remember)){
            /* Redirect to Admin panel */
            return redirect('/dashboard');
        }
        /* Return redirect back if login failed */
        return redirect()->back()->with('error','Email or Password is wrong.');
    }
}
