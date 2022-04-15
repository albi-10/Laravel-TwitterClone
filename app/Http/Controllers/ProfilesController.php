<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function index(Request $request)
    {


        return view('profiles.index',[
            'profile' => $request->user()
        ]);
    }
}
