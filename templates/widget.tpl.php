<script type="text/javascript" id="<?php print $unique_id; ?>" class="<?php print $unique_id; ?>">
  (function() {
    function async_load(){
      var s = document.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      var theUrl = '<?php print $widget_url_js; ?>';
      s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + 'ref=' + encodeURIComponent(window.location.href);
      var embedder = document.getElementById('<?php print $unique_id; ?>');
      embedder.parentNode.insertBefore(s, embedder);
    }
    if (window.attachEvent)
      window.attachEvent('onload', async_load);
    else
      window.addEventListener('load', async_load, false);
  })();
</script>

