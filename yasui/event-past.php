<?php
/*
Template Name: 過去の見学会・イベント・セミナー表示用テンプレート
*/
?>
<?php get_header(''); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo $url;
  }
?>
  <main class="main event">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/staffblog/bg_head.jpg);">
      <h1>見学会・イベント・セミナー情報</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li>見学会・イベント・セミナー情報</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="lead lead-a">
            <p>安井建設ではモデルハウス・お家の完成・構造見学会や、住宅ローンや土地選びの不安を解消するセミナーや勉強会毎月を定期的に開催しています。家づくりをお考えの方はぜひお気軽にご来場・ご相談ください。</p>
          </div>
          <article class="articleListWrap">
<?php
date_default_timezone_set('Asia/Tokyo');
    $args= array(
		'post_type' => 'event',
		'paged' => $paged,
		'orderby' => 'meta_value',
		'meta_key' => '開始日',
		'order' => 'DESC',
		'meta_query' => array(
			array( 'key' => '終了日',
				'value' => date('Y/m/d'),
				'compare' => '<',
				'type' => 'DATE'
				)
			)
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
            <ul class="articleList articleList-lengthwise">
<?php while (have_posts()) : the_post(); ?>
              <li class="articleItem event-end">
                <div class="imgwrap">
                  <a href="<?php the_permalink() ?>" class="cf">
                    <div class="img img-scale">
<?php 
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'index_size' );
if($thumbnail_image_url[0]){
	echo '<img src="' . $thumbnail_image_url[0] . '" class="" style="">';
}else{
	echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage.jpg" class="" style="">';
}
?>
										</div>
                  </a>
                </div>
                <div class="content">
                  <a href="<?php the_permalink() ?>">
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
					if($cnt < 2){
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
<?php wp_reset_query();endif; ?>

          </article>
        </article>
				<!-- TENP -->
				<?php include('side_event.php'); ?>
      </div>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>
<?php include('latest_event.php'); ?>

<?php get_footer(''); ?>
