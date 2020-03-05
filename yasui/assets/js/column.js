var $c = jQuery.noConflict();
$c(document).ready(function() {
  $c(".tab_label").on("click",function(){
  	var $th = $c(this).index();
  	$c(".tab_label").removeClass("show");
  	$c(".tab_panel").removeClass("active");
  	$c(this).addClass("show");
  	$c(".tab_panel").eq($th).addClass("active");
  });

});
