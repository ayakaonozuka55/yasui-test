var $u = jQuery.noConflict();
$u(document).ready(function() {
  $u(function() {
    $u('.nav_pagehead a').each(function() {
      var $href = $u(this).attr('href');
      if (location.href.match($href)) {
        $u(this).addClass('current');
      } else {
        $u(this).removeClass('current');
      }
    });
  });

});
