<?php

namespace App\Http\Controllers;

use App\Song;
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
    public function index()
    {
        $songs = new Song();

        $playerList = $songs->get();
        $playerList = (array_keys($playerList->first()->toArray()));

        return view('home')
            ->withPlayerList($songs->limit(3)->get())
            ->withPlayList($playerList)
            ->withTest('test');
    }
}
