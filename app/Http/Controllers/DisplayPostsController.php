<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{UploadPost,favouritepost,Comments};

class DisplayPostsController extends Controller
{
    // *****************DISPLAY USER POSTS FUNCTION DISPLAYING USER RECORD*************** */
    public function DisplayUserPosts()
    {
        $data = UploadPost::where('selection', 'public')->with('users')->get();
        return view('home', compact('data'));
    }
        //*****************SHOW FULL IMAGE FUNCTION IS USED FOR INCREASING VIEWS ON POST*************** */
        public function ShowFullImage($id)
        {
            $comment = Comments::where('image_id', $id)->with('UploadPost')->with('users')->get();
            $data = UploadPost::where('id', $id)->get();
            foreach ($data as $t)
                $t->views++;
            $t->save();
            return view('show', compact('data', 'comment'));
        }
            //*****************USER PRIVATE POST FUNCTION DISPLAYING  PRIVATE POST OF USERS *************** */
    public function UserPrivatePost($id)
    {
        $ShowData = UploadPost::where('selection', 'private')->orWhere('user_id', $id)->get();
        return view('UserPrivtatePost', compact('ShowData'));
    }
        //*****************DELETEDATA FUNCTION IS USED FOR DELETING USER POST *************** */
        public function deletedata($id)
        {
            $ob = UploadPost::find($id);
            unlink(public_path('storage/store/'.$ob->image));
            $ob->delete();
            return back();
        }
        //*****************SHOWFAV FUNCTION DISPLAYING USER FAVORITE POST *************** */
        public function FavouritePosts()
        {
            $data = favouritepost::get();
            return view('fav', compact('data'));
        }
}
