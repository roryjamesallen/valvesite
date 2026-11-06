<?php

?>

<html>
    <head>
	<style>
	 @font-face {
	     font-family: Super VCR;
	     src: url(../fonts/super-vcr-mono.ttf);
	 }
	 @font-face {
	     font-family: Press Start;
	     src: url(../fonts/press_start.ttf);
	 }
	 body {
	     margin: 0;
	     font-family: Super VCR;
	     background-image: linear-gradient(#dadee6, #c2c3c9);
	 }
	 #container {
	     display: flex;
	     width: 100vw;
	     height: 100vh;
	     justify-content: center;
	     align-items: center;
	     background-image: url(collision-hound.jpg);
	     background-size: contain;
	 }
	 #square {
	     position: relative;
	     width: 100%;
	     aspect-ratio: 1 / 1;
	     max-width: 100vh;
	     background-image: url(collision-hound.jpg);
	     background-size: contain;
	     background-repeat: no-repeat;
	 }
	 .track {
	     width: 20%;
	     aspect-ratio: 2.5 / 1;
	     font-size: 70%;
	     color: red;
	     mix-blend-mode: color-dodge;
	     background-color: black;
	 }
	 .track.playing .download-button {
	     background-color: red;
	     color: white;
	 }
	 .download-button {
	     right: 0;
	     bottom: 0;
	     transform: translate(100%);
	     color: white;
	     height: 100%;
	     aspect-ratio: 1;
	     font-family: Press Start;
	     font-size: 0.75rem;
	     display: flex;
	     justify-content: center;
	     align-items: center;
	     background-color: white;
	     color: black;
	 }
	 .track, .download-button {
	     position: absolute;
	     cursor: pointer;
	 }
	 .slider {	     
	     position: absolute;
	     top: 0;
	     left: 0;
	     height: 100%;
	     width: 0%;
	     background-color: red;
	     mix-blend-mode: difference;
	 }
	 .play-icon {
	     color: white;
	     }
	</style>
    </head>
    <body>
	<div id="container">
	    <div id="square">
		<div class="track play-all" style="left: 30.5%; top: 1.15%; width: 30%; aspect-ratio: 3.5 / 1" length="443">
		    <div class="slider" style="background-color: blue"></div>
		    Collision Hound EP<br><br><span class="play-icon">> PLAY ALL</span>
		    <a class="download-button" download href="tracks/collision-hound.zip">↓zip</a>
		</div>
		<div class="track" style="left: 11.5%; top: 19.15%" length="61">
		    <div class="slider"></div>
		    Toxic Gas on Draught<br><span class="play-icon">> PLAY</span>
		    <a class="download-button" download href="tracks/toxic-gas-on-draught.mp3">↓mp3</a>
		</div>
		<div class="track" style="left: 31%; top: 37.5%" length="101">
		    <div class="slider"></div>
		    Pt I - Stage 2: The Hatching of the Eggs<br><span class="play-icon">> PLAY</span>
		    <a class="download-button" download href="tracks/pti-stage-2-the-hatching-of-the-eggs.mp3">↓mp3</a>
		</div>
		<div class="track" style="left: 50.5%; top: 55%" length="83">
		    <div class="slider"></div>
		    Within The Chickens' Domain<br><span class="play-icon">> PLAY</span>
		    <a class="download-button" download href="tracks/within-the-chickens-domain.mp3">↓mp3</a>
		</div>
		<div class="track" style="left: 11%; top: 64%" length="34">
		    <div class="slider"></div>
		    Pt II - The Scribbles on the Whiteboard<br><span class="play-icon">> PLAY</span>
		    <a class="download-button" download href="tracks/ptii-the-scribbles-on-the-whiteboard.mp3">↓mp3</a>
		</div>
		<div class="track" style="left: 70.15%; top: 73%" length="101">
		    <div class="slider"></div>
		    There Will Be Credits<br><span class="play-icon">> PLAY</span>
		    <a class="download-button" download href="tracks/there-will-be-credits.mp3">↓mp3</a>
		</div>
		<div class="track" style="left: 40.5%; top: 81.75%" length="63">
		    <div class="slider"></div>
		    Pt III - Transient Loss of Consciousness<br><span class="play-icon">> PLAY</span>
		    <a class="download-button" download href="tracks/ptiii-transient-loss-of-consciousness.mp3">↓mp3</a>
		</div>
	    </div>
	</div>

	<audio id="player" preload="auto">
	    <source id="player-source" src="">
	</audio>
	
    </body>
</html>

<!--

     if click on any box
     1. stop all playback
     2. if box was start box, set timeouts for all graphics and start playing full clip
     3. if box wasn't start box, start box graphic and play box only
     
-->

<script>
 const player = document.getElementById('player');
 const player_source = document.getElementById('player-source');
 var playing = false;
 var timeouts = [];

 function resetAllSliders(){
     for (track of tracks){
	 resetSlider(track);
     }
 }
 function resetSlider(track){
     track.classList.remove('playing');
     const slider = track.querySelectorAll('.slider')[0];
     slider.style.transition = 'width 0s';
     slider.style.width = '0%';
     const playIcon = track.querySelectorAll('.play-icon')[0];
     playIcon.innerText = '> PLAY';
 }
 function startSlider(track){
     track.classList.add('playing');
     const slider = track.querySelectorAll('.slider')[0];
     const trackLength = track.getAttribute('length');
     slider.style.width = '100%';
     slider.style.transition = 'width ' + trackLength + 's linear';
     const playIcon = track.querySelectorAll('.play-icon')[0];
     playIcon.innerText = '--PLAYING--';
 }
 function stopTrack(){
     player.pause();
     player_source.src = '';
 }
 function playSource(source){
     player_source.src = source;
     player.load();
     player.play();
 }
 function playTrack(track){
     const downloadButton = track.querySelectorAll('.download-button');
     if (downloadButton.length > 0){
	 const trackFile = downloadButton[0].href;
	 for (track of tracks){
	     resetSlider(track);
	 }
	 playSource(trackFile);
     }
 }
 function resetAllTimeouts(){
     for (let i=0; i<timeouts.length; ++i){
	 clearTimeout(timeouts[i]);
     }
 }
 function clickTrack(e){
     const track = e.target;

     if (playing){
	 stopTrack();
	 resetAllSliders();
	 resetAllTimeouts();
     } else {
	 playing = true;
     }
     
     if (track.classList.contains('play-all')){
	 playSource('tracks/collision-hound-ep.mp3');
	 startSlider(track);
	 let currentDelay = 0;
	 for (let i=1; i<tracks.length; ++i){ // For every track (in order) in the EP
	     const ep_track = tracks[i];
	     ep_track.querySelectorAll('.play-icon')[0].innerText = 'QUEUED...'; // Visually mark the track as queued
	     timeouts.push(setTimeout(function(){
		 startSlider(ep_track);
	     }, currentDelay));
	     const trackLength = parseInt(ep_track.getAttribute('length')); // Get the track's length
	     currentDelay += (trackLength * 1000); // Add the track's length to the total delay to make the next track start afterwards
	 }
     } else {
	 playTrack(track);
	 setTimeout(function(){startSlider(track)}, 100);
     }
 }

 const tracks = document.getElementsByClassName('track');
 for (track of tracks){
     track.addEventListener('click', clickTrack);
 }
 
</script>
