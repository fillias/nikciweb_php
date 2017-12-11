<?php require 'includes/header.php'; ?>
<?php 
$dirname = "obr/";
$images = glob($dirname."*.JPG");
?>



<a href="index.php">Domu</a>

<script type="text/javascript">


var images = <?php echo json_encode($images); ?>;
const ln = images.length;

let index = 0;

if (!index) loadImages(index);

function loadImages(index) {
	for (let i = index; i <= ln; i++ ) {

		if (images[i]) {
			displayImage(images[i]);
			//console.log(images[i]);
		}
		
		if ( i == ln ) {
			console.info('END');
			removeOldButton();
			return;
		}

		if (i == index + 9) {
			console.log('kuk');
			addButton(i+1);
			return;
		}
	}
}


function addButton(i){
	removeOldButton();

	const button = document.createElement('button');
	button.id = "more";
	button.textContent = '...další...';
	button.className += 'button-more ';
	button.addEventListener('click', function() {
		loadImages(i);
	});	
	document.body.appendChild(button);
}

function removeOldButton() {
	const oldBtn = document.getElementById("more");
	if (oldBtn) {
		oldBtn.parentNode.removeChild(oldBtn);
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
		scrollToTop(200);
	});	
	document.body.appendChild(button);
}

window.addEventListener('scroll', checkScroll);

function checkScroll (e) {
	console.log(e);
	if (window.scrollY > 300) {
		addZpetButton();
		window.removeEventListener('scroll', checkScroll);
	}
}

function scrollToTop(scrollDuration) {
    var scrollStep = -window.scrollY / (scrollDuration / 15),
        scrollInterval = setInterval(function(){
        if ( window.scrollY != 0 ) {
            window.scrollBy( 0, scrollStep );
        }
        else clearInterval(scrollInterval); 
    },15);
}



</script>



<?php require 'includes/footer.php'; ?>

