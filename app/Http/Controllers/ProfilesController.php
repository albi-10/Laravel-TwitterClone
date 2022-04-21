<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Image;

class ProfilesController extends Controller
{
    //
    public function index(User $user)
    {
        $posts = $user->posts()->with(['user','likes'])->paginate(5);

        return view('profiles.index',[

            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function changeProfilepicture()
    {
        return view('profiles.changeProfilePicture');
    }

    public function store(Request $request)
    {

    }

    public function profile(){
        //die(phpinfo());
        return view('profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('profile', array('user' => Auth::user()) );

    }
}
