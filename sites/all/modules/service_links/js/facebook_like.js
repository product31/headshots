if (Drupal.jsEnabled) {
  $(document).ready(function(){
    $('a.service-links-facebook-like').each(function(){
      iframe_txt='<iframe src="' + $(this).attr('href') + '" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:' + Drupal.settings.ws_fl.width + 'px; height:' + Drupal.settings.ws_fl.height + 'px;"' + ' allowTransparency="true"></iframe>';
      $(this).replaceWith(iframe_txt);
    });
  });
}
