<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
       // $posts =  Post::get();
        $posts = Post::latest()->with(['user','likes'])->paginate(3);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request) //Überprüft
    {
        $this->validate($request,[
            'body' => 'required'
        ]);

       /*
        Post::create([
            'user_id' => auth()->id(),
            'body' => $request->body
        ]);
        */
       // auth()->user()->post()->create();
        $request->user()->posts()->create([
            'body' => $request->body
        ]);
        return back();
    }

    public function destroy(Post $post)
    {
        //dd($post);
        $post->delete();
        return back();
    }
}
