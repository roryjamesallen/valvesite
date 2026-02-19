<html>
    <head>
	<style>
	 body {
	     display: flex;
	     justify-content: center;
	     align-items: center;
	     height: 100vh;
	     overflow: hidden;
	     background: black;
	     filter: invert(1);
	 }
	 #face {
	     position: relative;
	     width: 350px;
	     height: 350px;
	 }
	 #face > * {
	     position: absolute;
	     width: 100%;
	 }
	</style>
    </head>
    <body>
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
    </body>
</html>

<script>
 const valves = ['valve-1','valve-2'];
 const features = document.getElementById('face').children;

 function changeRandomFeature(){
     const feature_index = Math.floor(Math.random() * features.length);
     const valve = valves[Math.floor(Math.random() * valves.length)];
     const feature_image_element = features[feature_index];
     const image_path = '../images/faces/' + valve + '/' + feature_image_element.id + '.png';
     feature_image_element.src = image_path;
 }

 setInterval(changeRandomFeature, 50);
</script>
