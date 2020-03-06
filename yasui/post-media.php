<?php get_header(''); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo $url;
  }
?>
<?php
$taxonomy_slug = get_query_var('taxonomy'); // タクソノミースラッグを取得
$taxonomy_var = get_taxonomy($taxonomy_slug); // タクソノミーの情報を取得
$term_info = get_term_by('slug',$term,$taxonomy_var->name);
$tax_id = $term_info->term_id;
?>

  <main class="main award detail main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/about/award/bg_head.jpg);">
      <div>受賞歴・メディア情報</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/about/">会社概要と社長のコメント</a></li>
        <li><a href="<?php echo home_url(); ?>/media/">受賞歴・メディア情報</a></li>
        <li><?php single_cat_title() ?>の記事一覧</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="lead lead-b">
            <h1 class="lead-b_heading lead_heading"><?php single_cat_title() ?>の記事一覧</h1>
            <div class="text">
              <p><?php echo term_description($tax_id); ?></p>
            </div>
          </div>
          <article class="articleListWrap">
<?php
    $args= array(
		'post_type' => 'media',
    'tax_query' => array(
        array(
						'taxonomy' => $taxonomy_var->name,
            'field' => 'slug',
            'terms' => $term
        ),
    ),
		'paged' => $paged
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
            <ul class="articleList articleList-flat">
<?php while (have_posts()) : the_post(); ?>
              <li class="articleItem cf">
                <div class="imgwrap">
                  <a href="<?php the_permalink() ?>" class="cf">
                    <div class="img img-scale">
<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'index_size' );
if($thumbnail_image_url[0]){
	echo '<img src="' . $thumbnail_image_url[0] . '" class="" style="">';
}else{
	echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage220.png" class="" style="">';
}
?>
										</div>
                  </a>
                </div>
                <div class="content">
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
				if($cnt < 3){
					echo '<li><span>'.$term_name.'</span></li>';
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
if(mb_strlen($post->post_title, 'UTF-8')>100){
	$title= mb_substr($post->post_title, 0, 100, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?>
										</h2>
                  </a>
                </div>
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
				<?php include('side_award.php'); ?>
      </div>
    </article>
		<!-- TENP -->
		<?php include('tenp-excursion_bnr.php'); ?>
		<?php include('nav_about.php'); ?>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>
<?php include('latest_event.php'); ?>

<?php get_footer(''); ?>
