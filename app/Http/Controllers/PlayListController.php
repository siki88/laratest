<?php

namespace App\Http\Controllers;

use App\Song;
use DB;

use Illuminate\Http\Request;

class PlayListController extends Controller
{
    private $songs = [];

    /**
     * PlayListController constructor.
     * @param array $songs
     */
    public function __construct(array $songs){
        $this->songs = $songs;
    }

    /**
     * @return array
     */
    public function getSongs(): array{
        return $this->songs;
    }

    /**
     * @param array $songs
     */
    public function setSongs(array $songs): void{
        $this->songs = $songs;
    }

    public static function getPlayList(){
        $songs = new Song();
        $songs = $songs->get();
        return (array_keys($songs->first()->toArray()));
    }

    public function deleteSong($id){
        dd($id);
    }






}
