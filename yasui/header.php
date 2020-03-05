<?php global $blog_id; ?><!DOCTYPE html>
<html lang="ja">

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-12899168-38"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-12899168-38');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M9HWV2Z');</script>
<!-- End Google Tag Manager -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- TDK -->
<?php include('tdk.php'); ?>
<?php wp_head(); ?>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js"></script>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/modaal/modaal.min.css" />
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/modaal/modaal.min.js"></script>
  <script>
		var $g = jQuery.noConflict();
    $g(function() {
      $g('.galley_trigger').modaal({
        type: 'image'
      });
    });
  </script>
	<?php if ( is_front_page() && is_home() ) : ?>
	<!--TOPのみ-->
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.css" media="screen" />
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick-theme.css" media="screen" />
	  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.min.js"></script>
	  <script type="text/javascript">
			var $t = jQuery.noConflict();
	    $t(function() {
	      $t('.mv-item').slick({
	        infinite: true,
	        dots: true,
	        slidesToShow: 1,
	        centerMode: true,
	        centerPadding: '1000px',
	        autoplay: true,
	        autoplaySpeed: 4000,
	        speed: 1000,
	        prevArrow: '<img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_icon_arrow_right.png" class="slide-arrow prev-arrow">',
	        nextArrow: '<img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_icon_arrow_left.png" class="slide-arrow next-arrow">',
	        responsive: [{
	          breakpoint: 1100,
	          settings: {
	            // centerPadding: '50px',
	          }
	        },{
	          breakpoint: 1000,
	          settings: {
	            centerMode: false,
	          }
	        }]
	      });
	    });
	  </script>
	  <script type="text/javascript">
	  $t(function () {
	  var windowWidth = $t(window).width();
	  var htmlStr = $t('#pageplugin').html();
	  var timer = null;
	  $t(window).on('resize',function() {
	      var resizedWidth = $t(window).width();
	      if(windowWidth != resizedWidth && resizedWidth < 500) {
	          clearTimeout(timer);
	          timer = setTimeout(function() {
	              $t('#pageplugin').html(htmlStr);
	              window.FB.XFBML.parse();
	              var windowWidth = $(window).width();
	          }, 500);
	      }
	  });
		});
	  </script>

	<?php elseif(is_page(174) || is_author()): ?>
		<!-- STAFF一覧 -->
    <!--ここから-->
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick-theme.css" media="screen" />
		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.min.js"></script>
		<script type="text/javascript">
			var $t = jQuery.noConflict();
		  $t(function() {
		    $t('#staff_slider').slick({
		      infinite: true,
		      dots: true,
		      slidesToShow: 5,
		      centerMode: false,
		      autoplay: false,
		      autoplaySpeed: 4000,
		      speed: 1000,
		      slidesToScroll: 5,
		      prevArrow: '<img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_icon_arrow_right.png" class="slide-arrow prev-arrow">',
		      nextArrow: '<img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_icon_arrow_left.png" class="slide-arrow next-arrow">',
		      responsive: [{
		        breakpoint: 1000,
		        settings: {
		          slidesToShow: 4,
		          slidesToScroll: 4,
		        }
		      },{
		        breakpoint: 750,
		        settings: {
		          slidesToShow: 2,
		          slidesToScroll: 2,
		        }
		      }]
		    });
		  });
		</script>
		<!--ここまで-->

	<?php elseif(get_post_type() == 'column'): ?>
		<!-- COLUMN一覧 -->
	  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/column.js"></script>
		<?php if ( is_single() ) : ?>
			<!-- 詳細 -->
		  <!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>-->
		  <script>
				var $j = jQuery.noConflict();
		    $j(function() {
		      var $Contents = $j(".table-of-contents")
		      $j($Contents).before('<div style="text-align: center; background: #f2f2f2; padding: 15px;">目次<span class="show-area" style="color: #008ede;">[非表示]</span></div>');
		      $j(".show-area").click(function() {
		        var $this = $j(this);
		        if ($Contents.css('display') == 'none') {
		          $Contents.slideDown(400),
		            $this.text("[非表示]");
		        } else {
		          $Contents.slideUp(400),
		            $this.text("[表示]")
		        };
		      });
		    });
		  </script>
		<?php endif; ?>

	<?php elseif(get_post_type() == 'showroom'): ?>
		<?php if ( is_single() ) : ?>
			<!-- 詳細 -->
      <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.css" media="screen" />
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick-theme.css" media="screen" />
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.min.js"></script>
			<script type="text/javascript">
				var $t = jQuery.noConflict();
			  $t(function() {
			    $t('#modelhouse_slider').slick({
			      infinite: true,
			      dots: false,
			      slidesToShow: 3,
			      centerMode: true,
			      centerPadding: '10%',
			      autoplay: false,
			      autoplaySpeed: 4000,
			      speed: 1000,
			      prevArrow: '<img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_icon_arrow_right.png" class="slide-arrow prev-arrow">',
			      nextArrow: '<img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/mv_icon_arrow_left.png" class="slide-arrow next-arrow">',
			      responsive: [{
			        breakpoint: 1600,
			        settings: {
			          slidesToShow: 3,
			          centerPadding: '5%',
			        }
			      },{
			        breakpoint: 1000,
			        settings: {
			          // centerMode: false,
			            slidesToShow: 3,
			            centerPadding: '5%',
			        }
			      },{
			        breakpoint: 750,
			        settings: {
			          slidesToShow: 1,
			          centerPadding: '5%',
			        }
			      }]
			    });
			  });
			</script>
		  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
		  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
		  <link type="text/css" rel="stylesheet"  href="https://code.jquery.com/ui/1.10.3/themes/humanity/jquery-ui.min.css" />
		  <script>
		  $t(function() {
		      $t('.input_date').datepicker({
		        numberOfMonths: 1,
		        gotoCurrent: true,
		        minDate: '0y',
		        maxDate: '+2M',
		      });
		        $t.datepicker.regional['ja'] = {
		          dateFormat: 'yy/mm/dd(D)'};
		      $t.datepicker.setDefaults($t.datepicker.regional['ja']);
		  });
		  </script>
			<script type="text/javascript">
			function checkSubmit() {
				var mail01 = document.getElementById('mailadrr');
				var mail02 = document.getElementById('mailaddr_chk');
				if(mail01.value != mail02.value){
					alert('確認用メールアドレスが一致しません');
					return false;
				}else{
					return confirm("送信しても良いですか？");
				}
			}
			</script>

		<?php else:?>
			<!-- showroom一覧 -->
		  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.css" />
		  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick-theme.css" media="screen" />
		<?php endif; ?>

	<?php elseif(is_page(5790)): ?>
		<!-- ショールーム・モデルハウス THANKS -->

	<?php elseif(get_post_type() == 'event'): ?>
		<!-- イベント -->
		<?php if ( is_single() ) : ?>
			<!-- 詳細 -->
		  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/js/modaal/modaal.min.css" />
		  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/modaal/modaal.min.js"></script>
		  <script>
				var $t = jQuery.noConflict();
		    $t(function() {
		      $t('.galley_trigger').modaal({
		        type: 'image'
		      });
		    });
		  </script>
		  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
		  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
		  <link type="text/css" rel="stylesheet"  href="https://code.jquery.com/ui/1.10.3/themes/humanity/jquery-ui.min.css" />
		  <script>
		  $t(function() {
		      $t('.input_date').datepicker({
		        numberOfMonths: 1,
		        gotoCurrent: true,
		        minDate: '0y',
		        maxDate: '+2M',
		      });
		        $t.datepicker.regional['ja'] = {
		          dateFormat: 'yy/mm/dd(D)'};
		      $t.datepicker.setDefaults($t.datepicker.regional['ja']);
		  });
		  </script>
			<script type="text/javascript">
			function checkSubmit() {
				var mail01 = document.getElementById('mailadrr');
				var mail02 = document.getElementById('mailaddr_chk');
				if(mail01.value != mail02.value){
					alert('確認用メールアドレスが一致しません');
					return false;
				}else{
					return confirm("送信しても良いですか？");
				}
			}
			</script>

		<?php endif;?>

	<?php elseif(is_page(5784)): ?>
		<!-- イベント THANKS -->

	<?php elseif(is_page(5379)): ?>
		<!-- 資料請求ダウンロード -->
    <script src="//www.google.com/recaptcha/api.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript">
		function checkSubmit() {

			let str = "";
			const color2 = document.getElementsByName("f_item_radio7");

			for (let i = 0; i < color2.length; i++){
				if(color2[i].checked){
					str = color2[i].value;
					break;
				}
			}

			if ( str === "" ) {
							alert('「プライバシーポリシーに同意」にチェックしてください');
							return false;
			} else if(str === '同意しない') {
							alert('プライバシーポリシー「同意する」にチェックしてください');
							return false;
			}

			var mail01 = document.getElementById('mailadrr');
			var mail02 = document.getElementById('mailaddr_chk');
			if(mail01.value != mail02.value){
				alert('確認用メールアドレスが一致しません');
				return false;
			}else{
				return confirm("送信しても良いですか？");
			}
		}
		function onSubmit(token) {
		  document.getElementById("reqdl").submit();
		}
		</script>

	<?php elseif(is_page(5780)): ?>
		<!-- 資料請求ダウンロード THANKS -->

	<?php elseif(is_page(5689)): ?>
		<!-- 選ばれる理由 -->

	<?php elseif((is_page(5691)) || (is_page(5693)) || (is_page(5695)) || (is_page(5697)) || (is_page(5699)) || (is_page(5702))): ?>
		<!-- 選ばれる理由配下 -->
	  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/current.js"></script>

	<?php elseif((is_page(5704)) || (is_page(5706)) || (is_page(5708)) || (is_page(8683))): ?>
		<!-- 会社案内とその配下 -->
		<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
	  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/current.js"></script>

	<?php elseif(is_page(5424)): ?>
		<!-- 尾張建築職人匠の会 -->
	  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/current.js"></script>

	<?php elseif(is_page(5774)): ?>
		<!-- お問い合わせ -->
		<script type="text/javascript">
    function checkSubmit() {
			var mail01 = document.getElementById('mailadrr');
			var mail02 = document.getElementById('mailaddr_chk');
			if(!document . Form1 . f_item_name_last . value . match ( /[^0-9a-zA-Z_]+/ ) ){
				alert('名前は全角で入力してください');
				return false;
			}else if(!document . Form1 . f_item_name_first . value . match ( /[^0-9a-zA-Z_]+/ )){
				alert('名前は全角で入力してください');
        return false;
			}else if(mail01.value != mail02.value){
				alert('確認用メールアドレスが一致しません');
        return false;
			}else{
				return confirm("送信しても良いですか？");
			}
		}
		</script>
	<?php elseif(is_page(6353)): ?>
		<!-- お問い合わせテスト -->
    <meta name=”robots” content=”noindex”>
		<script type="text/javascript">
		function checkSubmit() {
			var mail01 = document.getElementById('mailadrr');
			var mail02 = document.getElementById('mailaddr_chk');
			if(!document . Form1 . f_item_name_last . value . match ( /[^0-9a-zA-Z_]+/ ) ){
				alert('名前は全角で入力してください');
				return false;
			}else if(!document . Form1 . f_item_name_first . value . match ( /[^0-9a-zA-Z_]+/ )){
				alert('名前は全角で入力してください');
        return false;
			}else if(mail01.value != mail02.value){
				alert('確認用メールアドレスが一致しません');
        return false;
			}else{
				return confirm("送信しても良いですか？");
			}
		}

		</script>

	<?php elseif(is_page(5687)): ?>
		<!-- デザイン注文住宅 ATELIER CO LABO style-アトリエコラボスタイル- -->
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.css" media="screen" />
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick-theme.css" media="screen" />
	  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.min.js"></script>
	  <script type="text/javascript">
			var $t = jQuery.noConflict();
	    $t(function() {
	      $t('.making_gallery_unordered').on('init', function(event, slick) {
	        $t(this).append('<div class="slick-counter"><span class="current"></span> / <span class="total"></span></div>');
	        $t('.current').text(slick.currentSlide + 1);
	        $t('.total').text(slick.slideCount);
	      })
	      .slick({
	        infinite: true,
	        dots: false,
	        slidesToShow: 1,
	        centerMode: true,
	        centerPadding: '0',
	        autoplay: false,
	        autoplaySpeed: 4000,
	        speed: 1000,
	        prevArrow: '<div class="making_gallery_arrow making_gallery_prev"></div>',
	        nextArrow: '<div class="making_gallery_arrow making_gallery_next"></div>',
	        responsive: [{
	          breakpoint: 1100,
	          settings: {
	          }
	        },{
	          breakpoint: 1000,
	          settings: {
	            centerMode: false,
	          }
	        }]
	      })
	      .on('beforeChange', function(event, slick, currentSlide, nextSlide) {
	        $t('.current').text(nextSlide + 1);
	      });
	    });
	  </script>

	<?php elseif(is_page(5799)): ?>
		<!-- ブルックリンスタイル BETON-ベトン- -->
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.css" media="screen" />
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick-theme.css" media="screen" />
	  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.min.js"></script>
	  <script type="text/javascript">
			var $t = jQuery.noConflict();
	    $t(function() {
	      $t('.making_gallery_unordered').on('init', function(event, slick) {
	        $t(this).append('<div class="slick-counter"><span class="current"></span> / <span class="total"></span></div>');
	        $t('.current').text(slick.currentSlide + 1);
	        $t('.total').text(slick.slideCount);
	      })
	      .slick({
	        infinite: true,
	        dots: false,
	        slidesToShow: 1,
	        centerMode: true,
	        centerPadding: '0',
	        autoplay: false,
	        autoplaySpeed: 4000,
	        speed: 1000,
	        prevArrow: '<div class="making_gallery_arrow making_gallery_prev"></div>',
	        nextArrow: '<div class="making_gallery_arrow making_gallery_next"></div>',
	        responsive: [{
	          breakpoint: 1100,
	          settings: {
	            // centerPadding: '50px',
	          }
	        },{
	          breakpoint: 1000,
	          settings: {
	            centerMode: false,
	          }
	        }]
	      })
	      .on('beforeChange', function(event, slick, currentSlide, nextSlide) {
	        $t('.current').text(nextSlide + 1);
	      });
	    });
	  </script>

	<?php elseif(is_page(5814)): ?>
		<!-- シンプルモダンスタイル EDGE-エッジ- -->
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.css" media="screen" />
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick-theme.css" media="screen" />
	  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.min.js"></script>
	  <script type="text/javascript">
			var $t = jQuery.noConflict();
	    $t(function() {
	      $t('.making_gallery_unordered').on('init', function(event, slick) {
	        $t(this).append('<div class="slick-counter"><span class="current"></span> / <span class="total"></span></div>');
	        $t('.current').text(slick.currentSlide + 1);
	        $t('.total').text(slick.slideCount);
	      })
	      .slick({
	        infinite: true,
	        dots: false,
	        slidesToShow: 1,
	        centerMode: true,
	        centerPadding: '0',
	        autoplay: false,
	        autoplaySpeed: 4000,
	        speed: 1000,
	        prevArrow: '<div class="making_gallery_arrow making_gallery_prev"></div>',
	        nextArrow: '<div class="making_gallery_arrow making_gallery_next"></div>',
	        responsive: [{
	          breakpoint: 1100,
	          settings: {
	            // centerPadding: '50px',
	          }
	        },{
	          breakpoint: 1000,
	          settings: {
	            centerMode: false,
	          }
	        }]
	      })
	      .on('beforeChange', function(event, slick, currentSlide, nextSlide) {
	        $t('.current').text(nextSlide + 1);
	      });
	    });
	  </script>

	<?php elseif(is_page(5817)): ?>
		<!-- ナチュラルスタイル NATURE-ナチュレ- -->
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.css" media="screen" />
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick-theme.css" media="screen" />
	  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.min.js"></script>
	  <script type="text/javascript">
			var $t = jQuery.noConflict();
	    $t(function() {
	      $t('.making_gallery_unordered').on('init', function(event, slick) {
	        $t(this).append('<div class="slick-counter"><span class="current"></span> / <span class="total"></span></div>');
	        $t('.current').text(slick.currentSlide + 1);
	        $t('.total').text(slick.slideCount);
	      })
	      .slick({
	        infinite: true,
	        dots: false,
	        slidesToShow: 1,
	        centerMode: true,
	        centerPadding: '0',
	        autoplay: false,
	        autoplaySpeed: 4000,
	        speed: 1000,
	        prevArrow: '<div class="making_gallery_arrow making_gallery_prev"></div>',
	        nextArrow: '<div class="making_gallery_arrow making_gallery_next"></div>',
	        responsive: [{
	          breakpoint: 1100,
	          settings: {
	            // centerPadding: '50px',
	          }
	        },{
	          breakpoint: 1000,
	          settings: {
	            centerMode: false,
	          }
	        }]
	      })
	      .on('beforeChange', function(event, slick, currentSlide, nextSlide) {
	        $t('.current').text(nextSlide + 1);
	      });
	    });
	  </script>

	<?php elseif(is_page(5824)): ?>
		<!-- ナチュラルレトロスタイル RUSTIC-ラスティック- -->
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.css" media="screen" />
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick-theme.css" media="screen" />
	  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.min.js"></script>
	  <script type="text/javascript">
			var $t = jQuery.noConflict();
	    $t(function() {
	      $t('.making_gallery_unordered').on('init', function(event, slick) {
	        $t(this).append('<div class="slick-counter"><span class="current"></span> / <span class="total"></span></div>');
	        $t('.current').text(slick.currentSlide + 1);
	        $t('.total').text(slick.slideCount);
	      })
	      .slick({
	        infinite: true,
	        dots: false,
	        slidesToShow: 1,
	        centerMode: true,
	        centerPadding: '0',
	        autoplay: false,
	        autoplaySpeed: 4000,
	        speed: 1000,
	        prevArrow: '<div class="making_gallery_arrow making_gallery_prev"></div>',
	        nextArrow: '<div class="making_gallery_arrow making_gallery_next"></div>',
	        responsive: [{
	          breakpoint: 1100,
	          settings: {
	            // centerPadding: '50px',
	          }
	        },{
	          breakpoint: 1000,
	          settings: {
	            centerMode: false,
	          }
	        }]
	      })
	      .on('beforeChange', function(event, slick, currentSlide, nextSlide) {
	        $t('.current').text(nextSlide + 1);
	      });
	    });
	  </script>

	<?php elseif(is_page(5832)): ?>
		<!-- 注文住宅 BAY style-ベイスタイル- -->
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.css" media="screen" />
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick-theme.css" media="screen" />
	  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.min.js"></script>
	  <script type="text/javascript">
			var $t = jQuery.noConflict();
	    $t(function() {
	      $t('.making_gallery_unordered').on('init', function(event, slick) {
	        $t(this).append('<div class="slick-counter"><span class="current"></span> / <span class="total"></span></div>');
	        $t('.current').text(slick.currentSlide + 1);
	        $t('.total').text(slick.slideCount);
	      })
	      .slick({
	        infinite: true,
	        dots: false,
	        slidesToShow: 1,
	        centerMode: true,
	        centerPadding: '0',
	        autoplay: false,
	        autoplaySpeed: 4000,
	        speed: 1000,
	        prevArrow: '<div class="making_gallery_arrow making_gallery_prev"></div>',
	        nextArrow: '<div class="making_gallery_arrow making_gallery_next"></div>',
	        responsive: [{
	          breakpoint: 1100,
	          settings: {
	          }
	        },{
	          breakpoint: 1000,
	          settings: {
	            centerMode: false,
	          }
	        }]
	      })
	      .on('beforeChange', function(event, slick, currentSlide, nextSlide) {
	        $t('.current').text(nextSlide + 1);
	      });
	    });
	  </script>

	<?php elseif(is_page(5835)): ?>
		<!-- 注文住宅 BAY style-ベイスタイル- -->
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.css" media="screen" />
	  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick-theme.css" media="screen" />
	  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.min.js"></script>
	  <script type="text/javascript">
			var $t = jQuery.noConflict();
	    $t(function() {
	      $t('.making_gallery_unordered').on('init', function(event, slick) {
	        $t(this).append('<div class="slick-counter"><span class="current"></span> / <span class="total"></span></div>');
	        $t('.current').text(slick.currentSlide + 1);
	        $t('.total').text(slick.slideCount);
	      })
	      .slick({
	        infinite: true,
	        dots: false,
	        slidesToShow: 1,
	        centerMode: true,
	        centerPadding: '0',
	        autoplay: false,
	        autoplaySpeed: 4000,
	        speed: 1000,
	        prevArrow: '<div class="making_gallery_arrow making_gallery_prev"></div>',
	        nextArrow: '<div class="making_gallery_arrow making_gallery_next"></div>',
	        responsive: [{
	          breakpoint: 1100,
	          settings: {
	            // centerPadding: '50px',
	          }
	        },{
	          breakpoint: 1000,
	          settings: {
	            centerMode: false,
	          }
	        }]
	      })
	      .on('beforeChange', function(event, slick, currentSlide, nextSlide) {
	        $t('.current').text(nextSlide + 1);
	      });
	    });
	  </script>



	<?php endif; ?>

</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9HWV2Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php if ( is_front_page() && is_home() ) : ?>
	<!--TOPのみ-->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.2"></script>
  <div class="top_h1"><h1>愛知県江南市、一宮、扶桑で新築一戸建て・工務店をお探しの方は当社にお任せください。愛知県尾張の家づくりは安井建設へ</h1></div>

<?php elseif( (get_post_type() == 'housing') || (get_post_type() == 'voice') || (get_post_type() == 'column') ): ?>
	<!-- お家の建築実例／お客様の声／コラム -->
  <div id="fb-root"></div>
  <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.1&appId=382567865556218&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

<?php endif; ?>

	<!-- header -->
<header class="header">
  <div class="inner">
    <ul class="head">
      <li><a href="<?php echo home_url(); ?>/request/">資料請求</a></li>
      <li><a href="<?php echo home_url(); ?>/staffblog-all/">スタッフブログ</a></li>
      <li><a href="<?php echo home_url(); ?>/column/">家づくりコラム</a></li>
      <li><a href="http://recruit-yasui-shinchiku.com/" target="_blank">採用情報</a></li>
      <li><a href="<?php echo home_url(); ?>/showroom/">モデルハウス</a></li>
    </ul>
    <div class="foot">
      <div class="logo"><a href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/logo.png" alt="安井建設株式会社"></a></div>
      <div class="tel"><a href="tel:0120543536" onclick="gtag('event','tel_push', {'event_category': 'button', 'event_label': 'header_tel'});">0120-54-3536</a></div>
    </div>
  </div>
  <div class="hamburger" id="js-hamburger">
    <span></span>
    <span></span>
    <span></span>
  </div>
</header>
<nav class="gnav" id="gnav">
  <div class="inner">
    <ul class="left">
      <li class="gnav_item">
        <a href="<?php echo home_url(); ?>/making/" class="gnav_link gnav_link_arrow"><span>安井の家づくり</span></a>
        <div class="gnav_sub">
          <ul class="gnav_sub_unorderded">
            <li class="gnav_sub_item gnav_sub_item_top"><a href="<?php echo home_url(); ?>/making/"><span>安井の家づくりトップ</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/making/atelier_co_labo/"><span>デザイン注文住宅<br class="visible-md">アトリエコラボスタイル</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/making/rasia/"><span>デザイン企画住宅<br class="visible-md">ラシアスタイル</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/making/bay/"><span>注文住宅<br class="visible-md">ベイスタイル</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/making/fitty/"><span>企画住宅<br class="visible-md">フィッティースタイル</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/making/reform/"><span>リフォーム・<br class="visible-md">リノベーション</span></a></li>
          </ul>
        </div>
      </li>
      <li class="gnav_item">
        <a href="<?php echo home_url(); ?>/reason/" class="gnav_link gnav_link_arrow"><span>選ばれる理由</span></a>
        <div class="gnav_sub">
          <ul class="gnav_sub_unorderded">
            <li class="gnav_sub_item gnav_sub_item_top"><a href="<?php echo home_url(); ?>/reason/"><span>選ばれる理由トップ</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/reason/family"><span>家族の笑顔と絆を<br class="visible-md">つくる家づくり</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/reason/cost"><span>生涯コストを考えた<br class="visible-md">家づくり</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/reason_master"><span>尾張建築<br class="visible-md">職人匠の会</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/reason/region"><span>地域と<br class="visible-md">ともに</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/reason/earthquake"><span>地震に強い<br class="visible-md">家づくり</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/reason/flow"><span>家づくりの<br class="visible-md">流れ</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/reason/afterservice"><span>アフター<br class="visible-md">サービス</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/faq/"><span>よくあるご質問<br class="visible-md">（Q&A）</span></a></li>
          </ul>
        </div>
      </li>
      <li class="gnav_item">
        <a href="<?php echo home_url(); ?>/case_voice/" class="gnav_link gnav_link_arrow"><span>実例・お客様の声</span></a>
        <div class="gnav_sub">
          <ul class="gnav_sub_unorderded">
            <li class="gnav_sub_item gnav_sub_item_top"><a href="<?php echo home_url(); ?>/case_voice/"><span>実例・お客様の声トップ</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/housing/"><span>お家の建築実例</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/voice/"><span>お客様の声</span></a></li>
          </ul>
        </div>
      </li>
      <li class="gnav_item">
        <a href="<?php echo home_url(); ?>/making/reform" class="gnav_link"><span>リフォーム・<br class="visible-ex">リノベーション</span></a>
      </li>
      <li class="gnav_item">
        <a href="<?php echo home_url(); ?>/event/" class="gnav_link"><span>見学会・イベント</span></a>
      </li>
      <li class="gnav_item">
        <a href="<?php echo home_url(); ?>/about/" class="gnav_link gnav_link_arrow"><span>会社案内</span></a>
        <div class="gnav_sub">
          <ul class="gnav_sub_unorderded">
            <li class="gnav_sub_item gnav_sub_item_top"><a href="<?php echo home_url(); ?>/about/"><span>会社案内トップ</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/media"><span>受賞歴・メディア情報</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/about/area"><span>対応エリア</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/staff-auther-all"><span>スタッフ紹介</span></a></li>
						<li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/about/structure"><span>総合建設</span></a></li>
            <li class="gnav_sub_item"><a href="<?php echo home_url(); ?>/about/thought"><span>社長の生い立ちと想い</span></a></li>
          </ul>
        </div>
      </li>
    </ul>
    <ul class="right">
      <li class="gnav_estate"><a href="<?php echo home_url(); ?>/estate/"><span>土地探しから<br class="visible-md">の家づくり</span></a></li>
      <li class="gnav_reservation"><a href="<?php echo home_url(); ?>/showroom/"><span>来場予約</span></a></li>
    </ul>
    <div class="gnav_sp">
      <ul class="head">
        <li><a href="<?php echo home_url(); ?>/request/">資料請求</a></li>
        <li><a href="<?php echo home_url(); ?>/staffblog-all/">スタッフブログ</a></li>
        <li><a href="<?php echo home_url(); ?>/column/">家づくりコラム</a></li>
        <li><a href="http://recruit-yasui-shinchiku.com/" target="_blank">採用情報</a></li>
        <li><a href="<?php echo home_url(); ?>/showroom/">モデルハウス</a></li>
      </ul>
      <div class="foot">
        <p class="gnav_lead">お電話でのご予約・お問い合わせはこちら</p>
        <a href="tel:0120543536" class="tel" onclick="gtag('event','tel_push', {'event_category': 'button', 'event_label': 'header_tel'});">Tel.0120-54-3536</a>
        <a href="<?php echo home_url(); ?>/showroom/" class="gnav_reservation">来場予約はこちら</a>
        <p class="address">愛知県江南市赤童子町南山98番地</p>
      </div>
    </div>
  </div>
</nav>
