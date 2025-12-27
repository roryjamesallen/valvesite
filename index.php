<!DOCTYPE html>
<html>
    <head>
	<title>The Valve That Failed</title>
	<link rel="stylesheet" href="style.css">
    </head>
    <body>
      <div id="intro-animation"></div>
    </body>
    <script>
     function updateElementText(element, text){
	 element.innerText = text;
     }
     function animateText(element, words, speed){
	 for (let word_index = 0; word_index < words.length; ++word_index) {
	     setTimeout(updateElementText, (speed * word_index), element, words[word_index]);
	 }
     }
     function introAnimation(){
	 const div = document.getElementById('intro-animation');
	 div.style.display = 'flex';
	 animateText(div, 'the valve that failed'.split(' '), 150);
	 setTimeout(() => { div.style.display = 'none' }, 650);
     }
     
     window.onload = function() {
	     introAnimation();
     };
    </script>
</html>
