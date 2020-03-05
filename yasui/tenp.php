<?php
/*
Template Name: フッター上最新イベント固定テンプレート
*/
?>
<?php get_header(''); ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php remove_filter('the_content', 'wpautop'); ?> 
<?php the_content(); ?>
<?php endwhile; // End the loop. Whew. ?>


	<?php include('maincv.php'); ?>
	<?php include('latest_event.php'); ?>

<?php get_footer(); ?>
