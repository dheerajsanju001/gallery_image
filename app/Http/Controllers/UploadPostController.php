<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadPost;
use App\Models\favouritepost;
use App\Http\Requests\PostRequest;
use Auth;


class UploadPostController extends Controller
{
     //*****************UPLOAD IMAGE FUNCTION IS USED FOR UPLOADING USER POST*************** */
     public function UploadImage(PostRequest $request)
     {
        $image =$request->image;
        $name=$image->getClientOriginalName();
        $image->storeAs('public/store', $name);
        UploadPost::create([
            'username'=>$request->username,
            'image'=>$name,
            'selection'=>$request->selection,
            'views'=>$request->views,
            'user_id'=>$request->user_id,

        ]);
        return redirect('home');
     }
         //*****************UPLOAD FAVOURITE POST FUNCTION IS USED FOR STORING FAVORITE POST *************** */
    public function UploadFavouritePost(Request $request)
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

}
