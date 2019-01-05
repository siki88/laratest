<?php

namespace App\Http\Controllers;

use App\Song;
use Auth;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Parent_;

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
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $songs = new Song();
        $songs = $songs->where('users_id', Auth::user()->id);

        //   dd($songs->where('users_id', Auth::user()->id)->get());

    //  dd(array_keys($songs->first()->toArray());

     // dd($songs->where('users_id', 1)->get());

        if($songs->get()->isEmpty()){
            return view('home')
                ->withPlayList([])
                ->withSongModel($songs->get()->isEmpty());
        }else{
            return view('home')
                ->withPlayerList($songs->limit(3)->get())
                ->withPlayList(array_keys($songs->first()->toArray()))
                ->withSongModel('App\Song');
        }



    }
}
