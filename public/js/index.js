// External File: https://api.html5media.info/1.1.6/html5media.min.js

// Inspiration: https://css-tricks.com/ie-10-specific-styles/
var b = document.documentElement;
b.setAttribute('data-useragent',  navigator.userAgent);
b.setAttribute('data-platform', navigator.platform );

// Inspiration: http://jonhall.info/how_to/create_a_playlist_for_html5_audio
jQuery(function ($) {
    var supportsAudio = !! document.createElement('audio').canPlayType;
    if (supportsAudio) {
        var index = 0,
            playing = false;
 //       mediaPath = 'https://gdriv.es/markhillard/Mythium/',
        extension = '.mp3',
        tracks = [{
            "track": 1,
            "name": "Joe L.'s Studio - All This Is",
            "length": "02:46",
            "file": "mp3/JLS_ATI"
        }, {
            "track": 2,
            "name": "Broadwing Studio - The Forsaken",
            "length": "08:32",
            "file": "BS(FM)_TF"
        }, {
            "track": 3,
            "name": "Broadwing Studio - All The Kings Men",
            "length": "05:05",
            "file": "BS(FM)_ATKM"
        }],
        trackCount = tracks.length,
        npAction = $('#npAction'),
        npTitle = $('#npTitle'),
        audio = $('#audio1').bind('play', function () {
            playing = true;
            npAction.text('Now Playing...');
        }).bind('pause', function () {
            playing = false;
            npAction.text('Paused...');
        }).bind('ended', function () {
            npAction.text('Paused...');
            if ((index + 1) < trackCount) {
                index++;
                loadTrack(index);
                audio.play();
            } else {
                audio.pause();
                index = 0;
                loadTrack(index);
            }
        }).get(0),
        btnPrev = $('#btnPrev').click(function () {
            if ((index - 1) > -1) {
                index--;
                loadTrack(index);
                if (playing) {
                    audio.play();
                }
            } else {
                audio.pause();
                index = 0;
                loadTrack(index);
            }
        }),
        btnNext = $('#btnNext').click(function () {
            if ((index + 1) < trackCount) {
                index++;
                loadTrack(index);
                if (playing) {
                    audio.play();
                }
            } else {
                audio.pause();
                index = 0;
                loadTrack(index);
            }
        }),
        li = $('#plList li').click(function () {
            var id = parseInt($(this).index());
            if (id !== index) {
                playTrack(id);
            }
        }),
        loadTrack = function (id) {
            $('.plSel').removeClass('plSel');
            $('#plList li:eq(' + id + ')').addClass('plSel');
            npTitle.text(tracks[id].name);
            index = id;
            audio.src = tracks[id].file + extension;
        },
        playTrack = function (id) {
            loadTrack(id);
            audio.play();
        };
        loadTrack(index);
    }
});