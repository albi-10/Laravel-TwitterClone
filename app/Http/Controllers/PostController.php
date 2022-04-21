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

    // index für ajaxRequest
    public function index2(){
        $posts = Post::latest()->with(['user','likes'])->paginate(30);
        return view('ajaxpost', [
            'posts' => $posts]);
    }

    public function store2(Request $request)
    {

        $post = new Post();
        $post->body = $request->body2;
        $post->user_id = $request->usrname;
        $post->user->name= $request->name;

        //$post->body = "Test";
        //$post->user_id=1;

        $post->save($request->all());
        return response()->json($post);

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
