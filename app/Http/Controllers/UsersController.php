<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\registerRequest;
use App\Models\User;

class UsersController extends Controller
{
     //*****************SIGN UP FUNCTION IS USED FOR REGESTRATION OF USER*************** */
     public function signUp(registerRequest $request)
     {
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',

          ]);

         $add = new User;
         $add->name = $request->get('name');
         $add->email = $request->get('email');
         $add->password = $request->get('password');
         $add->save();
         return redirect ('home');
     }
         //*****************LOGIN FUNCTION IS USED FOR AUTHENTICATION OF USER*************** */
    public function login(Request $request)
    {

        $add = new User;
        if ($request->isMethod('post')) {
            $email = $request->get('email');
            $password = $request->get('password');
            $row = User::where(['email' => $email, 'password' => $password])->first();

            if (!empty($row)) {
                return redirect('home');
            } else {
                return back()->withErrors('USERINVALID');
            }
        }
        return view('/home');
    }

}
