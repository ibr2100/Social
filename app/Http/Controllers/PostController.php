<?php

namespace App\Http\Controllers;
use Validator;

use App\Comment;
use App\Http\Requests;
use App\Post;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\AppRequest;


class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request,$id)
    {
        $post=Post::find($id);
        return view('posts',compact('post'));
    }

    //add comment on post page
    public function AddComment(Request $request,$id)
    {
        $comment = new Comment();
        if ($request->isMethod('post')){
            $comment->content=$request->commentcontent;
            $comment->user_id=Auth::User()->id;
            $comment->post_id=$id;
            $comment->save();
            return back();
        }
        return view('posts');
    }

}
