(function (global) {
  // add array index of for old browsers (IE<9)
  if (!Array.prototype.indexOf) {
    Array.prototype.indexOf = function(obj, start) {
      var i, j;
      i = start || 0;
      j = this.length;
      while (i < j) {
        if (this[i] === obj) {
          return i;
        }
        i++;
      }
      return -1;
    };
  }

  // make a global object to store stuff in
  if(!global.OpenDataCommunities) { global.OpenDataCommunities = {}; };
  var OpenDataCommunities = global.OpenDataCommunities;

  // To keep track of which embeds we have already processed
  if(!OpenDataCommunities.processedScripts) { OpenDataCommunities.processedScripts = []; };
  var processedScripts = OpenDataCommunities.processedScripts;

  if(!OpenDataCommunities.styleTags) { OpenDataCommunities.styleTags = []; };
  var styleTags = OpenDataCommunities.styleTags;

  var scriptTags = document.getElementsByTagName('script');
  var thisRequestUrl = '<?php  print $unique_id;?>';

  for(var i = 0; i < scriptTags.length; i++) {
    var scriptTag = scriptTags[i];

    // src matches the url of this request, and not processed it yet.
    if (scriptTag.id == thisRequestUrl && processedScripts.indexOf(scriptTag) < 0) {

      processedScripts.push(scriptTag);

      // add the style tag into the head (once only)
      //if(styleTags.length == 0) {
        // add a style tag to the head
        var styleTag = document.createElement("link");
        styleTag.rel = "stylesheet";
        styleTag.type = "text/css";
        styleTag.href =  "<?php print $css;?>";
        styleTag.media = "all";
        document.getElementsByTagName('head')[0].appendChild(styleTag);
        styleTags.push(styleTag);
      //}

      // Create a div
      var div = document.createElement('div');
      div.id = '<?php print $unique_id;?>';

      // add the cleanslate classs for extreme-CSS reset.
      div.className = '<?php print $unique_id;?>';

      scriptTag.parentNode.insertBefore(div, scriptTag);

      div.innerHTML = '<?php print $html;?>';

    }
  }
})(this);

<?php print $extra_js_code;?>
