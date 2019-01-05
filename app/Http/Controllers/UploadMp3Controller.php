<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Song;
use Auth;

class UploadMp3Controller extends Controller{

    private $song;
    /**
     * UploadMp3Controller constructor.
     */
    public function __construct(){

    }

    /**
     * @return mixed
     */
    public function getSong()
    {
        return $this->song;
    }

    /**
     * @param mixed $song
     */
    public function setSong($song): void
    {
        $this->song = $song;
    }


    public function index( Request $request){
        return $this->controll($request);
    }




    private function controll(Request $request){

        $request = $this->validation($request);

        $request->merge([
            'size_song' => $request->file('song')->getSize(),
            'long_song' => $this->calculateFileLong($request->file('song')),
            'users_id'  => Auth::user()->id,
            'convert'   => $request->file('song')->getClientOriginalExtension(),
            'name'      => $request->file('song')->getClientOriginalName()
        ]);

        $this->saveFile($request->file('song'));






        //  $audio = new Mp3Info($request->file('song'),true);
        //  $request->setAttribute('long_song') = "55:55";

        //    $request->file('song')->getFilename() = $request->file('song')->getClientOriginalName();

/*
        echo('<pre>');
     //   var_dump($request->file('song')->originalName);
        var_dump(get_class_methods($request->file('song')));
      //  var_dump();
        var_dump($request->file('song')->getClientOriginalExtension());
        var_dump($request->file('song')->getClientOriginalName());
        var_dump($request->file('song')->getFilename());
        echo('</pre>');
        die();
*/

/*
        echo('<pre>');
        var_dump(get_class_methods($request->file('song')));
        var_dump($request->file('song'));
        var_dump($request->file('song'));
        echo('</pre>');
        die();
*/






        $songs = new Song();
        $songs->insert($request->except('_token'));
/*
        //SEND TO MODEL
        DB::table('songs')
            ->insert($request->except('_token'));
*/
        return redirect()->back()
            ->with('message','UPLOAD COMPLETE');
    }



    //VALIDATION FORM
    private function validation(Request $request){
        // SEND TO VALIDATION
        $validator = Validator::make($request->all(), [
            // 'album'=> 'required', //exists:album',
            'file' => 'mimes:mp3,wav|max:8191'
        ]);

        if ($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        return $request;
    }



    private function saveFile($music_file){

        $filename = $music_file->getClientOriginalName();

        $location = public_path('mp3/' . $filename);

        $music_file->move($location,$filename);
    }




    public function calculateFileLong($file){

        $ratio = 16000; //bytespersec

        if (!$file) {

            exit("Verify file name and it's path");

        }

        $file_size = filesize($file);

        if (!$file_size)
            exit("Verify file, something wrong with your file");

        $duration = ($file_size / $ratio);
        $minutes = floor($duration / 60);
        $seconds = $duration - ($minutes * 60);
        $seconds = round($seconds);

        return("$minutes:$seconds");

    }


}
