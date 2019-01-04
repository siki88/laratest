<article>

        <div class="twelve columns offset-by-two add-bottom">
            <div id="nowPlay">
                <span class="left" id="npAction">Paused...</span>
                <span class="right" id="npTitle"></span>
            </div>
            <div id="audiowrap">
                <div id="audio0">
                    <audio preload id="audio1" controls="controls">Your browser does not support HTML5 Audio!</audio>
                </div>
                <div id="tracks">
                    <a id="btnPrev">&laquo;</a>
                    <a id="btnNext">&raquo;</a>
                </div>
            </div>
            <div id="plwrap">
                <ul id="plList">
                    @foreach($playerList as $playlist)
                        <li>
                            <div class="plItem">
                                <div class="plNum">{{$playlist->id}}.</div>
                                <div class="plTitle">{{$playlist->song}}</div>
                                <div class="plLength">2:46</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

</article>


<!--

RewriteEngine on
RewriteCond %{REQUEST_URI} !^public
RewriteRule ^(.*)$ public/$1 [L]


-->
