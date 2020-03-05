<?php get_header(''); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo $url;
  }
?>
  <main class="main showroom detail main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/show_room/bg_head.jpg);">
      <h1>モデルハウス・店舗のご来場ご予約</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li>モデルハウス・店舗のご来場ご予約</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="lead lead-c">
        <div class="l-content-sm">
          <h2 class="lead-c_heading lead_heading"><span>デザインや性能、素材感など実物を見て触って体感。<br>家づくりに役立つお金の話や土地情報など、<br>実際の家づくりを具体的にイメージできます。</span></h2>
        </div>
      </div>
      <section class="section_point">
        <div class="bg_thinorange">
          <div class="l-content-sm">
            <div class="heading-a">
              <h2 class="head"><span class="line">ご来店いただく<br class="visible-xs"><span class="c-orange">3つのポイント</span></span></h2>
            </div>
            <p class="show_r_point_txt">地域を知り尽くした経験豊富な住宅のプロになんでも気軽に相談できる</p>
            <ul class="show_r_point_wrap">
              <li class="show_r_point_01"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/show_room/img_point1.png" alt="">
                <p class="point">POINT<span>1</span></p>
                <h3>実際の家づくりを体感</h3>
                <p>資料やパンフレットでは実感できない高い住宅性能や素材の質感、女性コーディネーターが提案する家事動線や収納スペースプランニングの工夫など、実際の家づくりをご体感できます。</p>
              </li>
              <li class="show_r_point_02"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/show_room/img_point2.png" alt="">
                <p class="point">POINT<span>2</span></p>
                <h3>豊富な土地情報が見放題
                </h3>
                <p>愛知県江南市、一宮、扶桑近隣エリアの最新の土地情報から、学区や最寄り駅などご希望の条件でお好きな土地をご案内いたします。土地からの家探しも、安井建設ではライフプランにあったお手伝いをさせていただきます。
                </p>
              </li>
              <li class="show_r_point_03"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/show_room/img_point3.png" alt="">
                <p class="point">POINT<span>3</span></p>
                <h3>住宅ローンのご相談や<br>
                  シミュレーション</h3>
                <p>家づくりで大切なお金の話。住宅ローン商品ごとのメリットデメリットや経験豊富な安井建設アドバイザーが、ライフプランに合わせてお客様に合った住宅ローンを診断・シミュレーションいたします。</p>
              </li>
            </ul>
          </div>
        </div>
			</section>
			<!-- cta_area -->
			<div class="showroom_cta_area bg_gray">
				<div class="cta_btn_wrap">
					<a href="<?php echo home_url(); ?>/making/reform_contact" class="cta_btn">
						<div class="hukidashi_area">
							<p class="hukidashi_text">リフォーム・リノベーションのこと、<br class="visible-xs">何でもご相談ください。</p>
						</div>
							<p class="cta_area_text">リフォーム・リノベーションの<br class="visible-xs">お問い合わせ・来場予約はこちら</p>
					</a>
				</div>
			</div>

      <section>
        <h2 class="show_r_open_tit">モデルハウス・店舗はこちら</h2>
        <div class="show_r_list_wrap">
          <div class="l-content-sm">
<?php
    $args= array(
		'post_type' => 'showroom',
		'posts_per_page' => '-1'
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
            <ul>
<?php while (have_posts()) : the_post(); ?>
              <li class="show_r_list_wrap_flex">
                <div class="slick_wrap">
<?php if( have_rows('画像スライダー') ): ?>
                  <ul class="slick">
	<?php while ( have_rows('画像スライダー') ) : the_row(); ?>
	<?php
	 $attachment_id = get_sub_field('画像');
	 $size1 = "profile_size";
	 $image1 = wp_get_attachment_image_src( $attachment_id, $size1 );
	?>
                    <li><img src="<?php echo $image1[0]; ?>" alt=""></li>
	<?php endwhile; ?>
                  </ul>
<?php endif;?>
                </div>
                <div class="show_r_list_box">
                  <h4><?php the_title(); ?></h4>
                  <p class="show_r_list_txt">
<?php
$acfcontent = get_field('リード文');
if(mb_strlen($acfcontent, 'UTF-8')>45){
	$acfcontent= mb_substr($acfcontent, 0, 45, 'UTF-8');
	echo $acfcontent.'…';
}else{
	echo $acfcontent;
}
?>
									</p>
                  <p class="show_r_list_address"><?php echo get_field('住所'); ?></p>
                  <p class="show_r_list_tel"><?php echo get_field('電話番号'); ?></p>
                  <ul class="show_r_list_btn">
                    <li class="btn_to_detail"><a href="<?php the_permalink() ?>">詳細を見る</a></li>
                    <li class="btn_to_book"><a href="<?php the_permalink() ?>#form">来場予約</a></li>
                  </ul>
                </div>
              </li>
<?php endwhile; ?>
            </ul>
<?php wp_reset_query();endif; ?>
            <div class="show_r_to_tel_box">
              <div class="show_r_to_tel_txt">お急ぎのお客様は<br class="visible-xs">お気軽にお電話ください。</div>
              <div class="show_r_to_tel_num"><a href="tal:0120543536">0120-54-3536</a></div>
            </div>
          </div>
        </div>
      </section>

			<!-- cta_area -->
			<div class="showroom_cta_area bg_gray">
				<div class="cta_btn_wrap">
					<a href="<?php echo home_url(); ?>/making/reform_contact" class="cta_btn">
						<div class="hukidashi_area">
							<p class="hukidashi_text">リフォーム・リノベーションのこと、<br class="visible-xs">何でもご相談ください。</p>
						</div>
							<p class="cta_area_text">リフォーム・リノベーションの<br class="visible-xs">お問い合わせ・来場予約はこちら</p>
					</a>
				</div>
			</div>


      <section class="info section-info bg_thinpink">
        <div class="l-content-sm">
          <div class="casevoiceBlock">
            <div class="casevoiceBlock_head">
              <div class="heading-a">
                <h2 class="title"><span class="line">最新の見学会・イベント情報</span></h2>
              </div>
            </div>
<?php
date_default_timezone_set('Asia/Tokyo');
    $args= array(
		'post_type' => 'event',
		'posts_per_page' => '4',
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
            <ul class="articleList articleList-4column">
<?php while (have_posts()) : the_post(); ?>
              <li class="articleItem articleItem-bgWhite">
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
					if($cnt < 3){
						echo '<li><span>'.$term_name.'</span></li>';
						$cnt++;
					}
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
<?php wp_reset_query();endif; ?>
            <div class="btn-a">
              <a href="<?php echo home_url(); ?>/event">もっと見る</a>
            </div>
      </section>
    </article>
  </main>

<?php get_footer(''); ?>
