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
$tax_slug = $term_info->slug;
if ($term_info->parent) {
 $parent = get_term( $term_info->parent,$taxonomy_var->name );
 $oyaname = $parent->name;
 $oyaslug = $parent->slug;
}
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
<?php
	if($oyaname != ''){
    		echo '<li><a href="'.home_url().'/housing_category/'. $oyaslug .'">'. $oyaname .'</a></li>';
	}
?>
        <li><?php single_cat_title() ?></li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="archive">
            <div class="lead lead-a">
              <h1 class="lead-a_heading lead_heading"><?php single_cat_title() ?>の建築実例一覧</h1>
              <div class="text">
<?php if($oyaname == '') :?>
                <p><?php echo term_description($tax_id); ?></p>
<?php elseif($oyaslug == 'photo-age') :?>
                <p>
									安井建設で建てたかっこよくておしゃれな家や、和モダン・シンプルモダンテイストなど、住まう人の幸せな暮らしを実現する本格デザイン木造住宅・RCコンクリート住宅、ローコスト規格住宅を<?php single_cat_title() ?>で建てた建築実例フォトギャラリーをご紹介。二階建てや平屋・二世帯住宅、三階建てやビルトインガレージのある家など、かわいい北欧風やブルックリンスタイル、和風やナチュラルテイストまで、豊富な<?php single_cat_title() ?>で建てたデザイン建築実例フォトギャラリーをご覧ください。
								</p>
<?php elseif($oyaslug == 'photo-space') :?>
                <p>
									安井建設で建てたかっこよくておしゃれな家や、和モダン・シンプルモダンテイストなど、住まう人の幸せな暮らしを実現する本格デザイン木造住宅・RCコンクリート住宅、ローコスト規格住宅の広さ<?php single_cat_title() ?>で建てた建築実例フォトギャラリーをご紹介。二階建てや平屋・二世帯住宅、三階建てやビルトインガレージのある家など、かわいい北欧風やブルックリンスタイル、和風やナチュラルテイストまで、豊富な広さ<?php single_cat_title() ?>で建てたデザイン建築実例フォトギャラリーをご覧ください。
								</p>
<?php elseif($oyaslug == 'photo-price') :?>
                <p>
									安井建設で建てたかっこよくておしゃれな家や、和モダン・シンプルモダンテイストなど、住まう人の幸せな暮らしを実現する本格デザイン木造住宅・RCコンクリート住宅、ローコスト規格住宅の予算<?php single_cat_title() ?>で建てた建築実例フォトギャラリーをご紹介。二階建てや平屋・二世帯住宅、三階建てやビルトインガレージのある家など、かわいい北欧風やブルックリンスタイル、和風やナチュラルテイストまで、豊富な予算<?php single_cat_title() ?>で建てたデザイン建築実例フォトギャラリーをご覧ください。
								</p>
<?php elseif($oyaslug == 'photo-area') :?>
                <p>
									安井建設で建てたかっこよくておしゃれな家や、和モダン・シンプルモダンテイストなど、住まう人の幸せな暮らしを実現する本格デザイン木造住宅・RCコンクリート住宅、ローコスト規格住宅の$地名$で建てた建築実例フォトギャラリーをご紹介。二階建てや平屋・二世帯住宅、三階建てやビルトインガレージのある家など、かわいい北欧風やブルックリンスタイル、和風やナチュラルテイストまで、豊富な<?php single_cat_title() ?>のデザイン建築実例フォトギャラリーをご覧ください。
								</p>
<?php else:?>
                <p><?php echo term_description($tax_id); ?></p>
<?php endif;?>
              </div>
            </div>
            <div class="archive_body">
              <div class="archive_body_item">
<?php
    $args= array(
        'tax_query' => array(
            array(
				'taxonomy' => $taxonomy_var->name,
                'field' => 'slug',
                'terms' => $term
            ),
        ),
		'post_type' => 'housing',
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
	echo '<img src="' . $thumbnail_image_url[0] . '" class="column_item_img">';
}else{
	echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage220.png">';
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
                <div class="archive_body_item_foot">
<?php if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
} ?>
                </div>
<?php wp_reset_query();endif; ?>

              </div>
            </div>
					<!-- TENP -->
					<?php include('choose_case.php'); ?>
        </article>
				<!-- TENP -->
				<?php include('side_case.php'); ?>
      </div>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>

<?php get_footer(''); ?>
