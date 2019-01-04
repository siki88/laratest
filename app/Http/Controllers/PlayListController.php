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




}
