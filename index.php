<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function renderTrack($track_id, $track){
    $date = date("d-m-y", $track['time']);
    echo "
<li class='track' id='track-{$track_id}'>
<h3>{$track_id}</h3>
<span class='play-button'>→</span>
<a href='tracks/{$track_id}' download class='download-button'>↓</a>
<span class='track-time'>{$date}</span>
</li>";
}

function renderTracks(){
    $tracks_json = json_decode(file_get_contents('tracks.json'), true);
    uasort($tracks_json, function ($a, $b) {
	return $b['time'] <=> $a['time'];
    });
    echo '<ul class="tracklist" id="tracklist">';
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
	<link rel="stylesheet" href="style.css?v=5">
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

    <body>
	<h1>the valve that failed</h1>

	<a href="https://hogwild.uk" class="hover-reveal">
	    <img src="images/match-lit.gif" id="match" alt="animated match" class="hover-image">
	</a>

	<div class="page-container">
	    <div id="face">
		<img id="scalp" >
		<img id="left-eyebrow" >
		<img id="right-eyebrow" >
		<img id="left-eye" >
		<img id="right-eye" >
		<img id="left-ear" >
		<img id="right-ear" >
		<img id="nose" >
		<img id="mouth" >
		<img id="chin" >
		<span id="face-text"></span>
	    </div>

	    <?php renderTracks(); ?>

	    <div class="window" id="terminal">
		<div class="toolbar">
		    <div class="title"><h1>the valve that failed</h1></div>
		    <div class="button" id="minimise-terminal">_</div>
		    <div class="button" id="maximise-terminal">□</div>
		    <div class="button" id="close-terminal">X</div>
		</div>
		<div id="intro-animation"></div>
	    </div>
	    <div id="message"></div>

	    <div id="encoded-text-container">
		<div id="encoded-text"></div>
	    </div>
	</div>
	
	<audio id="player" preload="auto">
	    <source id="player-source" src="">
	</audio>
    </body>
</html>

<script>

 // PLAYER
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


 //FACES
 const valves = ['valve-1','valve-2'];
 const features = document.getElementById('face').children;
 const face_text = document.getElementById('face-text');
 const encoded_text = document.getElementById('encoded-text');
 const corrupted_letters = ['!','@','£','$','%','^','&','*','(',')','~','"','-','\\','|','a','b','c','d','<span style="color: red">CORRUPTED</span><br>'];
 
 function encodeText(text){
     var newtext = '';
     for (let i=0; i<text.length; ++i){
	 const corruption_chance = (i / text.length) - 0.75;
	 var letter = text[i];
	 if (corruption_chance > Math.random()){
	     letter = corrupted_letters[Math.floor(Math.random()*corrupted_letters.length)];
	 }
	 newtext += letter;
     }
     return newtext;
 }
 function changeRandomFeature(){
     const feature_index = Math.floor(Math.random() * features.length);
     const valve = valves[Math.floor(Math.random() * valves.length)];
     const feature_image_element = features[feature_index];
     const image_path = 'images/faces/' + valve + '/' + feature_image_element.id + '.png';
     feature_image_element.src = image_path;
     image_bounds = feature_image_element.getBoundingClientRect();
     const old_text = face_text.innerHTML;
     const new_text = valve + '-' + feature_image_element.id.replace('eye','<span style="color: red">eye</span>') + '<br>' + old_text.substring(0,200);
     face_text.innerHTML = new_text;
     encoded_text.innerHTML = encodeText(new_text);
 }


 // TITLES
 const titles = [
     "within the chickens' domain",
     "dave Matthews band chicago river incident",
     "the centre of the observable universe",
     "i always forget how dark it is in the forest",
     "you might have got us this time, but we will get you next time",
     "the allure of the canal",
     "cease your meddling",
     "if you leave me on read, I'm going to make your phone scream",
     "where did all the stuff gone",
     "pt1. curse their stinge when it comes to the cheese. pt2. and curse their generosity when it comes to the beans",
     "stage two: the hatching of the eggs",
     "there will be credits",
     "i find comfort near the edge",
     "the taste of what was previously on this fork",
     "to be the second cop at the massage parlour",
     "i have received some of the worst news i could ever have received",
     "shining the torch on a dying slug",
     "the number one ambient stuffing brand",
     "the unofficial village gravedigger",
     "brother, the cattle are aligned",
     "have you seen the machines?",
     "sokol's deception flowchart",
     "if power systems engineering is teaching me anything it's that I will never ever be able to sketch even a half decent sine wave",
     "easier done than said",
     "jupiter in my hands; i want a house just like this",
     "the skin, the viscera",
     "the same dead eyes",
     "there is something to be said about a man with a consistent face",
     "it is a fate worth suffering",
     "to be the cob chobber in this nottingham venue",
     "every time i say something i add a second clause",
     "transient loss of consciousness",
     "a career in magnetics",
     "pt3. the scribbles on the whiteboard",
     "the bison on the plains",
     "it starts on the other side of town",
     "in one direction, we have a small empire of blood. In the other, you can taste the madness.",
     "i used to read her scripture to my children",
     "that portion of her time above the ground",
     "she will sit right in front of me and say 'i'm sorry sir' then put me out of my misery",
     "to get on the farm and claim my place as ye scabrous exporter of flesh and marrow",
     "do winged beasts mourn for their fallen?",
     "it's your round at the toxic pub",
     "toxic gas on draught",
     "dog chemo",
     "the best player in bottom set pe",
     "designing the canopy layer"
 ];
 
 function updateElementText(element, text){
     element.innerText = text;
 }
 function animateText(element, words, speed){ // Begin an animation displays array words word by word with word interval set by speed
     for (let word_index = 0; word_index < words.length; ++word_index) {
	 setTimeout(updateElementText, (speed * word_index), element, words[word_index]);
     }
 }
 function shuffleArray(array) { // Return supplied array in randomised order. Does not affect original array
     let original_array = array.slice(); // Create copy of original array
     let currentIndex = original_array.length;
     while (currentIndex != 0) {
	 let randomIndex = Math.floor(Math.random() * currentIndex);
	 currentIndex--;
	 [original_array[currentIndex], original_array[randomIndex]] = [
	     original_array[randomIndex], original_array[currentIndex]];
     }
     return original_array
 }
 function introAnimation(){ // Start running the animation of valve titles in a random order
     const div = document.getElementById('intro-animation');
     div.style.display = 'flex';
     animateText(div,('the valve that failed ... STOP ... '+shuffleArray(titles).join(' ... STOP ... ')+' ... ').split(' '), 150);
 }
 function closeTerminal(){ // Start animation to make it look like the fake window/terminal was closed
     const terminal = document.getElementById('terminal');
     terminal.style.width = 0;
     terminal.style.height = 0;
     terminal.style.opacity = 0;
     setTimeout(() => { killedValve() }, 250);
 }
 function killedValve(){
     const message = document.getElementById('message');
     message.style.display = 'fixed';
     animateText(message, 'you have killed the valve that failed ... '.split(' '), 250);
 }
 function minimiseTerminal(){ // Make it look like the window/terminal was minimsed to just its header
     const terminal = document.getElementById('terminal');
     terminal.style.height = '20px';
     terminal.style.minHeight = 0;
     document.getElementById('intro-animation').style.opacity = 0;
 }
 function maximiseTerminal(){ // Show the full window/terminal
     const terminal = document.getElementById('terminal');
     terminal.style.height = 'min(350px, 90vh)';
     terminal.style.minHeight = 0;
     setTimeout(() => { document.getElementById('intro-animation').style.opacity = 1; }, 250);
 }


 // MATCH
 const match = document.getElementById('match');
 var match_active = false;
 function lightMatch(){
     if (!match_active){
	 match_active = true;
	 match.src = 'images/match-lighting.gif';
	 setTimeout(() => {
	     match.src = 'images/match-lit.gif';
	 }, 660);
     }
 }
 function extinguishMatch(){
     match_active = false;
     setTimeout(() => { match.src = 'images/match-out.png'; }, 200);
 }
 match.addEventListener('mouseover', lightMatch);
 match.addEventListener('mouseout', extinguishMatch);
 


 // SVG LINES
 function createSVG(){
     var svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
     svg.style.position = 'absolute';
     svg.style.top = '0';
     svg.style.left = '0';
     svg.style.zIndex = '-1';
     svg.setAttribute('width', '100%');
     svg.setAttribute('height', '100%');
     return svg;
 }
 function createSVGLine(x1, y1, x2, y2){
     var newLine = document.createElementNS('http://www.w3.org/2000/svg','line');
     newLine.setAttribute('id','line2');
     newLine.setAttribute('x1',x1);
     newLine.setAttribute('y1',y1);
     newLine.setAttribute('x2',x2);
     newLine.setAttribute('y2',y2);
     newLine.setAttribute("stroke", "white");
     return newLine;
 }
 function getElementCoords(element, relative=true){
     const rect = element.getBoundingClientRect();
     var xy = [((rect.right - rect.left) / 2) + rect.left, ((rect.bottom - rect.top) / 2) + rect.top]; // Centre of element
     if (relative){
	 const parent = element.parentNode;
	 const parent_rect = parent.getBoundingClientRect();
	 xy[0] -= parent_rect.left;
	 xy[1] -= parent_rect.top;
     }
     return xy;
 }
 function drawTrackLines(){
     const svg = createSVG();
     svg.id = 'tracklist-svg';
     const tracklist = document.getElementById('tracklist');
     var previous_track_coords = null;
     for (let i=0; i<tracklist.children.length; ++i){
	 const track = tracklist.children[i];
	 const track_coords = getElementCoords(track);
	 if (previous_track_coords && track.nodeName != 'svg'){
	     svg.appendChild(createSVGLine(previous_track_coords[0],previous_track_coords[1],track_coords[0],track_coords[1]));
	 }
	 previous_track_coords = track_coords;
     }
     if (tracklist.contains(document.getElementById('tracklist-svg'))){
	 document.getElementById('tracklist-svg').remove();
     }
     tracklist.appendChild(svg);
 }
 
 
 // PAGE LOAD
 setInterval(changeRandomFeature, 50);
 initialiseTrackButtons();
 document.getElementById('close-terminal').addEventListener('click', closeTerminal);
 document.getElementById('minimise-terminal').addEventListener('click', minimiseTerminal);
 document.getElementById('maximise-terminal').addEventListener('click', maximiseTerminal);
 
 window.onload = function() {
     introAnimation();
     drawTrackLines();
     window.addEventListener('resize', drawTrackLines);
 };
</script>
