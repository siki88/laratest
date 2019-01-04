<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

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
      //  $request .= $request->long_song('55');
        return $this->controll($request);
    }

    //VALIDATION FORM
    private function controll($request){

      // $request->all() .= $this->checkboxHelper($request->all(),'compress');


        echo('<pre>');
        var_dump($request->all());
        //var_dump($request->checkbox() ? 1 : 0);
        //var_dump();
        echo('<pre>');
       // die();

        // SEND TO VALIDATION
        $validator = Validator::make($request->all(), [
           // 'album'=> 'required', //exists:album',
           // 'file' => 'required|mimes:audio/mp3|max:10240'
        ]);



        if ($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }





        //SEND TO MODEL
        DB::table('songs')
            ->insert($request->except('_token'));

        return redirect()->back()
            ->with('message','UPLOAD COMPLETE');
    }

    //This function is used to insert missing index key when checkboxes are used
    /*
    private function checkboxHelper($request_array, $key){
        if(!array_key_exists($key,$request_array)){
            $request_array[$key]='Ano';
        }else{
            $request_array[$key]='Ne';
        }
        return $request_array;
    }
    */

}
