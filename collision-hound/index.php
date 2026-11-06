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
	     overflow: clip;
	 }
	 :root {
	     --background: black;
	     --foreground: white;
	     --track-border: 2px;
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
	     filter: drop-shadow(0 0 1000px);
	 }
	 .track {
	     width: 20%;
	     aspect-ratio: 2.5 / 1;
	     font-size: 70%;
	     color: red;
	     mix-blend-mode: color-dodge;
	     background-color: black;
	 }
	 @media screen and (max-width: 900px){
	     .track {
		 font-size: 94%;
	     }
	 }
	 .track.playing .download-button {
	     background-color: red;
	     color: white;
	 }
	 .track.played {
	     opacity: 0.25;
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

	 #terminal {
	     height: 0;
	     display: flex;
	     flex-wrap: wrap;
	     justify-content: center;
	     font-size: 2rem;
	     color: white;
	     transition: width 0.5s, height 0.5s, opacity 0.25s;
	     background-color: black;
	     position: absolute;
	     bottom: 1.5rem;
	     left: 0;
	     width: 500px;
	 }
	 #terminal .note {
	     display: none;
	 }
	 #terminal.max:not(:has(.playing)) .note {
	     display: block;
	     z-index: 1
	 }
	 
	 #terminal video {
	     z-index: 2;
	     max-width: 0;
	     max-height: 0;
	 }
	 #terminal video.playing {
	     max-width: calc(100% - 2rem);
	     max-height: calc(100% - 2rem);
	 }
	 #terminal:has(.playing) {
	     height: min(350px, 90vh);
	 }

	 #info {
	     position: absolute;
	     cursor: pointer;
	     padding: 1rem;
	     top: 0;
	     right: 0;
	     width: 4rem;
	     height: 4rem;
	     color: white;
	     background-color: black;
	     z-index: 2;
	 }
	 #info .text {
	     display: none;
	 }
	 #info.visible {
	     width: unset;
	     height: unset;
	 }
	 #info.visible .text {
	     display: block;
	 }
.window {
    border: 2px solid var(--foreground);
    min-width: 150px;
}
.window > .toolbar {
    flex-basis: 100%;
    height: 20px;
    outline: 2px solid var(--foreground);
    display: flex;
    justify-content: end;
}
.toolbar > .button {
    outline: 2px solid var(--foreground);
    height: 100%;
    aspect-ratio: 1 / 1;
    font-family: Arial;
    font-size: 1rem;
    cursor: pointer;
}
.toolbar > .button:not(:last-child){
    margin-right: 2px;
}
.toolbar > * {
    display: flex;
    align-items: center;
    justify-content: center;
}
.toolbar > .title {
	 flex-grow: 1;
	 }
	 a {
	     color: white;
	     text-underline-offset: 5px;
	 }
	</style>
    </head>
    <body>	
	<div id="container">
	    <div id="info">
		?????<br>?????<br>?????
		<div class="text"><br>
		    This page contains the audiovisual data that makes up the debut release of the valve that failed: <span style="color: red">collision hound</span>.<br><br>All tracks can be downloaded for free and may be shared as widely as you are able.<br><br>Individual track downloads are V0 .mp3s, but the .zip full EP download contains lossless .wavs<br><br>Resample as aggressively as you desire, and send us your produce so we may reresample.<br><br>If you must support us financially you can do so on <a href="https://thevalvethatfailed.bandcamp.com/">Bandcamp</a><br><br>The videos/visualisers can be viewed on <a href="https://www.youtube.com/@thevalvethatfailed">YouTube</a>.
		</div>
	    </div>
	    
	    <div id="square">
		<div class="track play-all" style="left: 30.5%; top: 1.15%; width: 30%; aspect-ratio: 3.5 / 1" length="443">
		    <div class="slider" style="background-color: blue"></div>
		    Collision Hound EP<br><br><span class="play-icon">> PLAY ALL</span>
		    <a class="download-button" download href="tracks/collision-hound.zip">↓zip</a>
		</div>
		<div class="track" style="left: 11.5%; top: 19.15%" length="61" video="true">
		    <div class="slider"></div>
		    Toxic Gas on Draught<br><span class="play-icon">> PLAY</span>
		    <a class="download-button" download href="tracks/toxic-gas-on-draught.mp3">↓mp3</a>
		</div>
		<div class="track" style="left: 31%; top: 37.5%" length="101" video="true">
		    <div class="slider"></div>
		    Pt I - Stage 2: The Hatching of the Eggs<br><span class="play-icon">> PLAY</span>
		    <a class="download-button" download href="tracks/pti-stage-2-the-hatching-of-the-eggs.mp3">↓mp3</a>
		</div>
		<div class="track" style="left: 50.5%; top: 55%" length="83" video="true">
		    <div class="slider"></div>
		    Within The Chickens' Domain<br><span class="play-icon">> PLAY</span>
		    <a class="download-button" download href="tracks/within-the-chickens-domain.mp3">↓mp3</a>
		</div>
		<div class="track" style="left: 11%; top: 64%" length="34" video="true">
		    <div class="slider"></div>
		    Pt II - The Scribbles on the Whiteboard<br><span class="play-icon">> PLAY</span>
		    <a class="download-button" download href="tracks/ptii-the-scribbles-on-the-whiteboard.mp3">↓mp3</a>
		</div>
		<div class="track" style="left: 70.15%; top: 73%" length="101" video="true">
		    <div class="slider"></div>
		    There Will Be Credits<br><span class="play-icon">> PLAY</span>
		    <a class="download-button" download href="tracks/there-will-be-credits.mp3">↓mp3</a>
		</div>
		<div class="track" style="left: 40.5%; top: 81.75%" length="63" video="true">
		    <div class="slider"></div>
		    Pt III - Transient Loss of Consciousness<br><span class="play-icon">> PLAY</span>
		    <a class="download-button" download href="tracks/ptiii-transient-loss-of-consciousness.mp3">↓mp3</a>
		</div>
	    </div>

	    <div class="window" id="terminal">
		<div class="toolbar">
		    <div class="title" style="margin: auto; text-align: center; font-size: 1rem;">the valve that failed</div>
		    <div class="button" id="minimise-terminal">_</div>
		    <div class="button" id="maximise-terminal">□</div>
		    <div class="button" id="close-terminal">X</div>
		</div>
		<span class="note">awaiting video feed</span>
		<video id="video" muted="" autoplay="" playsinline="" loop="" style="object-fit: cover">
		    <source id="video-source" src="" type="video/mp4">
		</video>
	    </div>
	</div>

	<audio id="player" preload="auto">
	    <source id="player-source" src="">
	</audio>
	
    </body>
</html>

<script>
 const player = document.getElementById('player');
 const player_source = document.getElementById('player-source');
 const video = document.getElementById('video');
 const video_source = document.getElementById('video-source');
 const info = document.getElementById('info');
 var playing = false;
 var timeouts = [];

 function clickInfo(){
     if (info.classList.contains('visible')){
	 info.classList.remove('visible');
     } else {
	 info.classList.add('visible');
     }
 }
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

     if (track.getAttribute('video') == 'true'){
	 const downloadButton = track.querySelectorAll('.download-button');
	 if (downloadButton.length > 0){
	     const trackFile = downloadButton[0].href;
	     video_source.src = trackFile.replace('tracks/','videos/').replace('mp3','mp4');
	     video.classList.add('playing');
	     video.load();
	     video.play();
	     maximiseTerminal();
	 }	 
     }

     const slider = track.querySelectorAll('.slider')[0];
     if (slider){
	 track.classList.add('playing');     
	 const trackLength = track.getAttribute('length');     
	 slider.style.width = '100%';
	 slider.style.transition = 'width ' + trackLength + 's linear';
	 const playIcon = track.querySelectorAll('.play-icon')[0];
	 playIcon.innerText = '--PLAYING--';
	 timeouts.push(setTimeout(function(){
	     playIcon.innerText = 'PLAYED';
	     track.classList.add('played');
	 }, trackLength*1000))
     }
 }
 function stopTrack(){
     player.pause();
     player_source.src = '';
     video_source.src = '';
     video.classList.remove('playing');
     minimiseTerminal();
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
 function minimiseTerminal(){ // Make it look like the window/terminal was minimsed to just its header
     const terminal = document.getElementById('terminal');
     terminal.style.height = '20px';
     terminal.style.minHeight = 0;
     terminal.classList.remove('max');
 }
 function maximiseTerminal(){ // Show the full window/terminal
     const terminal = document.getElementById('terminal');
     terminal.classList.add('max');
     terminal.style.height = 'min(350px, 90vh)';
     terminal.style.minHeight = 0;
 }

 const tracks = document.getElementsByClassName('track');
 for (track of tracks){
     track.addEventListener('click', clickTrack);
 }

 document.getElementById('close-terminal').addEventListener('click', minimiseTerminal);
 document.getElementById('minimise-terminal').addEventListener('click', minimiseTerminal);
 document.getElementById('maximise-terminal').addEventListener('click', maximiseTerminal);
 maximiseTerminal();
 minimiseTerminal();
 info.addEventListener('click', clickInfo);
 
</script>
