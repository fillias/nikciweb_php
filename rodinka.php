<?php require 'includes/header.php'; ?>
<?php 
$dirname = "obr/";
$images = glob($dirname."*.JPG");
?>

<div class="gallery-big-close">X</div>
<div class="gallery-big-background">X</div>
<div class="gallery-wrapper"></div>
<script type="text/javascript">
var closeBig = document.querySelector('.gallery-big-close');
var backBig = document.querySelector('.gallery-big-background');
var wrapper = document.querySelector('.gallery-wrapper');



var images = <?php echo json_encode($images); ?>;
const ln = images.length;

let count = 0, allImgLoaded = false;

if (!count) loadImages(count);

function loadImages(index) {
	for (let i = index; i <= ln; i++ ) {

		if (images[i]) {
			displayImage(images[i]);
		}
		
		if ( i == ln ) {
			allImgLoaded = true;
			//console.info('END');
			//removeOldButton();
			return;
		}

		if (i == index + 5) {  // tady resim kolik nacist dalsich obrazku
			//console.log('kuk');
			//loadMore(i + 1);
			//addButton(i+1);
			count = i + 1;
			return;
		}
	}
}




function displayImage(src) {
	const img = document.createElement('img');
	img.className += 'gallery-image';
	img.src = src;
	img.addEventListener('click', function(){
		enlargeImg(this);
	} );
	wrapper.appendChild(img);
}




function enlargeImg(img) {
	disableScroll();
	var zpet = document.querySelector('#zpet');
	zpet.style.display = 'none';
	img.className += ' gallery-image-big';

	closeBig.style.display = "block";
	backBig.style.display = "block";
	closeBig.addEventListener('click', function handler(e){
		img.classList.remove('gallery-image-big');
		this.removeEventListener('click', handler);
		this.style.display = 'none';
		backBig.style.display = "none";
		zpet.style.display = 'block';
		enableScroll();
	});
}

function addZpetButton(i){

	const button = document.createElement('button');
	button.id = "zpet";
	button.textContent = 'nahoru';
	button.className += 'button-zpet ';
	button.addEventListener('click', function() {
		window.scrollTo(0,0);
	});	
	document.body.appendChild(button);
}

window.addEventListener('scroll', checkScroll);

function checkScroll (e) {
	//console.log(e);
	if (window.scrollY > 300) {
		addZpetButton();
		window.removeEventListener('scroll', checkScroll);
	}
}


window.onscroll = function() {
  var d = document.documentElement;
  var offset = d.scrollTop + window.innerHeight;
  var height = d.offsetHeight;

   // console.log('offset = ' + offset);
   // console.log('height = ' + height);

  if ( (offset === height || offset >= height - 10) && !allImgLoaded) {
     // console.log('At the bottom');

    /* vyhod observer na reklamu hazi chybu */
	if (observer) {
		observer.disconnect();
		observer = false;
	} 
	/* loadni dalsi images kdyz doscrolluju dolu  */
    loadImages(count);
  } else {
  	return;
  }
};

function preventDefault(e) {
  e = e || window.event;
  if (e.preventDefault)
      e.preventDefault();
  e.returnValue = false;  
}

function disableScroll() {
  if (window.addEventListener) // older FF
      window.addEventListener('DOMMouseScroll', preventDefault, false);
  window.onwheel = preventDefault; // modern standard
  window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
  window.ontouchmove  = preventDefault; // mobile
}

function enableScroll() {
    if (window.removeEventListener)
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
    window.onmousewheel = document.onmousewheel = null; 
    window.onwheel = null; 
    window.ontouchmove = null;  
    document.onkeydown = null;  
}

</script>



<?php require 'includes/footer.php'; ?>

