<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\AppRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
      $posts=[];
        $psts = Post::OrderBy('id', 'DESC')->get();
        foreach($psts as $post) {
            if($post->user->id==$id)
            $posts[] = ($post);
        }
        return view('profile',compact('posts'));

    }
    public function AddComment(Request $request,$id)
    {
        $comment = new Comment();
        $post=Post::find($id);
        if ($request->isMethod('post')){
            $comment->content=$request->commentcontent;
            $comment->user_id=Auth::User()->id;
            $comment->post_id=$id;
            $comment->save();
            return back();
        }
        return view('profile');
    }



















}