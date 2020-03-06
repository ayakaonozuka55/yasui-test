<?php get_header(''); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo $url;
  }
$title = wp_title('',false);
$title = str_replace('お家の建築実例', 'すべて', $title);
$title .='の';
?>
  <main class="main staffblog detail">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/case_voice/case/bg_head.jpg);">
      <div>お家の建築実例</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/case_voice/">お家の実例・お客様の声</a></li>
        <li><a href="<?php echo home_url(); ?>/housing/">お家の建築実例</a></li>
       	<li><?php echo $title; ?>お家の建築実例</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="archive">
            <div class="lead lead-a">
              <h1 class="lead-a_heading lead_heading"><?php echo $title; ?>建築実例一覧</h1>
              <p class="text">二階建て・二世帯住宅・平屋・ビルトインガレージなどの暮らしや、鉄筋コンクリート（RC）・木造などの構造、シンプルモダン・ブルックリン・ナチュラル・和モダンなどのスタイル、20坪未満・30坪台・40坪以上などの広さまで、安井建設の手がけてきた家族の笑顔と幸せをつくる新築建築実例をご紹介します。</p>
            </div>
<?php
    $args= array(
		'post_type' => 'housing',
		'paged' => $paged,
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
					<?php include('choose_case.php'); ?>
        </article>
				<!-- TENP -->
				<?php include('side_case.php'); ?>

      </div>
    </article>
		<?php include('tenp-excursion_bnr.php'); ?>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>

<?php get_footer(''); ?>
