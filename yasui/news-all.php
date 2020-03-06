<?php
/*
Template Name: 新着情報全て表示用テンプレート
*/
?>
<?php get_header(''); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo $url;
  }
?>
<!-- MAIN -->
  <main class="main news detail">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/news/bg_head.jpg);">
      <h1>新着情報</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li>新着情報</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <!-- <div class="lead lead-a">
            <div class="text">
            </div>
          </div> -->
          <article class="articleListWrap">
<?php
    $args= array(
		'post_type' => 'post',
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
	$taxonomy_names = get_post_taxonomies();
	$terms = get_the_terms($post->ID,$taxonomy_names[0]);
	$cnt = 1;
	if($terms){
	    foreach ($terms as $cate) {
	      $term_name = $cate->name;
	      $term_slug = $cate->slug;
	      $term_oya = $cate->parent;
				if($term_oya != '0'){
					if($cnt < 2){
						echo '<li><span>'.$term_name.'</span></li>';
					}
				}
				$cnt++;
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
		<?php include('tenp-excursion_bnr.php'); ?>
  </main>
	<!-- TENP -->
	<?php include('maincv.php'); ?>

<?php get_footer(''); ?>
