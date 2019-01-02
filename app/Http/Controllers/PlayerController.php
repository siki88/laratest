<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    private $audios = [];

    /**
     * Mp3Controller constructor.
     * @param array $audios
     */
    public function __construct(array $audios)
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
        foreach (glob("audio/*.mp3") as $filename) {
            array_push($this->audios,$filename);
        }
    }

}
