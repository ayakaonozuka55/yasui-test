<?php
/*
Template Name: 会社案内配下固定テンプレート
*/
?>
<?php get_header(''); ?>

  <main class="main about main_ex">
	<?php if(is_page(5704)): ?>
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/about/bg_head.jpg);">
      <h1>会社案内</h1>
    </div>

	<?php elseif(is_page(5706)): ?>
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/about/area/bg_head.jpg);">
      <h1>対応エリア</h1>
    </div>

	<?php elseif(is_page(5708)): ?>
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/about/structure/bg_head.jpg);">
      <h1>総合建設</h1>
		</div>

	<?php elseif(is_page(8683)): ?>
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/about/thought/bg_head.jpg);">
      <h1>社長の生い立ちと想い</h1>
    </div>

	<?php endif; ?>

		<?php include('nav_about_pagehead.php'); ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php remove_filter('the_content', 'wpautop'); ?>
<?php the_content(); ?>
<?php endwhile; // End the loop. Whew. ?>

		<?php include('nav_about.php'); ?>
  </main>

	<?php include('maincv.php'); ?>

<?php get_footer(); ?>
