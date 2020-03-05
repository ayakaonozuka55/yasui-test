<?php get_header(''); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo $url;
  }
?>
<?php
$cat_info = get_category( $cat );
?>
<!-- MAIN -->
  <main class="main news detail">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/news/bg_head.jpg);">
      <h1>新着情報</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/news-all/">新着情報</a></li>
        <li><?php wp_title(''); ?>一覧</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="lead lead-b">
            <h2 class="lead-b_heading lead_heading"><?php wp_title(''); ?>一覧</h2>
            <div class="text">
              <p><?php echo term_description($cat); ?></p>
            </div>
          </div>
          <article class="articleListWrap">
<?php
    $args= array(
		'post_type' => 'post',
		'cat' => $cat_info->cat_ID,
		'posts_per_page'=>'12',
		'paged' => $paged
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
            <ul class="articleList articleList-flat">
<?php while (have_posts()) : the_post(); ?>
              <li class="articleItem">
                <div class="head cf">
                  <p class="day"><?php the_time('Y.m.d'); ?></p>
                  <ul class="category cf">
<?php 
	$p_terms = get_the_terms($post->ID,'category');
	if($p_terms){
	    foreach ($p_terms as $pcate) {
	        $pterm_name = $pcate->name;
	        $pterm_slug = $pcate->slug;
	        $pterm_oya = $pcate->parent;
			echo '<li><span>'.$pterm_name.'</span></li>';
	    }
	}
?>
                  </ul>
                </div>
                <a href="<?php the_permalink() ?>">
                  <h2 class="heading">
<?php
if(mb_strlen($post->post_title, 'UTF-8')>120){
	$title= mb_substr($post->post_title, 0, 120, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?>
									</h2>
                </a>
              </li>
<?php endwhile; ?>
            </ul>
<?php if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
} ?>
<?php wp_reset_query();endif; ?>

          </article>
        </article>
				<!-- TENP -->
				<?php include('side_news.php'); ?>
      </div>
    </article>
  </main>
	<!-- TENP -->
	<?php include('maincv.php'); ?>

<?php get_footer(); ?>
