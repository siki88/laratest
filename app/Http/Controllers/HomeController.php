<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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





// Get the currently authenticated user...
        $user = Auth::user();

// Get the currently authenticated user's ID...
        $id = Auth::id();

        /*
        echo('<pre>');
        var_dump($user->email);
        var_dump($id);
        echo('</pre>');
*/

        return view('home')
            ->with('player','Player')
            ->with('playlist','Playlist')
            ->with('upload','Upload MP3');
    }
}
