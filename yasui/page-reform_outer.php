<?php get_header(); ?>
<!-- sub-container -->

  <main class="main reform main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_outer/bg_head.jpg);">
      <h1>屋根・外壁・外装リフォーム</h1>
    </div>
    <?php include('nav_reform_pagehead.php'); ?>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/making/">安井建設の家づくり</a></li>
        <li><a href="<?php echo home_url(); ?>/making/reform/">リフォーム・リノベーション</a></li>
        <li>屋根・外壁・外装リフォーム</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="lead lead-c">
        <div class="l-content-sm">
          <h2 class="lead-c_heading lead_heading"><span>屋根・外壁・外装リフォームは、外観の印象を変えるという<br class="visible-md">デザイン的な要素だけではなく、<br class="visible-md">永く住まう家の寿命を伸ばすための大切なポイントです。</span></h2>
          <div class="text">
            <p>屋根・外壁・外装。見た目はもちろんですが、家を守る為には重要な役割を果たしています。<br>見た目では気づかないうちに経年劣化していることが多く、気づいた時には重症化していることが多いのも現実です。<br>いつまでも安心して永く住まう家にするために。ご不安を感じたら、安井建設へご相談ください。</p>
          </div>
        </div>
      </div>
      <section class="reformdetail_block">
        <div class="l-content-sm">
          <article class="reformdetail_card">
            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_outer/img_01.jpg" alt=""></div>
            <div class="content">
              <h3 class="heading">外壁リフォーム</h3>
              <p class="text">外壁を塗り替えや張り替えることは、建物の印象を変える為だけではありません。<br>ご家族が住まう大切な建物を守り、建物の寿命を長く、安全を保つためにメンテナンスが必要です。<br>壁表面の劣化は建物の傷みを早める直接的な原因になります。早めの点検をお勧めします。</p>
            </div>
          </article>
          <article class="reformdetail_card">
            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_outer/img_02.jpg" alt=""></div>
            <div class="content">
              <h3 class="heading">屋根リフォーム</h3>
              <p class="text">屋根はつねに雨風にさらされます。屋根材にひびが入ったり、瓦を留めている釘が浮いたりすると隙間から雨水が浸入し、内部構造の腐食につながります。屋根は普段上がることがないため、劣化症状にも気づきにくい部位です。そのため、気づいたときにはすでに重症化していることが多く、早期発見が重要になります。<br>劣化が発生しても、早い段階であれば塗装でメンテナンスすることができます。</p>
            </div>
          </article>
          <article class="reformdetail_card">
            <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_outer/img_03.jpg" alt=""></div>
            <div class="content">
              <h3 class="heading">ベランダリフォーム</h3>
              <p class="text">防水工事と聞いてもピンと来ない方も多いと思いますが、具体的にはベランダやバルコニー、屋上(陸屋根)などからの漏水を防ぐための工事です。<br>建物内部に浸入してしまうと、木造では大事な柱や梁を腐食させていきます。<br>鉄骨でも骨組みにサビを生じさせ、強度をどんどん弱くしていきます。さらに、カビも発生原因ともなるので、ぜんそくやアレルギーといった健康被害も引き起こしかねません。適切なメンテナンスや定期点検で予防することが大事なのです。</p>
            </div>
          </article>
        </div>
      </section>
      <section class="latest sectionwrap bg_gray">
        <div class="l-content-sm">
          <div class="heading-a">
            <h2 class="head"><span class="line">屋根外壁の<br class="visible-xs"><span class="c-orange">最新実例</span></span></h2>
          </div>
          <article class="articleListWrap">
      <?php
      $args= array(
          'tax_query' => array( 'relation' => 'OR',
              array(
                  'taxonomy' => 'housing_category',
                  'field' => 'slug',
                  'terms' => array('photo-renovation-roof')
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
            <a href="<?php echo home_url(); ?>/housing_category/photo-renovation-roof">もっと見る</a>
          </div>
          </article>
        </div>
      </section>
      <section class="latest sectionwrap sectionwrap-sm">
        <div class="l-content-sm">
          <div class="heading-a">
            <h2 class="head"><span class="line">屋根外壁の<br class="visible-xs"><span class="c-orange">最新お客様の声</span></span></h2>
          </div>
          <article class="articleListWrap">

      <?php
      $args= array(
        'tax_query' => array(
            array(
                'taxonomy' => 'voice_category',
                'field' => 'slug',
                'terms' => 'voice-renovation-roof'
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
            <a href="<?php echo home_url(); ?>/voice_category/voice-renovation-roof">もっと見る</a>
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
