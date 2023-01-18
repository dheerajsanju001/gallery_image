<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\signup;
use App\Models\uploadpic;
use App\Models\favouritepost;
use App\Models\review;

class dcontroller extends Controller
{
    //*****************SIGN FUNCTION IS USED FOR REGESTRATION OF USER*************** */
    public function sign(Request $request)
    {

        $add = new signup;
        $add->username = $request->get('username');
        $add->email = $request->get('email');
        $add->password = $request->get('password');
        $add->save();
        return redirect('home');
    }


    //*****************LOGIN FUNCTION IS USED FOR AUTHENTICATION OF USER*************** */
    public function login(Request $request)
    {

        $add = new signup;
        if ($request->isMethod('post')) {
            $email = $request->get('email');
            $password = $request->get('password');
            $row = signup::where(['email' => $email, 'password' => $password])->first();

            if (!empty($row)) {
                $request->session()->put('signup_id', $row->id);
                return redirect('home');
            } else {
                return back()->withErrors('USERINVALID');
            }
        }
        return view('/home');
    }


    //*****************UPLOAD_FILE FUNCTION IS USED FOR UPLOADING USER POST*************** */
    public function upload_file(Request $request)
    {
        $image = $request->image;
        $name = $image->getClientOriginalName();
        $image->storeAs('public', $name);
        $image_save = new uploadpic;
        $image_save->username = $request->get('username');
        $image_save->selection = $request->get('selection');
        $image_save->signup_id = $request->get('signup_id');
        $image_save->views = $request->get('views');
        $image_save->image = $name;
        $image_save->save();
        return redirect('home');
    }


    //*****************DISPLAY FUNCTION DISPLAYING USER RECORD*************** */
    public function display()
    {
        $data = uploadpic::where('selection', 'public')->with('signup')->get();
        return view('home', compact('data'));
    }


    //*****************SHOWPIC FUNCTION IS USED FOR INCREASING VIEWS ON POST*************** */
    public function showpic($id)
    {
        $data = uploadpic::where('id', $id)->get();
        foreach ($data as $t)
            $t->views++;
        $t->save();
        return view('show',compact('data'));
    }


    //*****************FAVOURITE FUNCTION IS USED FOR STORING USER FAVORITE POST *************** */
    public function favourite(Request $request)
    {
        $image = $request->image;
        $name = $image;
        $image_save = new favouritepost;
        $image_save->username = $request->get('username');
        $image_save->image = $name;
        $image_save->views = $request->get('views');
        $image_save->save();
        return redirect('home');
    }


    //*****************SHOWFAV FUNCTION DISPLAYING USER FAVORITE POST *************** */
    public function showfav()
    {
        $data = favouritepost::get();
        return view('fav', compact('data'));
    }


    //*****************PVTPICS FUNCTION DISPLAYING USER PRIVATE POST *************** */
    public function pvtpics($id)
    {

        $data = uploadpic::where('selection', 'private')->where('signup_id', $id)->get();
        return view('pvtpost', compact('data'));
    }
    //*****************ACCOUNT FUNCTION FOR LOGOUT OF USER *************** */
    public function account()
    {
        session()->flush('signup_id');
        return redirect('home');
    }


    //*****************DELETEDATA FUNCTION IS USED FOR DELETING USER POST *************** */
    public function deletedata($id)
    {
        $ob = uploadpic::find($id);
        $ob->delete();
        return back();
    }

}
