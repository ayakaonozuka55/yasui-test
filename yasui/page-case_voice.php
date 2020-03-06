<?php get_header(); ?>
<!-- sub-container -->

  <main class="main case_voice detail main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/case_voice/bg_head.jpg);">
      <h1>お家の実例・お客様の声</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li>お家の実例・お客様の声</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="lead lead-c">
        <div class="l-content-sm">
          <h2 class="lead-c_heading lead_heading"><span>お客様のしあわせな暮らしを実現するこだわりの家づくり。<br>建築実例やお客様の声をどうぞご覧ください。</span></h2>
          <div class="text">
            <p>こだわりのある家づくりのいちばんのお手本になるものは、<br class="visible-md visible-sm">実際の注文住宅の建築事例や建てた人の満足感やこだわりポイントだと思います。<br>本格注文住宅からコストパフォーマンスに優れた規格住宅まで、<br class="visible-md visible-sm">敷地の広さや建築条件にとらわれないアイディアとプランニングが安井建築の提供できる大きな価値です。<br>暮らす人のライフスタイルに寄り添うプランニング、ふだんは見ることのない性能への工夫、<br class="visible-md visible-sm">実際の施工例やお客様の声からご紹介します。</p>
          </div>
        </div>
      </div>
      <section class="bg_thinorange">
        <div class="l-content-xs">
          <div class="anchorList">
            <div class="anchorList_item">
              <a href="#case" class="btn-b"><span>建築実例</span></a>
            </div>
            <div class="anchorList_item">
              <a href="#voice" class="btn-b"><span>お客様の声</span></a>
            </div>
          </div>
          <!-- /.anchorList -->
        </div>
      </section>
      <section id="case" class="section-case">
        <div class="l-content-sm">
          <div class="casevoiceBlock">
            <div class="casevoiceBlock_head">
              <div class="heading-a">
                <h2 class="head"><span class="line">最新の<span class="c-orange">建築実例</span></span></h2>
              </div>
            </div>
            <div class="caseBlock_body">
              <article class="articleListWrap">
<?php
    $args= array(
		'post_type' => 'housing',
		'posts_per_page' => '4'
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
                <ul class="articleList articleList-4column">
<?php while (have_posts()) : the_post(); ?>
<?php
    $days=14; //NEWをつける日数
    $today=date_i18n('U');
    $entry=get_the_time('U');
    $sa=date('U',($today - $entry))/86400;
        if( $days > $sa ){
	        echo '<li class="articleItem articleItem-bgGray articleItem-new">';
        }else{
	        echo '<li class="articleItem articleItem-bgGray">';
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
              </article>
            </div>
            <div class="casevoiceBlock_bottom">
							<!-- TENP -->
							<?php include('choose_case.php'); ?>
            </div>
            <div class="casevoiceBlock_foot">
              <div class="btn-a btn">
                <a href="<?php echo home_url(); ?>/housing/">建築実例をもっと見る</a>
              </div>
            </div>
          </div>
          <!-- /.casevoiceBlock -->
        </div>
      </section>
      <section id="voice" class="section-voice bg_thinpink">
        <div class="l-content-sm">
          <div class="casevoiceBlock">
            <div class="casevoiceBlock_head">
              <div class="heading-a">
                <h2 class="head"><span class="line">最新の<span class="c-orange">お客様の声</span></span></h2>
              </div>
            </div>
            <div class="caseBlock_body">
              <article class="articleListWrap">
<?php
    $args= array(
		'post_type' => 'voice',
		'posts_per_page' => '4'
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
                <ul class="articleList articleList-4column">
<?php while (have_posts()) : the_post(); ?>
<?php
    $days=14; //NEWをつける日数
    $today=date_i18n('U');
    $entry=get_the_time('U');
    $sa=date('U',($today - $entry))/86400;
        if( $days > $sa ){
	        echo '<li class="articleItem articleItem-bgGray articleItem-new">';
        }else{
	        echo '<li class="articleItem articleItem-bgGray">';
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
              </article>
            </div>
            <div class="casevoiceBlock_bottom">
							<!-- TENP -->
							<?php include('choose_voice.php'); ?>
            </div>
            <div class="casevoiceBlock_foot">
              <div class="btn-a btn">
                <a href="<?php echo home_url(); ?>/voice/">お客様の声をもっと見る</a>
              </div>
            </div>
          </div>
          <!-- /.casevoiceBlock -->
        </div>
				<?php include('tenp-excursion_bnr.php'); ?>
      </section>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>

<!-- sub-container end -->
<?php get_footer(); ?>
