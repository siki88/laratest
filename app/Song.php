<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model{

    public function someFunction()
    {
        dd($this->table());
    }

}
