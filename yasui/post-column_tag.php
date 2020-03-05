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
$tax_name = $term_info->name;
if ($term_info->parent) {
 $parent = get_term( $term_info->parent,$taxonomy_var->name );
 $oyaname = $parent->name;
 $oyaslug = $parent->slug;
}
?>

  <main class="main staffblog detail">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/column/bg_head.jpg);">
      <div>家づくりコラム</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/column/">家づくりコラム</a></li>
<?php
	if($oyaname != ''){
    		echo '<li><a href="'.home_url().'/column_category/'. $oyaslug .'">'. $oyaname .'</a></li>';
	}
?>
        <li><?php single_cat_title() ?>の家づくりコラム</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="archive_body">
            <div class="archive_body_item">
              <div class="heading-b">
                <h1 class="head"><?php single_cat_title() ?>の家づくりコラム</h1>
              </div>
<?php
    $args= array(
        'tax_query' => array(
            array(
				'taxonomy' => $taxonomy_var->name,
                'field' => 'slug',
                'terms' => $term
            ),
        ),
		'post_type' => 'column',
		'posts_per_page'=>'12',
		'paged' => $paged
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
              <div class="archive_body_item_body">
                <article class="articleListWrap">
                  <ul class="articleList articleList-lengthwise">
<?php while (have_posts()) : the_post(); ?>

                    <li class="articleItem">
                      <a href="<?php the_permalink(); ?>">
                        <div class="img img-scale">
<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'index_size' );
if($thumbnail_image_url[0]){
	echo '<img src="' . $thumbnail_image_url[0] . '" class="column_item_img" style="">';
}else{
	echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage220.png" class="" style="">';
}
?>
												</div>
                        <div class="content">
                          <p class="day"><?php the_time('Y.m.d'); ?></p>
                          <h2 class="heading">
<?php
if(mb_strlen($post->post_title, 'UTF-8')>22){
	$title= mb_substr($post->post_title, 0, 22, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?>
</h2>
                          <p class="text">
<?php
$acfcontent = get_field('リード文');
if(mb_strlen($acfcontent, 'UTF-8')>36){
	$acfcontent= mb_substr($acfcontent, 0, 36, 'UTF-8');
	echo $acfcontent.'…';
}else{
	echo $acfcontent;
}
?>
													</p>
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
					if($cnt < 3){
						echo '<li><span>'.$term_name.'</span></li>';
					}
					$cnt++;
				}
	    }
	}
?>
		                      </ul>
                        </div>
                      </a>
                    </li>
<?php endwhile; ?>

                  </ul>
                </article>
              </div>

              <div class="archive_body_item_foot">
<?php if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
} ?>
              </div>
<?php wp_reset_query();endif; ?>

            </div>
          </div>
					<!-- TENP -->
					<?php include('choose_column.php'); ?>
        </article>
				<!-- TENP -->
				<?php include('side_column.php'); ?>
      </div>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>

<?php get_footer(''); ?>
