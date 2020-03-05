var $a = jQuery.noConflict();
$a(document).ready(function() {
  // accordion
  var accordionHead = $a('.js-accordionHead');
  var accordionContent = $a('.js-accordionContent');
  accordionContent.hide();
  accordionHead.click(function() {
    $a(this).toggleClass('active');
    $a(this).next(accordionContent).slideToggle();
    accordionHead.not($a(this)).next(accordionContent).slideUp();
    accordionHead.not($a(this)).removeClass('active');
  });

  var windowWidth = $a(window).width();
  var windowSm = 1000;
  if (windowWidth <= windowSm) {
    $a('.gnav_link_arrow').click(function(){
      return false;
    })
    $a(".gnav_link_arrow").on("click", function() {
      $a(this).next(".gnav_sub").slideToggle();
      $a(this).toggleClass('active');
      if ($a(this).hasClass('active')) {

      } else {
        $a(this).removeClass('active');
      }
    });
  } else {
    $a('.gnav_item').hover(function() {
      $a(this).find('.gnav_sub').stop(true).fadeIn(500);
      $a(this).addClass('hover');
    }, function() {
      $a(this).find('.gnav_sub').fadeOut(500);
      $a(this).removeClass('hover');
    });
    var $win = $a(window),
      $main = $a('main'),
      $nav = $a('#gnav'),
      navHeight = $nav.outerHeight(),
      navPos = $nav.offset().top,
      fixedClass = 'is-fixed';

    $win.on('load scroll', function() {
      var value = $a(this).scrollTop();
      if (value > navPos) {
        $nav.addClass(fixedClass);
      } else {
        $nav.removeClass(fixedClass);
      }
    });
  };

  // // hamburger
  var hamburger = $a('#js-hamburger');
  var nav = $a('#gnav');
  hamburger.click(function() {
    $a(this).toggleClass('active');
    if ($a(this).hasClass('active')) {} else {
      $a(this).removeClass('active');
    }
    if (nav.css('display') == 'block') {
      nav.slideUp();
      var speed = 500;
      var href = $a(this).attr("href");
      var target = $a(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top;
      $a("html, body").animate({
        scrollTop: position
      }, speed, "swing");
      return false;
    } else {
      nav.slideDown();
    }
  });

  // // pageTop
  var topBtn = $a('#js-pageTop');
  topBtn.hide();
  $a(window).scroll(function () {
    if ($a(this).scrollTop() > 200) {
      topBtn.fadeIn();
    } else {
      topBtn.fadeOut();
    }
  });
  topBtn.click(function () {
    $a('body,html').animate({
      scrollTop: 0
    }, 1000);
    return false;
  });

  //footerCv
  var footerCv = $a('#footerCv');
  footerCv.hide();
  $a(window).scroll(function () {
    if ($a(this).scrollTop() > 200) {
      footerCv.fadeIn();
    } else {
      footerCv.fadeOut();
    }
  });

  var windowWidth = $a(window).width();
  var windowSm = 1000;
  if (windowWidth <= windowSm) {
    var headerHight = 70;
    $a('a[href^="#"]').click(function() {
      var speed = 500;
      var href = $a(this).attr("href");
      var target = $a(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top - headerHight;
      $a("html, body").animate({
        scrollTop: position
      }, speed, "swing");
      return false;
    });
  } else {
    var headerHight = 80;
    $a('a[href^="#"]').click(function() {
      var speed = 500;
      var href = $a(this).attr("href");
      var target = $a(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top - headerHight;
      $a("html, body").animate({
        scrollTop: position
      }, speed, "swing");
      return false;
    });
  };



// });

});
