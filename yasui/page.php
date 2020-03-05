<?php get_header(); ?>
<!-- sub-container -->

<?php while ( have_posts() ) : the_post(); ?>
<?php remove_filter('the_content', 'wpautop'); ?> 
<?php the_content(); ?>
<?php endwhile; // End the loop. Whew. ?>


	<?php include('maincv.php'); ?>

<!-- sub-container end -->
<?php get_footer(); ?>
