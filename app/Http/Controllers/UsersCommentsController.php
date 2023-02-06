<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;

class UsersCommentsController extends Controller
{
        // ******COMMENT_DATA FUNCTION IS USED FOR COMMENTING ON POST ****** */
        public function comment_data(Request $request, $id = '')
        {
            $add = new Comments;
            $add->comment = $request->comment;
            $add->id_user = auth()->user()->id;
            $add->image_id = $id;
            $add->save();
            return back();
        }
}
