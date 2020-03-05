<article class="latest bg_thinpink">
  <div class="l-content-sm">
    <div class="heading-a heading-a-ex">
      <h2 class="head"><span class="line">最新の<span class="c-orange">イベント情報</span></span></h2>
    </div>
    <ul class="articleList articleList-4column">
<?php
date_default_timezone_set('Asia/Tokyo');
    $args= array(
		'post_type' => 'event',
		'posts_per_page'=>'4',
		'orderby' => 'meta_value',
		'meta_key' => '開始日',
		'order' => 'ASC',
		'meta_query' => array(
			array( 'key' => '終了日',
				'value' => date('Y/m/d'),
				'compare' => '>=',
				'type' => 'DATE'
				),
			array( 'key' => '終了日',
				'value' => '',
				'compare' => '=',
				),
				'relation'=>'OR'
			)
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php
    $days=14; //NEWをつける日数
    $today=date_i18n('U');
    $entry=get_the_time('U');
    $sa=date('U',($today - $entry))/86400;
        if( $days > $sa ){
	        echo '<li class="articleItem articleItem-bgWhite articleItem-new">';
        }else{
	        echo '<li class="articleItem articleItem-bgWhite">';
		}
?>
        <a href="<?php the_permalink() ?>">
          <div class="img img-scale">
<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if($thumbnail_image_url[0]){
	echo '<img src="' . $thumbnail_image_url[0] . '" class="" style="">';
}else{
	echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage220.png" class="" style="">';
}
?>
					</div>
          <div class="content">
            <p class="day"><?php the_field('日程'); ?></p>
            <h3 class="heading">
<?php
if(mb_strlen($post->post_title, 'UTF-8')>30){
	$title= mb_substr($post->post_title, 0, 30, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?>
						</h3>
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
        </a>
      </li>
<?php endwhile; ?>
<?php wp_reset_query();endif; ?>

    </ul>
    <div class="btn-a">
      <a href="<?php echo home_url(); ?>/event">もっと見る</a>
    </div>
  </div>
</article>
