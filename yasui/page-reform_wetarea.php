<?php get_header(); ?>
<!-- sub-container -->

  <main class="main reform main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_wetarea/bg_head.jpg);">
      <h1>水回りリフォーム</h1>
    </div>
    <?php include('nav_reform_pagehead.php'); ?>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/making/">安井建設の家づくり</a></li>
        <li><a href="<?php echo home_url(); ?>/making/reform/">リフォーム・リノベーション</a></li>
        <li>水回りリフォーム</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="lead lead-c">
        <div class="l-content-sm">
          <h2 class="lead-c_heading lead_heading"><span>家族が毎日使うキッチン、お風呂、洗面などの水回りを<br class="visible-lg visible-md">リフォームで快適空間へ。</span></h2>
          <div class="text">
            <p>水回りの「困った」を抱えていませんか？水回りはどれを取っても暮らしの快適性を担うもの。<br>毎日使う場所だからこそ気持ちよく使いたいですよね。お風呂や洗面、トイレ、キッチンは日々進化している設備。<br>また、各メーカーごとに特徴があるので、お客様の要望に合わせて提案いたします。<br>キッチンやお風呂・トイレ・洗面などの水まわりリフォームは安井建設へご相談ください。</p>
          </div>
        </div>
      </div>
      <section class="reformWetarea_content">
        <article class="reformWetarea_article bg_thinorange">
          <div class="l-content-sm">
            <div class="headwrap">
              <div class="content">
                <h3 class="heading">キッチンリフォーム</h3>
                <p class="text">毎日のごはんの支度がラクラク！料理は好きだけれど、使い勝手や収納力に不満を感じていませんか？キッチンに立つ時間を楽しくしてくれる最新のシステムキッチンは設備もお手入れも充実。家事の手間が減ったり、掃除がしやすくなったり、片付いてすっきりしたり…<br>家族のコミニュケーションの場としても生まれ変わります。<br>また、水漏れの心配を解消するために配管取り替え工事もおすすめします。</p>
                <ul class="catewrap">
                  <li class="cateitem">食器洗い乾燥機タイプ</li>
                  <li class="cateitem">吊り戸収納</li>
                  <li class="cateitem">背面収納</li>
                  <li class="cateitem">カウンター付きタイプ</li>
                </ul>
              </div>
              <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_wetarea/img01.jpg" alt=""></div>
            </div>
            <div class="supplement">
              <div class="left">
                <div class="card">
                  <h4 class="subheading">キッチンいろいろ</h4>
                  <ul class="typewrap">
                    <li class="typeitem typeitem-j">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_wetarea/img02_01.jpg" alt="">
                      <p>J型 省スペース</p>
                    </li>
                    <li class="typeitem typeitem-l">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_wetarea/img02_02.jpg" alt="">
                      <p>L型 作業ラクラク</p>
                    </li>
                    <li class="typeitem typeitem-f">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_wetarea/img02_03.jpg" alt="">
                      <p>対面型 会話が弾む</p>
                    </li>
                    <li class="typeitem typeitem-i">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_wetarea/img02_04.jpg" alt="">
                      <p>アイランド ホームパーティ</p>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="right">
                <div class="card">
                  <h4 class="subheading">IHタイプ</h4>
                  <p class="cardtext">フラットなのでお掃除しやすくオール電化にすればガス代が無くなり、光熱費の節約！</p>
                </div>
                <div class="card">
                  <h4 class="subheading">ガスタイプ</h4>
                  <p class="cardtext">最新機器は火力調整もお掃除もしやすい！<br>料理好きさんは楽しいポイントいっぱい！</p>
                </div>
              </div>
            </div>
            <div class="bottom">
              <div class="heading-a heading-a-ex articleheading">
                <h4 class="head"><span class="line">キッチンリフォームの<span class="c-orange">最新実例</span></span></h4>
              </div>
              <article class="articleListWrap">
    <?php
        $args= array(
          'tax_query' => array( 'relation' => 'OR',
              array(
                  'taxonomy' => 'housing_category',
                  'field' => 'slug',
                  'terms' => array('photo-renovation-kitchen')
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
                  <a href="<?php echo home_url(); ?>/housing_category/photo-renovation-kitchen">もっと見る</a>
                </div>
              </article>
            </div>
          </div>
        </article>
        <article class="reformWetarea_article">
          <div class="l-content-sm">
            <div class="headwrap">
              <div class="content">
                <h3 class="heading">洗面リフォーム</h3>
                <p class="text">洗面化粧台は仕事や学校など出掛ける準備をする毎日のスタート切る場所です。家族みんなが朝の時間を気持ち良く、スムーズにむかえるために清潔感があり、操作性・デザイン・収納に配慮した洗面スペースを。一体感があり豊富な収納と使い勝手の良い水栓器具を備えたオールインワンユニットが人気です。また、デザイン性を高めたオリジナルの洗面で女性がわくわくできる場所にリフォームも良いですね。また、水漏れの心配を解消するために配管取り替え工事もおすすめします。</p>
                <ul class="catewrap">
                  <li class="cateitem">収納たっぷり</li>
                  <li class="cateitem">掃除しやすい</li>
                  <li class="cateitem">汚れが付きにくい</li>
                </ul>
              </div>
              <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_wetarea/img03.jpg" alt=""></div>
            </div>
            <div class="bottom">
              <div class="heading-a heading-a-ex articleheading">
                <h4 class="head"><span class="line">洗面リフォームの<span class="c-orange">最新実例</span></span></h4>
              </div>
              <article class="articleListWrap">
    <?php
        $args= array(
          'tax_query' => array( 'relation' => 'OR',
              array(
                  'taxonomy' => 'housing_category',
                  'field' => 'slug',
                  'terms' => array('photo-renovation-toiletries')
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
                <li class="articleItem articleItem-bgGray">
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
                  <a href="<?php echo home_url(); ?>/housing_category/photo-renovation-toiletries">もっと見る</a>
                </div>
              </article>
            </div>
          </div>
        </article>
        <article class="reformWetarea_article bg_thinorange">
          <div class="l-content-sm">
            <div class="headwrap">
              <div class="content">
                <h3 class="heading">トイレリフォーム</h3>
                <p class="text">毎日何度も利用するトイレだから、清潔で心地よい空間にリフォーム。また「狭いから身体が不自由になったとき大変そう」「設備や内装が古くて、気分がすっきりしないなあ」トイレに入って、そんな風に感じたことはありませんか？どんな方にも使いやすいようにご提案します。最新設備は、節水性能が非常に高く、汚れが付きにくいのでお手入れがとても楽です。</p>
                <ul class="catewrap">
                  <li class="cateitem">収納たっぷり</li>
                  <li class="cateitem">掃除しやすい</li>
                  <li class="cateitem">背面収納</li>
                  <li class="cateitem">温暖便座</li>
                  <li class="cateitem">汚れが付きにくい</li>
                  <li class="cateitem">節水</li>
                  <li class="cateitem">脱臭機能</li>
                </ul>
              </div>
              <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_wetarea/img04.jpg" alt=""></div>
            </div>
            <div class="bottom">
              <div class="heading-a heading-a-ex articleheading">
                <h4 class="head"><span class="line">トイレリフォームの<span class="c-orange">最新実例</span></span></h4>
              </div>
              <article class="articleListWrap">
    <?php
        $args= array(
          'tax_query' => array( 'relation' => 'OR',
              array(
                  'taxonomy' => 'housing_category',
                  'field' => 'slug',
                  'terms' => array('photo-renovation-wc')
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
                  <a href="<?php echo home_url(); ?>/housing_category/photo-renovation-wc">もっと見る</a>
                </div>
              </article>
            </div>
          </div>
        </article>
        <article class="reformWetarea_article">
          <div class="l-content-sm">
            <div class="headwrap">
              <div class="content">
                <h3 class="heading">浴室（風呂）リフォーム</h3>
                <p class="text">一日の疲れを癒してくれる浴室は広くてあたたくて清潔でありたいですよね。昔ながらのタイルのお風呂は裏側に水が入り込んでしまい腐食やカビが発生してしまいます。最新のユニットバスはお掃除もラクラクで、どんな方でも快適に利用できるよう段差が無かったり、手摺りが取り付いていたりと快適機能がたくさん。また、断熱材によって冬の冷えも防げる快適な設備が充実しています。近年問題とされている「ヒートショック」による死亡事故の対策としてもご提案しています。</p>
                <ul class="catewrap">
                  <li class="cateitem">汚れが付きにくい</li>
                  <li class="cateitem">冬でもあったか</li>
                  <li class="cateitem">掃除しやすい</li>
                  <li class="cateitem">すべりにくい</li>
                </ul>
              </div>
              <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_wetarea/img05.jpg" alt=""></div>
            </div>
            <div class="reformWetarea_article_bottom">
              <h3 class="heading">ヒートショックって<br>知ってますか？</h3>
              <p class="text">「ヒートショック」とは、温度の急激な変化で血圧が上下に大きく変動することなどで起こる失神や心筋梗塞、不整脈、脳梗塞のことです。入浴時に急激な血圧低下により失神し、溺れて死亡するケースなどは少なくとも交通事故の2倍の死亡数となり問題になっています。</p>
            </div>
            <div class="bottom">
              <div class="heading-a heading-a-ex articleheading">
                <h4 class="head"><span class="line">浴室（風呂）リフォームの<span class="c-orange">最新実例</span></span></h4>
              </div>
              <article class="articleListWrap">
    <?php
        $args= array(
          'tax_query' => array( 'relation' => 'OR',
              array(
                  'taxonomy' => 'housing_category',
                  'field' => 'slug',
                  'terms' => array('photo-renovation-bathroom')
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
<li class="articleItem articleItem-bgGray">
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
                  <a href="<?php echo home_url(); ?>/housing_category/photo-renovation-bathroom">もっと見る</a>
                </div>
              </article>
            </div>
          </div>
        </article>
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
