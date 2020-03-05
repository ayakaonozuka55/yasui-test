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

  <main class="main event">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/staffblog/bg_head.jpg);">
      <div>見学会・イベント・セミナー情報</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/event/">見学会・イベント・セミナー情報</a></li>
        <li><?php single_cat_title() ?>の記事一覧</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="lead lead-a">
            <h1 class="lead-a_heading lead_heading"><?php single_cat_title() ?>のイベント一覧</h1>
            <div class="text">
              <p><?php echo term_description($tax_id); ?></p>
            </div>
          </div>
          <article class="articleListWrap">
<?php
date_default_timezone_set('Asia/Tokyo');
    $args= array(
		'post_type' => 'event',
		'paged' => $paged,
		'orderby' => 'meta_value',
		'meta_key' => '開始日',
		'order' => 'ASC',
    'tax_query' => array(
        array(
						'taxonomy' => $taxonomy_var->name,
            'field' => 'slug',
            'terms' => $term
        ),
    ),
		'meta_query' => array(
			array( 'key' => '終了日',
				'value' => date('Y/m/d'),
				'compare' => '>=',
				'type' => 'DATE'
				)
			)
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
            <ul class="articleList articleList-lengthwise">
<?php while (have_posts()) : the_post(); ?>
              <li class="articleItem event-accepting">
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
                  <a href="<?php the_permalink() ?>">
                  <p class="day"><?php the_field('日程'); ?></p>
                    <h2 class="heading">
<?php
if(mb_strlen($post->post_title, 'UTF-8')>30){
	$title= mb_substr($post->post_title, 0, 30, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?>
										</h2>
                    <p class="text">
<?php
$acfcontent = get_field('リード文');
if(mb_strlen($acfcontent, 'UTF-8')>30){
	$acfcontent= mb_substr($acfcontent, 0, 30, 'UTF-8');
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
				}
				$cnt++;
	    }
	}
?>

                    </ul>
                  </a>
                </div>
              </li>
<?php endwhile; ?>
            </ul>
<?php if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
} ?>

<?php else: ?>
<p>現在開催中の見学会・イベント・セミナーはございません。</p>

<?php wp_reset_query();endif; ?>

          </article>
        </article>
				<!-- TENP -->
				<?php include('side_event.php'); ?>
      </div>
    </article>
  </main>

<!-- TENP -->
<?php
if(single_cat_title("", false) == 'リフォーム・リノベーション'){
	include('cv_reform.php');
}else{
 include('maincv.php');
}
?>
<!-- <?php include('maincv.php'); ?> -->
<?php include('latest_event.php'); ?>

<?php get_footer(''); ?>
