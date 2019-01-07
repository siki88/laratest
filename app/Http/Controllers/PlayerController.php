<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    private $audios = [];

    /**
     * Mp3Controller constructor.
     * @param array $audios
     */
    public function __construct()
    {
        // $this->audios = $audios;
        $this->searchAudio();
    }

    /**
     * @return array
     */
    public function getAudios(): array{
        return $this->audios;
    }

    /**
     * @param array $audios
     */
    public function setAudios(array $audios): void{
        $this->audios = $audios;
    }


    private function searchAudio(){
        foreach (glob("mp3/*.mp3") as $filename) {
            array_push($this->audios,$filename);
        }
    }

    public function audioSource(){
        $myReturn = "";
        foreach ($this->getAudios() as $key => $value){
         //   $key += 1;
            $myReturn .= '<source src="'.$value.'" data-track-number="'.$key.'" />';
        }
        return $myReturn;
    }


    public function playList(){
        $myReturn = "";

        /*
        foreach ($this->getAudios() as $key => $value){
            $key += 1;
            $myReturn .= '<div class="play-list-row" data-track-row="'.$key.'"><div class="small-toggle-btn"><i class="small-play-btn"><span class="screen-reader-text">"'.$value.'"</span></i></div><div class="track-number">"'.$key.'"</div><div class="track-title"><a class="playlist-track" href="#" data-play-track="'.$key.'">"'.$value.'"</a></div>';
        }
        */

        foreach ($this->getAudios() as $key => $value){
          //  $key += 1;
          //  $myReturn .= '<li><div class="plItem"><div class="plTitle"></div>'.$value.'</div><div class="plLength">2:46</div></div></li>';
            $myReturn .= '<div class="play-list-row" data-track-row="'.$key.'"><div class="small-toggle-btn"><i class="small-play-btn"><span class="screen-reader-text">"'.$value.'"</span></i></div><div class="track-number">"'.$key.'"</div><div class="track-title"><a class="playlist-track" href="#" data-play-track="'.$key.'">"'.$value.'"</a></div>';
         //   $myReturn .= '<div class="play-list-row" data-track-row="'.$key.'"><div class="track-title"><a class="playlist-track" href="#" data-play-track="'.$key.'">"'.$value.'"</a></div>';

        }
        return $myReturn;
    }




}
