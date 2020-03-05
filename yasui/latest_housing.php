<section class="articleListWrap bg_gray">
  <div class="l-content-sm">
    <div class="heading-a">
      <h2 class="head"><span class="line"><span class="c-orange">最新建築実例</span></span></h2>
    </div>
    <article class="articleListWrap">
      <ul class="articleList articleList-4column">
<?php
    $args= array(
		'post_type' => 'housing',
		'posts_per_page'=>'4',
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
    <div class="btn-e">
      <a href="<?php echo home_url(); ?>/housing">もっと見る</a>
    </div>
    </article>
  </div>
</section>
