<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use wapmorgan\Mp3Info\Mp3Info;

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

    //VALIDATION FORM
    private function controll($request){

        // SEND TO VALIDATION
        $validator = Validator::make($request->all(), [
           // 'album'=> 'required', //exists:album',
           // 'file' => 'required|mimes:audio/mp3|max:10240'
        ]);

       // $validator->setAttributeNames(array('long_song'=>'test'));



        if ($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

      //  $audio = new Mp3Info($request->file('song'),true);

      //  $request->setAttribute('long_song') = "55:55";
/*
        echo('<pre>');
       // var_dump($request->file('song')->getSize());
        var_dump(get_class_methods($request));

     //   var_dump($request->long_song());
          var_dump($request->all());
        echo('</pre>');
        die();
*/


        $request->merge([
                'size_song' => $request->file('song')->getSize(),
                'long_song' => '55:55te'
                        ]);


        //SEND TO MODEL
        DB::table('songs')
            ->insert($request->except('_token'));

        return redirect()->back()
            ->with('message','UPLOAD COMPLETE');
    }


}
