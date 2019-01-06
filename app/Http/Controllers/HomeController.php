<?php

namespace App\Http\Controllers;

use App\Song;
use Auth;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Parent_;
use App\Http\Controllers\PlayerController;

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

        $audios = new PlayerController();



        if($songs->get()->isEmpty()){
            return view('home')
                ->withPlayList([])
                ->withSongModel($songs->get()->isEmpty());
        }else{
            return view('home')
             //   ->withPlayerList($songs->limit(8)->get())
                ->withPlayer($audios->audioSource())
                ->withPlayerList($audios->playList())
                ->withPlayList(array_keys($songs->first()->toArray()))
                ->withSongModel('App\Song');
        }



    }
}
