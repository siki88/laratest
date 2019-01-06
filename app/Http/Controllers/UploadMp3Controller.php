<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Song;
use Auth;
use FFMpeg;
use Illuminate\Contracts\Filesystem\Filesystem;

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

        $requestFormat = $request->get('format');
        $convert = $request->file('song')->getClientOriginalExtension();

        if($requestFormat && $requestFormat != null){
            $convert = 'convert-'.$convert;
        }
        $requestFormat = $request->get('format');


/*
        echo('<pre>');
        var_dump(get_class_methods($request->file('song')));
      //  var_dump($request->all());
        var_dump($request->file('song'));

        var_dump($request->file('song')->getClientOriginalName());


        echo('</pre>');
        die();
*/



        $request->merge([
            'size_song' => $request->file('song')->getSize(),
            'long_song' => $this->calculateFileLong($request->file('song')),
            'users_id'  => Auth::user()->id,
            'format'   =>  $convert,
            'name'      => $request->file('song')->getClientOriginalName()
        ]);

        //save on DB
        $songs = new Song();
        $song_id = $songs->insertGetId($request->except('_token'));

        //save on FILE
        $this->saveFile($request->file('song'),$song_id,$requestFormat);




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
            'file' => 'mimes:mp3,wav|max:10191'
        ]);

        if ($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        return $request;
    }



    private function saveFile($music_file,$song_id,$requestFormat){

        $filename = $music_file->getClientOriginalName();

        $location = public_path('mp3/');
/*
        echo('<pre>');
        var_dump(get_class_methods($music_file));
        echo('</pre>');

        echo('<pre>');
        var_dump($music_file->hashName());
        var_dump($music_file->path());
        var_dump($music_file->extension());
        var_dump($music_file->clientExtension());
        var_dump($music_file->getPathInfo());
        var_dump($music_file->getFileInfo());
        var_dump($music_file->getRealPath());
        var_dump($music_file->getFileInfo());
        var_dump($music_file->getLinkTarget());
        var_dump($music_file->getPathname());
        var_dump($music_file->getBasename());
        var_dump($music_file->getExtension());
        var_dump($music_file->getFilename());
        var_dump($music_file->getPath());
        var_dump($music_file->getMimeType());
        echo('</pre>');

        echo('<pre>');
        var_dump($location);
        var_dump($requestFormat);
        var_dump(public_path('mp3/'));
        echo('</pre>');

        dd($filename);
*/
        $music_file->move($location,$filename);

        //CONVERT TO MP3
        if($requestFormat && $requestFormat != null){
            $this->convertSong($location,$filename,$song_id,$music_file);
        }
    }




    private function calculateFileLong($file){

        $ratio = 16000; //bytespersec

        if (!$file) {
            exit("Verify file name and it's path");
        }

        $file_size = filesize($file);

        if (!$file_size){
            exit("Verify file, something wrong with your file");
        }

        $duration = ($file_size / $ratio);
        $minutes = floor($duration / 60);
        $seconds = $duration - ($minutes * 60);
        $seconds = round($seconds);

        return("$minutes:$seconds");
    }


    private function convertSong($location,$filename,$song_id,$music_file){
        $public_path = public_path('mp3/');
        $name_song = $song_id.'-'.$filename;

        $pupu = $public_path.'/'.$name_song.'/';

         dd($media);
        /*
        FFMpeg::fromFilesystem($pupu)
            ->open($song_id.'-'.$filename)
            ->export()
            ->toDisk($pupu)
            ->inFormat(new \FFMpeg\Format\Audio\Aac)
            ->save($song_id.'-'.$filename);
        */
    }




}
