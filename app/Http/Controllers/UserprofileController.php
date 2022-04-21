<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userprofile;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Image;
use PhpParser\Node\Scalar\MagicConst\File;
use App\Models\User;

class UserprofileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userprofile.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if(Auth::user()->userprofile){
            $oldimage = Userprofile::where('user_id', Auth::user()->id)->firstOrFail();
            File::delete([
                public_path($oldimage->image),
                public_path($oldimage->thumbnail),
            ]);
            $oldimage->delete();
        }

        $image = request()->file('image');
        $imageName = $image->getClientOriginalName();
        $imageName = time().'_'.$imageName;
        $thumbnail = $image->getClientOriginalName();
        $thumbnail= time().'_thumbnail'.$thumbnail;

        Image::make($image)
            ->fit(100, 100)
            ->save(public_path('/images/').$thumbnail);
        $image->move(public_path('/images'), $imageName);

        $img = new Userprofile;
        $img->user_id = Auth::user()->id;
        $img->image = 'images/'.$imageName;
        $img->thumbnail = 'images/'.$thumbnail;
        $img->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Userprofile  $userprofile
     * @return \Illuminate\Http\Response
     */
    public function show(Userprofile $userprofile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Userprofile  $userprofile
     * @return \Illuminate\Http\Response
     */
    public function edit(Userprofile $userprofile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Userprofile  $userprofile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userprofile $userprofile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userprofile  $userprofile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userprofile $userprofile)
    {
        //
    }
}
