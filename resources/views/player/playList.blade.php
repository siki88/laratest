<p class="pForTable">SONG</p>
<?php // dd($playList); ?>
<!--
        {!! Table::optionLinks('home','action','delete')
                ->modelResult(function($query){
                      return $query;
                  })->generateModel($playList,'App\Song',$playList,0,['class'=>'table'])
        !!}
    -->

{!! Table::optionLinks('home', 'action', 'delete')
        ->generateModel($playList,'App\Song',$playList,0,['class'=>'table'])
!!}

