<?php get_header(); ?>
<!-- sub-container -->

  <main class="main error">
    <div class="main_head" style="background-image: url(/wp/wp-content/themes/yasui/assets/images/404/bg_head.jpg);">
      <h1>404 not found</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="/">TOP</a></li>
        <li>ページが見つかりませんでした。</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <div class="error_head">
          <h2 class="error_heading">お探しのページが<br class="visible-xs">見つかりませんでした。</h2>
        </div>
        <p class="error_text">大変申し訳ございませんが、<br class="visible-xs">お探しのページが見つかりませんでした。</p>
        <div class="error_btn"><a href="/" class="btn-d"><span>TOPへ戻る</span></a></div>
      </div>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>


<!-- sub-container end -->
<?php get_footer(); ?>
