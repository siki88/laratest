
<p class="pForTable">SONG</p>

<?php
$header = \App\Http\Controllers\PlayListController::getPlayList();
?>

        <!--
        {!! Table::optionLinks('home','action','delete')
                ->modelResult(function($query){
                      return $query;
                  })->generateModel($header,'App\Song',$header,0,['class'=>'table'])
        !!}
        -->

        {!! Table::optionLinks('home', 'action', 'delete')
                ->generateModel($header,'App\Song',$header,0,['class'=>'table'])
        !!}

