
<script type="text/javascript">
/* vyhod tu reklamu */

 var foo = document.querySelector('body');

  var observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      // console.log('mutation.type = ' + mutation.type);
      // console.log(mutation);

      if (mutation.type = "childList" && mutation.addedNodes[0].nodeName == "DIV" && mutation.addedNodes[0].outerHTML.match('000webhost')) {
        //console.log(mutation.addedNodes[0]);
        mutation.addedNodes[0].style.cssText = "display: none !important;";
      }
    });
  });
  observer.observe(foo, { childList: true });
  
</script>

</body>

</html>