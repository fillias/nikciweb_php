<?php require 'includes/header.php'; ?>
<?php 
$dirname = "obr/";
$images = glob($dirname."*.JPG");
?>



<a href="index.php">Domu</a>

<script type="text/javascript">


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
	document.body.appendChild(img);
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

   console.log('offset = ' + offset);
   console.log('height = ' + height);

  if ( (offset === height || offset >= height - 10) && !allImgLoaded) {
     console.log('At the bottom');

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


/*  button more nepouzito  

function removeOldButton() {
	const oldBtn = document.getElementById("more");
	if (oldBtn) {
		oldBtn.parentNode.removeChild(oldBtn);
	}
}


function addButton(i){
	removeOldButton();

	const button = document.createElement('button');
	button.id = "more";
	button.textContent = '...další...';
	button.className += 'button-more ';
	button.addEventListener('click', function() {
		// vyhod observer na reklamu hazi chybu 
		if (observer) {
			observer.disconnect();
			observer = false;
		} 

		loadImages(i);
	});	
	document.body.appendChild(button);
}

*/

</script>



<?php require 'includes/footer.php'; ?>

