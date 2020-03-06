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
      <div>安井建設で建築したお客様の声</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/case_voice/">お家の実例・お客様の声</a></li>
        <li><a href="<?php echo home_url(); ?>/voice/">お客様の声</a></li>
<?php
	if($oyaname != ''){
    		echo '<li><a href="'.home_url().'/voice_category/'. $oyaslug .'">'. $oyaname .'</a></li>';
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
              <h1 class="lead-a_heading lead_heading"><?php single_cat_title() ?>のお客様の声</h1>
              <div class="text">
<?php if($oyaname == '') :?>
                <p><?php echo term_description($tax_id); ?></p>
<?php elseif($oyaslug == 'voice-area') :?>
                <p>
									愛知県（名古屋・江南・岩倉・小牧・一宮）で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の<?php single_cat_title() ?>で建てたお客様の声をご紹介。本格木造・RC住宅「アトリエコラボスタイル」、シンプルモダン・ナチュラル・ブルックリン・レトロ風なデザイン住宅、ライフスタイルに合わせて選べる注文住宅、価格重視で選ぶローコスト規格住宅など、<?php single_cat_title() ?>で建てたお客様からいただいたメッセージ・太鼓判をご覧ください。
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
		'post_type' => 'voice',
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
                            <h2 class="heading">
<?php
if(mb_strlen($post->post_title, 'UTF-8')>60){
	$title= mb_substr($post->post_title, 0, 60, 'UTF-8');
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
					<?php include('choose_voice.php'); ?>
        </article>
				<!-- TENP -->
				<?php include('side_voice.php'); ?>
      </div>
		</article>
		<?php include('tenp-excursion_bnr.php'); ?>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>

<?php get_footer(''); ?>
