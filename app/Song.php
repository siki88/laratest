<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Song extends Model{

    private $songs;

    public function someFunction()
    {
        dd($this->table());
    }

    public function __construct(){

    }



   public function getPlayListPlayer(){

        return $this->songs->limit(3)->get();

      // $songs = new Song();
      // return $songs->limit(3)->get();
   }



   public static function getPlayList(){

     //  $songs = new Song();
      // $songs = $this->songs->get();
      // return (array_keys($songs->first()->toArray()));
   }


}
