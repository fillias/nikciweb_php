
<script type="text/javascript">

/* vyhod tu reklamu */

  var foo = document.querySelector('body');

  var observer = new MutationObserver(function(mutations) {
      mutations.forEach(function(mutation) {
        // console.log('mutation.type = ' + mutation.type);
        // console.log(mutation);

        if (mutation.type = "childList" && mutation.addedNodes[0].nodeName == "DIV" && mutation.addedNodes[0].outerHTML.match('000webhost')) {
          //console.log(mutation.addedNodes[0]);
          if (mutation.addedNodes[0])  mutation.addedNodes[0].style.cssText = "display: none !important;";
        }
      }); 
  });

  observer.observe(foo, { childList: true });



/*  reseni sirky popupmenu */
const popupMenu = document.querySelector(".popup-menu");
const galleryMenuButton = document.querySelector("#menu-gallery-button");

galleryMenuButton.addEventListener('click', function() {
  popupMenu.classList.toggle ('inactive');
  popupMenu.classList.toggle ('active');
} );

popupMenu.style.width = window.getComputedStyle(galleryMenuButton, null).width;

  
</script>

</body>

</html>