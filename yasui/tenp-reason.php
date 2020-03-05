<?php
/*
Template Name: 選ばれる理由配下固定テンプレート
*/
?>
<?php get_header(''); ?>

  <main class="main reason-master main_ex">
	<?php if(is_page(5691)): ?>
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/reason/family/bg_head.jpg);">
      <h1>家族の笑顔と絆をつくる家づくり</h1>
    </div>

	<?php elseif(is_page(5693)): ?>
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/reason/cost/bg_head.jpg);">
      <h1>生涯コストを考えた家づくり</h1>
    </div>

	<?php elseif(is_page(5695)): ?>
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/reason/region/bg_head.jpg);">
      <h1>地域とともに</h1>
    </div>

	<?php elseif(is_page(5697)): ?>
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/reason/earthquake/bg_head.jpg);">
      <h1>地震に強い家づくり</h1>
    </div>

	<?php elseif(is_page(5699)): ?>
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/reason/flow/bg_head.jpg);">
      <h1>家づくりの流れ</h1>
    </div>

	<?php elseif(is_page(5702)): ?>
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/reason/afterservice/bg_head.jpg);">
      <h1>アフターサービス</h1>
    </div>

	<?php endif; ?>

		<?php include('nav_reason_pagehead.php'); ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php remove_filter('the_content', 'wpautop'); ?> 
<?php the_content(); ?>
<?php endwhile; // End the loop. Whew. ?>

			<?php include('nav_reason.php'); ?>
    </article>
  </main>

	<?php include('maincv.php'); ?>

<?php get_footer(); ?>
