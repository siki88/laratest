<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class withoutRegistratonController extends Controller
{


    public function index(){
        return view('home')
            ->with('player','Example Player')
            ->with('playlist','Example Playlist')
            ->with('upload','Example Upload MP3');
    }
}
