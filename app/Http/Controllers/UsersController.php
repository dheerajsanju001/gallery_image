<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\{registerRequest,loginRequest};
use App\Models\User;
use Hash;
use Auth;

class UsersController extends Controller
{
     //*****************SIGN UP FUNCTION IS USED FOR REGESTRATION OF USER*************** */
     public function signUp(registerRequest $request)
     {
        User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
         return redirect ('home');
     }
         //*****************LOGIN FUNCTION IS USED FOR AUTHENTICATION OF USER*************** */
    public function login(loginRequest $request)
    {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {

           return redirect('home');

        }
        else{
             return view('login');
        }
    }
     //*****************LOGOUT  FUNCTION FOR LOGOUT OF USER *************** */
     public function logout()
     {
         auth::logout();
         return redirect('home');
     }

}
