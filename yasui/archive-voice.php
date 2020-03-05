<?php get_header(''); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo $url;
  }
?>
  <main class="main staffblog detail">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/case_voice/case/bg_head.jpg);">
      <h1>安井建設で建築したお客様の声</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/case_voice/">お家の実例・お客様の声</a></li>
        <li>お客様の声</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="archive">
            <div class="lead lead-b">
              <div class="text">
                <p>安井建設で新築注文住宅を建てたお客様からいただいた声をご紹介します。商品別やタイプ別などからもお客様の声をご覧いただけます。</p>
              </div>
            </div>
<?php
    $args= array(
		'post_type' => 'voice',
		'paged' => $paged
   );
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
                        <h2 class="heading">
<?php
if(mb_strlen($post->post_title, 'UTF-8')>35){
	$title= mb_substr($post->post_title, 0, 35, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?>
												</h2>
                        <p class="text">
<?php
$acfcontent = get_field('リード文');
if(mb_strlen($acfcontent, 'UTF-8')>27){
	$acfcontent= mb_substr($acfcontent, 0, 27, 'UTF-8');
	echo $acfcontent.'…';
}else{
	echo $acfcontent;
}
?>
												</p>
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
					<!-- TENP -->
					<?php include('choose_voice.php'); ?>
        </article>
				<!-- TENP -->
				<?php include('side_voice.php'); ?>

      </div>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>

<?php get_footer(''); ?>
