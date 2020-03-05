<?php get_header(); ?>
<!-- sub-container -->

  <main class="main reform main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/making/thermal_insulation/bg_head.jpg);">
      <h1>断熱・気密リフォーム工事</h1>
    </div>
    <?php include('nav_reform_pagehead.php'); ?>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/making/">安井建設の家づくり</a></li>
        <li><a href="<?php echo home_url(); ?>/making/reform/">リフォーム・リノベーション</a></li>
        <li>断熱・気密リフォーム工事</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="lead lead-c">
        <div class="l-content-sm">
          <h2 class="lead-c_heading lead_heading"><span>昔の家だから夏涼しくて、冬あたたかい家には<br class="visible-lg visible-md visible-sm">できないと思っていませんか？</span></h2>
          <div class="text">
            <p>家の中で感じる冬の寒さ、夏の暑さを当たり前だと思っていませんか？<br>寒さ、暑さの原因は今お住いの家の断熱性能が十分でないからかもしれません。<br>築年数が経った昔の家でも、断熱・気密リフォーム工事をすれば室温や温度が安定し、<br class="visible-lg visible-md visible-sm">一年を通して快適な空間にする事ができます。</p>
          </div>
        </div>
      </div>
      <section class="thermalInsulation_content">
        <div class="l-content-sm">
          <article class="thermalInsulation_block">
            <h3 class="heading"><span>断熱工事</span>-断熱材-</h3>
            <div class="colwrap">
              <div class="content">
                <div class="card">
                  <h4 class="subheading">とっても快適！</h4>
                  <ul class="unordered">
                    <li class="item">・エアコンやファンヒーターの利用が最小限で済みます。室温や湿度が安定し、寒さ・暑さの不満が解消できます。</li>
                  </ul>
                </div>
                <div class="card">
                  <h4 class="subheading">健康的な暮らし！</h4>
                  <ul class="unordered">
                    <li class="item">・ヒートショックが起きる環境を回避できます。</li>
                    <li class="item">・肌のかゆみやアトピー性疾患が改善されます。</li>
                    <li class="item">・女性特有の冷えが緩和され、美容と健康に繋がり、風邪も引きにくくなります。</li>
                  </ul>
                </div>
                <div class="card">
                  <h4 class="subheading">経済的にもうれしい！</h4>
                  <ul class="unordered">
                    <li class="item">・光熱費が大幅に削減されます！</li>
                    <li class="item">・昔ながらの家の隙間風により、冷暖房器具の効果が発揮できないため余計な電気を使ってしまうのを防いでくれます。</li>
                  </ul>
                </div>
              </div>
              <div class="img-sm"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/thermal_insulation/img_01.jpg" alt=""></div>
            </div>
          </article>
          <article class="thermalInsulation_block">
            <h3 class="heading"><span>気密工事</span>-サッシ-</h3>
            <div class="colwrap">
              <div class="img-md"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/thermal_insulation/img_02.jpg" alt=""></div>
              <div class="img-md"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/thermal_insulation/img_03.jpg" alt=""></div>
            </div>
            <p class="text">交通量の多い道路の車や電車が通るなどの外からの騒音を軽減します。また、建物内から外にもれる音も軽減します。</p>
            <div class="card">
              <h4 class="subheading">断熱性アップで光熱費の節約！</h4>
              <ul class="unordered">
                <li class="item">夏の暑さや冬の寒さが屋内に伝わりにくくなり、部屋の熱の流出もしにくいので、冷暖房費の節約も見込めます。</li>
              </ul>
            </div>
            <div class="card">
              <h4 class="subheading">結露防止で健康を守る</h4>
              <ul class="unordered">
                <li class="item">アレルギー源のカビやダニの発生の元となる結露の発生を抑え、家族の健康を守ります。</li>
              </ul>
            </div>
          </article>
        </div>
      </section>
      <section class="latest sectionwrap bg_gray">
        <div class="l-content-sm">
          <div class="heading-a">
            <h2 class="head"><span class="line">断熱・気密リフォーム工事の<br class="visible-xs"><span class="c-orange">最新実例</span></span></h2>
          </div>
          <article class="articleListWrap">
  <?php
      $args= array(
          'tax_query' => array( 'relation' => 'OR',
              array(
  								'taxonomy' => 'housing_category',
                  'field' => 'slug',
                  'terms' => array('/photo-renovation-dannetsu'),
  								'operator' => 'AND'
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
            <a href="<?php echo home_url(); ?>/housing_category/photo-renovation-dannetsu">もっと見る</a>
          </div>
          </article>
        </div>
      </section>
      <section class="latest sectionwrap sectionwrap-sm">
        <div class="l-content-sm">
          <div class="heading-a">
            <h2 class="head"><span class="line">断熱・気密リフォーム工事の<br class="visible-xs"><span class="c-orange">最新お客様の声</span></span></h2>
          </div>
          <article class="articleListWrap">

<?php
    $args= array(
        'tax_query' => array(
            array(
        				'taxonomy' => 'voice_category',
                'field' => 'slug',
                'terms' => 'voice-renovation-dannetsu'
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
            <a href="<?php echo home_url(); ?>/voice_category/voice-renovation-dannetsu">もっと見る</a>
          </div>
          </article>
        </div>
      </section>
      <?php include('nav_reform.php'); ?>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>
<?php include('latest_event_reform.php'); ?>
<?php include('latest_column.php'); ?>

<!-- sub-container end -->
<?php get_footer(); ?>
