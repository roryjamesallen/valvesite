<?php

function renderTrack($track_id, $track){
    $date = date("d-m-y", $track['time']);
    echo "<li class='track' id='track-{$track_id}'><h3>{$track_id}</h3><span class='play-button'>→</span><a href='{$track_id}' download class='download-button'>↓</a><span class='track-time'>{$date}</span></li>";
}

function renderTracks(){
    $tracks_json = json_decode(file_get_contents('tracks.json'), true);
    uasort($tracks_json, function ($a, $b) {
	return $b['time'] <=> $a['time'];
    });
    echo '<ul class="tracklist">';
    foreach ($tracks_json as $track_id => $track){
	renderTrack($track_id, $track);
    }
    echo '</ul>';
}

?>

<!DOCTYPE html>
<html>
    <head>
	<title>The Valve That Failed</title>
	<link rel="stylesheet" href="style.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    </head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6BQYQMEP06"></script>
    <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());
     gtag('config', 'G-6BQYQMEP06');
    </script>

    <style>
     :root {
	 --track-border: 2px;
     }

     .page-container {
	 display: flex;
	 flex-wrap: wrap;
	 margin-top: 4rem;
	 justify-content: center;
     }
     
     .tracklist {
	 list-style-type: none;
	 padding: 0;
	 flex-basis: 50%;
     }
     .track {
	 display: flex;
	 flex-wrap: wrap;
	 border: var(--track-border) solid white;
	 width: fit-content;
	 align-items: start;
	 gap: var(--track-border);
	 background-color: white;
	 position: relative;
	 margin-bottom: 3rem;
     }
     .track:has(.playing){
	 border-color: red;
	 background-color: red;
	 color: red;
     }
     .track > h3, .play-button, .download-button {
	 height: 2rem;
	 display: flex;
	 align-items: center;
	 justify-content: center;
	 margin: 0;
	 background-color: black;
     }
     .track > h3 {
	 font-size: 1rem;
	 padding: 0.5rem;
	 height: fit-content;
     }
     .play-button, .download-button {
	 aspect-ratio: 1 / 1;
	 cursor: pointer;
     }
     .download-button {
	 text-decoration: none;
	 color: unset
     }
     .track-time {
	 position: absolute;
	 bottom: -1.25rem;
	 left: 0;
	 font-size: 0.75rem;
     }


     #face {
	 position: relative;
	 width: 350px;
	 height: 350px;
     }
     #face > * {
	 position: absolute;
	 width: 100%;
	 filter: invert(1);
     }
    </style>
    
    <body>
	<h1>the valve that failed</h1>
	

	<div class="page-container">
	    <div id="face">
		<img id="scalp">
		<img id="left-eyebrow">
		<img id="right-eyebrow">
		<img id="left-eye">
		<img id="right-eye">
		<img id="left-ear">
		<img id="right-ear">
		<img id="nose">
		<img id="mouth">
		<img id="chin">
	    </div>
	    <?php renderTracks(); ?>
	</div>
	
	<audio id="player" preload="auto">
	    <source id="player-source" src="">
	</audio>
    </body>
</html>

<script>
 const player = document.getElementById('player');
 const player_source = document.getElementById('player-source');
 function pauseAllTracks(){
     const play_buttons = document.getElementsByClassName('play-button');
     for (let i=0; i<play_buttons.length; ++i){
	 const play_button = play_buttons[i];
	 stopTrack(play_button);
     }
 }
 function stopTrack(play_button){
     if (play_button.classList.contains('playing')){
	 play_button.classList.remove('playing');
	 play_button.innerText = '→';
	 player_source.src = '';
	 player.pause();
     }
 }
 function processPlay(event){
     const play_button = event.target;
     if (play_button.classList.contains('playing')){
	 stopTrack(play_button);
     } else {
	 pauseAllTracks();
	 play_button.classList.add('playing');
	 play_button.innerText = '⏸︎';
	 player_source.src = 'tracks/' + play_button.parentNode.getElementsByTagName('h3')[0].innerText;
	 player.load();
	 player.play();
     }
 } 
 function initialiseTrackButtons(){
     const play_buttons = document.getElementsByClassName('play-button');
     for (let i=0; i<play_buttons.length; ++i){
	 const play_button = play_buttons[i];
	 play_button.addEventListener('click', processPlay);
     }
 }


 const valves = ['valve-1','valve-2'];
 const features = document.getElementById('face').children;

 function changeRandomFeature(){
     const feature_index = Math.floor(Math.random() * features.length);
     const valve = valves[Math.floor(Math.random() * valves.length)];
     const feature_image_element = features[feature_index];
     const image_path = 'images/faces/' + valve + '/' + feature_image_element.id + '.png';
     feature_image_element.src = image_path;
 }

 setInterval(changeRandomFeature, 50);
 initialiseTrackButtons();
</script>
