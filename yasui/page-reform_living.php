<?php get_header(); ?>
<!-- sub-container -->

  <main class="main reform main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_living/bg_head.jpg);">
      <h1>リビング・居室・バリアフリー・防音・愛犬と暮らすリフォーム</h1>
    </div>
    <?php include('nav_reform_pagehead.php'); ?>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/making/">安井建設の家づくり</a></li>
        <li><a href="<?php echo home_url(); ?>/making/reform/">リフォーム・リノベーション</a></li>
        <li>リビング・居室・バリアフリー・防音・愛犬と暮らすリフォーム</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="lead lead-c">
        <div class="l-content-sm">
          <h2 class="lead-c_heading lead_heading"><span>リビング・居室リフォームから、バリアフリー・防音・ペットも<br class="visible-lg visible-md">快適なリフォームまで。お客様のご要望に合わせて<br class="visible-lg visible-md">永く住まうお家づくりのご提案をさせていただきます。</span></h2>
          <div class="text">
            <p>壁や床の張替だけでなく、間取り変更まで対応したリビング・居室のリフォームや、<br class="visible-lg visible-md visible-sm">家族みんなに優しい住まいとなるバリアフリーリフォーム、<br class="visible-lg visible-md visible-sm">防音工事から犬や猫などのペットも快適に暮らせるリフォームまで、<br class="visible-lg visible-md visible-sm">生活が豊かになり快適に暮らせるリフォームメニューをご用意しています。</p>
          </div>
        </div>
      </div>
      <section class="reformLiving_content">
        <article class="reformLiving_article bg_thinorange">
          <div class="l-content-sm">
            <div class="headwrap">
              <div class="content">
                <h3 class="heading">リビング・居室リフォーム</h3>
                <p class="text">ご家族が集まり、広々寛げる、そんなリビング自然とコミニュケーションが生まれます。また、時には友人や親類を呼んでパーティーも開けるような憧れのリビングへのリフォームもいいですね。</p>
              </div>
              <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_living/img01.jpg" alt=""></div>
            </div>
            <div class="supplement">
              <div class="inner">
                <div class="card">
                  <h4 class="cardheading">すっきり広々！</h4>
                  <p class="cardtext">収納を充実することでいつでもスッキリな空間を保ち、寛げる空間に。</p>
                </div>
                <div class="card">
                  <h4 class="cardheading">明るく快適に</h4>
                  <p class="cardtext">床や壁など内装を明るくリフォーム。<br>白い壁で明るさを高め、清潔感が出るインテリアに。</p>
                </div>
                <div class="card">
                  <h4 class="cardheading">開放的で気持ちいい</h4>
                  <p class="cardtext">家族が自然に集まれるリビングが欲しい、キッチンにいながら家族と会話を楽しみたいなどは部屋同士をつなげることで家族のコミニュケーションが生まれる空間に。</p>
                </div>
                <div class="card">
                  <h4 class="cardheading">趣味を充実	</h4>
                  <p class="cardtext">パソコンスペースや音響スペース、家事スペースなど毎日を楽しむためのリフォーム。</p>
                </div>
              </div>
            </div>
            <article class="bottom">
              <div class="heading-a heading-a-ex articleheading">
                <h4 class="head"><span class="line">リビング・居室リフォームの<span class="c-orange">最新実例</span></span></h4>
              </div>
              <article class="articleListWrap">
    <?php
        $args= array(
          'tax_query' => array( 'relation' => 'OR',
              array(
                  'taxonomy' => 'housing_category',
                  'field' => 'slug',
                  'terms' => array('photo-renovation-living')
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
                  <a href="<?php echo home_url(); ?>/housing_category/photo-renovation-living">もっと見る</a>
                </div>
              </article>
            </article>
          </div>
        </article>
        <article class="reformLiving_article">
          <div class="l-content-sm">
            <div class="headwrap">
              <div class="content">
                <h3 class="heading">バリアフリー（介護リフォーム）</h3>
                <p class="text">バリアフリー工事とは、生活する上に置いての障害物を取り除くという事で、高齢者や障害者にとって安全かつ、住みよい住宅にするために、近年注目されている工事です。<br>主な工事内容としては、床の段差解消、出入り口の拡幅、引き戸に変更、手摺の取付等が有ります。それと要介護、要支援に該当する場合、自治体からの補助が出る場合が有ります。具体的な計画、助成金についてはケアマネージャーや市町村の窓口に相談されると良いでしょう。</p>
              </div>
              <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_living/img02.jpg" alt=""></div>
            </div>
            <article class="bottom">
              <div class="heading-a heading-a-ex articleheading">
                <h4 class="head"><span class="line">バリアフリー（介護リフォーム）の<span class="c-orange">最新実例</span></span></h4>
              </div>
              <article class="articleListWrap">
    <?php
        $args= array(
          'tax_query' => array( 'relation' => 'OR',
              array(
                  'taxonomy' => 'housing_category',
                  'field' => 'slug',
                  'terms' => array('photo-renovation-barrierfree')
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
                  <a href="<?php echo home_url(); ?>/housing_category/photo-renovation-barrierfree">もっと見る</a>
                </div>
              </article>
            </article>
          </div>
        </article>
        <article class="reformLiving_article bg_thinorange">
          <div class="l-content-sm">
            <div class="headwrap">
              <div class="content">
                <h3 class="heading">防音リフォーム</h3>
                <p class="text">防音工事とは屋外の騒音が家の中に侵入しないようにする工事のことです。対して、家の中から屋外へ音が漏れないように防ぐ工事を「遮音工事」と言います。 実際の工事では騒音の発生源、騒音の種類によって様々な対処方法が有りますが、主な対策には、窓の防音（ペアガラス、2重窓にする）や防音性能の高い床材を使用する、また壁や天井には、下地に遮音シートを埋込むことで音の侵入（流出）を防ぐといった手法が多く用いられています。また壁や窓の防音工事をすると、気密性や断熱効果も向上するため、電気代の節約や結露防止に役立つというメリットもあります。</p>
              </div>
              <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_living/img03.jpg" alt=""></div>
            </div>
            <div class="supplement">
              <div class="supplement_head">
                <div class="imgwrap">
                  <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/thermal_insulation/img_02.jpg" alt=""></div>
                  <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/thermal_insulation/img_03.jpg" alt=""></div>
                </div>
                <p class="supplement_text">交通量の多い道路の車や電車が通るなどの外からの騒音を軽減します。また、建物内から外にもれる音も軽減します。</p>
              </div>
              <div class="inner">
                <div class="card">
                  <h4 class="cardheading">断熱性アップで光熱費の節約！</h4>
                  <p class="cardtext">夏の暑さや冬の寒さが屋内に伝わりにくくなり、部屋の熱の流出もしにくいので、冷暖房費の節約も見込めます。</p>
                </div>
                <div class="card">
                  <h4 class="cardheading">結露防止で健康を守る</h4>
                  <p class="cardtext">アレルギー源のカビやダニの発生の元となる結露の発生を抑え、家族の健康を守ります。</p>
                </div>
              </div>
            </div>
            <article class="bottom">
              <div class="heading-a heading-a-ex articleheading">
                <h4 class="head"><span class="line">防音リフォームの<span class="c-orange">最新実例</span></span></h4>
              </div>
              <article class="articleListWrap">
    <?php
        $args= array(
          'tax_query' => array( 'relation' => 'OR',
              array(
                  'taxonomy' => 'housing_category',
                  'field' => 'slug',
                  'terms' => array('photo-renovation-bouon')
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
                  <a href="<?php echo home_url(); ?>/housing_category/photo-renovation-bouon">もっと見る</a>
                </div>
              </article>
            </article>
          </div>
        </article>
        <article class="reformLiving_article">
          <div class="l-content-sm">
            <div class="headwrap">
              <div class="content">
                <h3 class="heading heading-ex"><span>ワンちゃんやネコちゃんと快適に暮らす</span>愛犬家住宅</h3>
                <p class="text">愛犬家にとって、ワンちゃんは家族の一員。愛犬と最も長い時間を過ごすことになる「住まい」を見直すことで、家族の暮らしの豊かさや楽しさも大きく変わります。快適な毎日を過ごすことを考え、人にとっても愛犬にとっても「安全」「安心」「快適」な理想の住まいづくりをします。</p>
              </div>
              <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_living/img04.jpg" alt=""></div>
            </div>
            <article class="bottom">
              <div class="heading-a heading-a-ex articleheading">
                <h4 class="head"><span class="line">防音リフォームの<span class="c-orange">最新実例</span></span></h4>
              </div>
              <article class="articleListWrap">
    <?php
        $args= array(
          'tax_query' => array( 'relation' => 'OR',
              array(
                  'taxonomy' => 'housing_category',
                  'field' => 'slug',
                  'terms' => array('photo-renovation-pets')
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
                  <a href="<?php echo home_url(); ?>/housing_category/photo-renovation-pets">もっと見る</a>
                </div>
              </article>
            </article>
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
