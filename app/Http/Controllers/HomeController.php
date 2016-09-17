<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use App\Post;
use App\User;
use Validator;

use Illuminate\Http\Request;
use  Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\AppRequest;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }

    public function show()
    {
        $posts = Post::OrderBy('id', 'DESC')->get();
        return view('home', compact('posts'));

    }

//add posr text or text and photo
    public function AddPost(Request $request)
    {
        $post = new Post();
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'contain' => 'required'
            ]);
            $post->contain = $request->contain;
            $post->user_id = Auth::User()->id;
            if ($request->file('photo') != null) {
                $photo = $request->file('photo');
                dd($photo->getFileInfo());
                $destinationPath = base_path() . '/public/img';
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move($destinationPath, $filename);
                $post->image_url = $filename;


            }
            $post->save();

            return back();
        }
        return view('home');

    }

//ass comment

    public function AddComment(Request $request, $id)
    {
        $comment = new Comment();
        if ($request->isMethod('post')) {
            $comment->contain = $request->contain;
            $comment->user_id = Auth::User()->id;
            $comment->post_id = $id;
            $comment->save();
            return back();
        }
        return view('home');

    }

}
