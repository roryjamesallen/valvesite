<!DOCTYPE html>
<html>
    <head>
	<title>The Valve That Failed</title>
	<link rel="stylesheet" href="style.css">
    </head>
    <body>
	<h1>the valve that failed, eat the burger pretty pls</h1>
	<div id="intro-animation"></div>
    </body>
    <script>
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
     function animateText(element, words, speed){
	 for (let word_index = 0; word_index < words.length; ++word_index) {
	     setTimeout(updateElementText, (speed * word_index), element, words[word_index]);
	 }
     }
     function shuffleArray(array) {
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
     function introAnimation(){
	 const div = document.getElementById('intro-animation');
	 div.style.display = 'flex';
	 animateText(div,('the valve that failed ... STOP ... '+shuffleArray(titles).join(' ... STOP ... ')+' ... ').split(' '), 150);
     }
     
     window.onload = function() {
	 introAnimation();
     };
    </script>
</html>
