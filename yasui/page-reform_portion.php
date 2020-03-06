<?php get_header(); ?>
<!-- sub-container -->

  <main class="main reform main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_portion/bg_head.jpg);">
      <h1>部位別リフォーム</h1>
    </div>
    <?php include('nav_reform_pagehead.php'); ?>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/making/">安井建設の家づくり</a></li>
        <li><a href="<?php echo home_url(); ?>/making/reform/">リフォーム・リノベーション</a></li>
        <li>部位別リフォーム</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="lead lead-c">
        <div class="l-content-sm">
          <h2 class="lead-c_heading lead_heading"><span>キッチンやトイレなどの水まわりや屋根・外壁リフォームなど、<br class="visible-md">家の各部位リフォームをご紹介します。</span></h2>
          <div class="text">
            <p>キッチンやトイレなどの水回りや屋根・外壁・外装リフォーム、リビング・寝室のリフォームをはじめ、<br class="visible-md">自宅のバリアフリー化や防音施工、ペットと暮らすリフォームなど、<br class="visible-md visible-sm">家族が安心して快適な暮らしが出来るようご提案を致します。</p>
          </div>
        </div>
      </div>
      <section class="reformdetail_block">
        <div class="l-content-sm">
          <article class="reformdetail_card">
            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_portion/img_wetarea.jpg" alt=""></div>
            <div class="content">
              <h3 class="heading">水回りリフォーム</h3>
              <p class="text">日常生活の中で重要な水回り。<br>日常の生活を“より快適な暮らし”へ。<br><br>いつ頃がリフォームの時期なの？<br>そんな悩みも弊社にお任せください。</p>
              <div class="btn-c btn-c-lg">
                <a href="<?php echo home_url(); ?>/making/reform_wetarea">詳しくはこちら</a>
              </div>
            </div>
          </article>
          <article class="reformdetail_card">
            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_portion/img_reform_outer.jpg" alt=""></div>
            <div class="content">
              <h3 class="heading">屋根・外壁・外装リフォーム</h3>
              <p class="text">経年劣化したお家が新たに生まれ変わります。<br><br>屋根、外壁、外装は建物の寿命を左右させる<br class="visible-md">大きな役割を果たしています。</p>
              <div class="btn-c btn-c-lg">
                <a href="<?php echo home_url(); ?>/making/reform_outer">詳しくはこちら</a>
              </div>
            </div>
          </article>
          <article class="reformdetail_card">
            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_portion/img_living.jpg" alt=""></div>
            <div class="content">
              <h3 class="heading">リビング・居室・バリアフリー・防音・ペット</h3>
              <p class="text">長年住んだからこそ気づく快適な暮らし。<br>今よりももっと快適な暮らしを。<br><br>家族が心地よく住める場所を提供します。</p>
              <div class="btn-c btn-c-lg">
                <a href="<?php echo home_url(); ?>/making/reform_living">詳しくはこちら</a>
              </div>
            </div>
          </article>
        </div>
      </section>
      <section class="latest sectionwrap bg_gray">
        <div class="l-content-sm">
          <div class="heading-a">
            <h2 class="head"><span class="line">リフォーム・リノベーションの<br class="visible-xs"><span class="c-orange">最新実例</span></span></h2>
          </div>
          <article class="articleListWrap">
  <?php
      $args= array(
          'tax_query' => array( 'relation' => 'OR',
              array(
  								'taxonomy' => 'housing_category',
                  'field' => 'slug',
                  'terms' => array('photo-renovation')
              )
          ),
  		'post_type' => 'housing',
  		'posts_per_page'=>'4'
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
echo '<img src="' . $thumbnail_image_url[0] . '">';
}else{
echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage220.png">';
}
?>
                  </div>
                  <div class="content">
                    <h3 class="heading">
<?php
if(mb_strlen($post->post_title, 'UTF-8')>40){
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
if(mb_strlen($acfcontent, 'UTF-8')>29){
$acfcontent= mb_substr($acfcontent, 0, 30, 'UTF-8');
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
<?php wp_reset_query();endif; ?>
          <div class="btn-e">
            <a href="<?php echo home_url(); ?>/housing_category/photo-renovation">もっと見る</a>
          </div>
          </article>
        </div>
      </section>
      <section class="latest sectionwrap sectionwrap-sm">
        <div class="l-content-sm">
          <div class="heading-a">
            <h2 class="head"><span class="line">リフォーム・リノベーションの<br class="visible-xs"><span class="c-orange">最新お客様の声</span></span></h2>
          </div>
          <article class="articleListWrap">

<?php
    $args= array(
        'tax_query' => array(
            array(
        				'taxonomy' => 'voice_category',
                'field' => 'slug',
                'terms' => 'voice-renovation'
            ),
        ),
		'post_type' => 'voice',
		'posts_per_page'=>'4',
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
            <ul class="articleList articleList-4column">
<?php while (have_posts()) : the_post(); ?>
              <li class="articleItem articleItem-bgGray">
                <a href="<?php the_permalink(); ?>">
                  <div class="img img-scale">
<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'index_size' );
if($thumbnail_image_url[0]){
	echo '<img src="' . $thumbnail_image_url[0] . '">';
}else{
	echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage220.png">';
}
?>
									</div>
                  <div class="content">
                    <h3 class="heading">
<?php
if(mb_strlen($post->post_title, 'UTF-8')>60){
	$title= mb_substr($post->post_title, 0, 60, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?>
										</h3>
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
<?php wp_reset_query();endif; ?>

          <div class="btn-e">
            <a href="<?php echo home_url(); ?>/voice_category/voice-renovation">もっと見る</a>
          </div>
          </article>
        </div>
      </section>
      <?php include('nav_reform.php'); ?>
    </article>
  </main>

<!-- TENP -->
<?php include('cv_reform.php'); ?>
<?php include('latest_event_reform.php'); ?>
<?php include('latest_column.php'); ?>

<!-- sub-container end -->
<?php get_footer(); ?>
