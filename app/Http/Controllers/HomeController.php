<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index2(Request $request)
    {
        //dd(auth()->user()->post); //Zeigt Daten an
        return view('home',[
            'user' => $request->user()
            ]);
    }
    public function index()
    {
        return view('home');
    }
    public function profile()
    {
        return view('profile');
    }
}
