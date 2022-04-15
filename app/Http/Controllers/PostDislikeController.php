<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostDislikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    //
    public function store(Post $post, Request $request)
    {
        //dd($post->likedBy($request->user()));
        if($post->dislikedBy($request->user()))
        {
            return response(null,400);
        }

        $post->dislikes()->create([
            'user_id' => $request->user()->id,
        ]);
        return back();
    }

    public function destroy(Post $post,Request $request)
    {
        //dd($post);
        $request->user()->dislikes()->where('post_id',$post->id)->delete();
        return back();
    }
}
