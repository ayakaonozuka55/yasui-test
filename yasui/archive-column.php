<?php get_header(''); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo $url;
  }
$title = wp_title('',false);
$title = str_replace('家づくりコラム', 'すべて', $title);
$title .='の';
?>
  <main class="main staffblog detail">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/column/bg_head.jpg);">
      <div>家づくりコラム</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li>家づくりコラム</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="archive">
            <div class="lead lead-a">
	            <h1 class="lead-a_heading lead_heading"><?php echo $title; ?>家づくりコラム</h1>
              <p>暮らしづくりや家づくりにまつわるお役立ちコラム。ライフスタイルや予算に合わせた注文住宅のプランニングや、土地の探し方から気になるお金のことなど、新築・リフォーム/リノベーションをお考えの方に参考になる情報を発信しています。ぜひ気になるカテゴリをチェックしてみてください。</p>
            </div>
<?php
    $args= array(
		'post_type' => 'column',
		'orderby' => 'date',
		'order' => 'desc',
		'paged' => $paged
   );
	if(is_month()){
		$setYear=get_the_date('Y');
		$setMonth=get_the_date('m');
		$args['year']=$setYear;
		$args['monthnum']=$setMonth;
	}elseif(is_day()){
		$setYear=get_the_date('Y');
		$setMonth=get_the_date('m');
		$setDay=get_the_date('d');
		$args['year']=$setYear;
		$args['monthnum']=$setMonth;
		$args['day']=$setDay;
	}

  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
            <div class="archive_body">
              <article class="articleListWrap">
                <ul class="articleList articleList-lengthwise">

<?php while (have_posts()) : the_post(); ?>

                  <li class="articleItem">
                    <a href="<?php the_permalink() ?>">
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
                      <div class="content">
                        <p class="day"><?php the_time('Y.m.d'); ?></p>
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
<?php if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
} ?>
<?php wp_reset_query();endif; ?>


          </div>
        </article>
				<!-- TENP -->
				<?php include('side_column.php'); ?>
      </div>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>

<?php get_footer(''); ?>
