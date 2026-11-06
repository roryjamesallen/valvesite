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
	 }
	 #square {
	     position: relative;
	     width: 100%;
	     aspect-ratio: 1 / 1;
	     max-width: 100vh;
	     background-image: url(collision-hound.jpeg);
	     background-size: contain;
	     background-repeat: no-repeat;
	 }
	 .player {
	     width: 17%;
	     aspect-ratio: 2 / 1;
	     font-size: 80%;
	     color: red;
	 }
	 .download-button {
	     right: 0;
	     bottom: 0;
	     transform: translate(100%, 5px);
	     color: white;
	     width: 25%;
	     aspect-ratio: 1;
	     font-family: Press Start;
	     display: flex;
	     justify-content: center;
	     align-items: center;
	 }
	 .player, .download-button {
	     position: absolute;
	     background-color: black;
	     box-sizing: border-box;
	     border: 5px solid white;
	 }
	</style>
    </head>
    <body>
	<div id="container">
	    <div id="square">
		<div class="player" style="left: 14%; top: 21.5%">
		    Toxic Gas on Draught
		    <div class="download-button">↓</div>
		</div>
		<div class="player" style="left: 32%; top: 38.5%">
		    Pt I - Stage 2: The Hatching of the Eggs
		    <div class="download-button">↓</div>
		</div>
		<div class="player" style="left: 50%; top: 55%">
		    Within The Chickens' Domain
		    <div class="download-button">↓</div>
		</div>
		<div class="player" style="left: 14%; top: 63%">
		    Pt II - The Scribbles on the Whiteboard
		    <div class="download-button">↓</div>
		</div>
		<div class="player" style="left: 68.5%; top: 71.5%">
		    There Will Be Credits
		    <div class="download-button">↓</div>
		</div>
		<div class="player" style="left: 41%; top: 79.5%">
		    Pt III - Transient Loss of Consciousness
		    <div class="download-button">↓</div>
		</div>
	    </div>
	</div>
    </body>
</html>

<!--


     
-->
