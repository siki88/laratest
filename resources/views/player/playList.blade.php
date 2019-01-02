
<p class="pForTable">SONG</p>

<?php
//$header = \App\Http\Controllers\PlayListController::getPlayList();

$playlistValue = ['id','song'];
?>

        <!--
        {!! Table::optionLinks('home','action','delete')
                ->modelResult(function($query){
                      return $query;
                  })->generateModel($playlistValue,'App\Song',$playlistValue,0,['class'=>'table'])
        !!}
        -->

        {!! Table::optionLinks('home', 'action', 'delete')
                ->generateModel($playlistValue,'App\Song',$playlistValue,0,['class'=>'table'])
        !!}

