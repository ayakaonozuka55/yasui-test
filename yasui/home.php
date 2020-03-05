<?php get_header(''); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo $url;
  }
?>

  <main class="top main">

    <div class="mv">
      <ul class="mv-item">
<?php
    $args= array(
       'post_type' => 'top'
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
<?php while (have_posts()) : the_post(); ?>
        <li><a href="<?php the_field('リンクurl'); ?>">
<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'top_size' );
echo '<img src="' . $thumbnail_image_url[0] . '" class="" style="">';
?>
				</a></li>
<?php endwhile; ?>
<?php wp_reset_query();endif; ?>
      </ul>
    </div>

    <article class="topnav">
      <div class="l-content-sm">
        <ul class="unordered">
          <li class="listitem"><a href="<?php echo home_url(); ?>/making"><span>注文住宅を建てたい方</span></a></li>
          <li class="listitem"><a href="<?php echo home_url(); ?>/making/reform"><span>リフォーム・リノベーション<br class="visible-xs">したい方</span></a></li>
          <li class="listitem"><a href="<?php echo home_url(); ?>/estate"><span>土地から探している方</span></a></li>
        </ul>
      </div>
    </article>
    <article class="top_event">
      <div class="l-content-sm">
        <div class="heading-a">
          <h2 class="head"><span class="line">最新の<span class="c-orange">イベント情報</span></span></h2>
        </div>
        <article class="articleListWrap">
<?php
date_default_timezone_set('Asia/Tokyo');
    $args= array(
		'post_type' => 'event',
		'posts_per_page' => '4',
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
            <li class="articleItem cf event-accepting articleItem-bgGray">
              <div class="imgwrap">
                <a href="<?php the_permalink() ?>" class="cf">
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
                </a>
              </div>
              <div class="content">
                <a href="<?php the_permalink() ?>">
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
					}
				}
				$cnt++;
	    }
	}
?>
                  </ul>
                </a>
              </div>
            </li>
<?php endwhile; ?>
          </ul>
<?php wp_reset_query();endif; ?>
          <div class="btn-e">
            <a href="<?php echo home_url(); ?>/event">もっと見る</a>
          </div>
        </article>
      </div>
    </article>
		<article class="top_news_area">
		<div class="l-content-sm cf">
		<article class="top_news">
          <h2 class="mainheading"><span class="c-orange">お知らせ・ニュース</span></h2>
<?php
    $args= array(
		'post_type' => 'post',
		'posts_per_page' => '4'
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
          <ul class="articleList">
<?php while (have_posts()) : the_post(); ?>
            <li class="articleItem cf">
              <div class="content">
                <div class="head cf">
                  <p class="day"><?php the_time('Y.m.d'); ?></p>
<?php
    $days=14; //NEWをつける日数
    $today=date_i18n('U');
    $entry=get_the_time('U');
    $sa=date('U',($today - $entry))/86400;
        if( $days > $sa ){
	        echo '<p class="new">NEW</p>';
        }else{
	        echo '';
		}
?>
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
					if($cnt < 2){
						echo '<li><span>'.$term_name.'</span></li>';
					}
				}
				$cnt++;
	    }
	}
?>
                  </ul>
                </div>
                <a href="<?php the_permalink() ?>">
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
                </a>
              </div>
            </li>
<?php endwhile; ?>
          </ul>
<?php wp_reset_query();endif; ?>
          <div class="btn-f">
            <a href="<?php echo home_url(); ?>/news-all/">一覧を見る</a>
          </div>
        </article>
		</div>
		</article>
    <article class="top_showroom">
      <div class="l-content-sm cf">
        <div class="left">
          <h2 class="heading">安井建設の家づくりを実際に体感！<br class="visible-sm visible-xs">お近くのモデルハウス・店舗へ</h2>
        </div>
        <div class="right">
          <div class="btn">
            <a href="<?php echo home_url(); ?>/showroom">モデルハウス・店舗一覧</a>
          </div>
        </div>
      </div>
    </article>
    <article class="top_case">
      <div class="l-content-sm">
        <div class="heading-a heading-a-ex">
          <h2 class="head"><span class="line">最新の<span class="c-orange">注文住宅建築実例</span></span></h2>
        </div>
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
	        echo '<li class="articleItem articleItem-bgGray">';
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
                </div>
              </a>
            </li>
<?php endwhile; ?>
          </ul>
<?php wp_reset_query();endif; ?>
          <div class="btn-e">
            <a href="<?php echo home_url(); ?>/housing_category/photo-customhome">もっと見る</a>
          </div>
          <div class="btn-a">
            <a href="<?php echo home_url(); ?>/housing_category/photo-renovation">リフォーム・リノベーション実例はこちら</a>
          </div>
        </article>
      </div>
    </article>
    <article class="top_making bg_thinorange">
      <div class="l-content-sm">
        <div class="heading-a">
          <h2 class="head"><span class="line">安井建設の<span class="c-orange">家づくり</span></span></h2>
          <h3 class="subhead">家族の笑顔と幸せをつくる家づくりを実現する商品ラインナップ</h3>
        </div>
        <ul class="unordered cf">
          <li class="listitem listitem-atelier">
            <a href="<?php echo home_url(); ?>/making/atelier_co_labo" class="cf">
              <div class="img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/making_atelier.jpg" alt=""></div>
              <div class="contain">
                <div class="contain_head">
                  <p class="contain_lead"><span>デザイン注文住宅</span></p>
                  <div class="contain_head_foot">
                    <span>
                      <h4 class="contain_heading">ATELIER CO LABO style</h4>
                      <h5 class="contain_heading_ja">アトリエコラボスタイル</h5>
                    </span>
                  </div>
                </div>
                <p class="contain_text">建築士とつくる鉄筋コンクリート（RC）・木造のデザイン注文住宅</p>
              </div>
            </a>
          </li>
          <li class="listitem listitem-rasia">
            <a href="<?php echo home_url(); ?>/making/rasia" class="cf">
              <div class="img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/making_rasia.jpg" alt=""></div>
              <div class="contain">
                <div class="contain_head">
                  <p class="contain_lead"><span>デザイン企画住宅</span></p>
                  <div class="contain_head_foot">
                    <span>
                      <h4 class="contain_heading">RASIA style</h4>
                      <h5 class="contain_heading_ja">ラシアスタイル</h5>
                    </span>
                  </div>
                </div>
                <p class="contain_text">自然素材をふんだんに使い自分らしい「暮らし」に合わせて、選べる４つのスタイル</p>
              </div>
            </a>
          </li>
          <li class="listitem listitem-buffet">
            <a href="<?php echo home_url(); ?>/making/bay" class="cf">
              <div class="img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/making_buffet.jpg" alt=""></div>
              <div class="contain">
                <div class="contain_head">
                  <p class="contain_lead"><span>注文住宅</span></p>
                  <div class="contain_head_foot">
                    <span>
                      <h4 class="contain_heading">BAY style</h4>
                      <h5 class="contain_heading_ja">ベイスタイル</h5>
                    </span>
                  </div>
                </div>
                <p class="contain_text">家族の暮らし方と住み心地を大切に、間取りや色、素材、形などひとつひとつにこだわりを。完全自由設計の注文住宅</p>
              </div>
            </a>
          </li>
          <li class="listitem listitem-fitty">
            <a href="<?php echo home_url(); ?>/making/fitty" class="cf">
              <div class="img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/making_fitty.jpg" alt=""></div>
              <div class="contain">
                <div class="contain_head">
                  <p class="contain_lead"><span>企画住宅</span></p>
                  <div class="contain_head_foot">
                    <span>
                      <h4 class="contain_heading">FITTY style</h4>
                      <h5 class="contain_heading_ja">フィッティースタイル</h5>
                    </span>
                  </div>
                </div>
                <p class="contain_text">厳選されたプランで高性能な仕様・性能をリーズナブルに実現した企画住宅</p>
              </div>
            </a>
          </li>
          <li class="listitem listitem-reform">
            <a href="<?php echo home_url(); ?>/making/reform" class="cf">
              <div class="img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/making_reform.jpg" alt=""></div>
              <div class="contain">
                <div class="contain_head">
                  <p class="contain_lead"></p>
                  <div class="contain_head_foot">
                    <span>
                      <h4 class="contain_heading">REFORM・RENOVATION</h4>
                      <h5 class="contain_heading_ja">リフォーム・リノベーション</h5>
                    </span>
                  </div>
                </div>
                <p class="contain_text">築年数が経過した家や中古住宅のリノベーションから水まわりや設備の部分フォームまで</p>
              </div>
            </a>
          </li>
        </ul>
        <div class="btn-e">
          <a href="<?php echo home_url(); ?>/making">商品ラインナップはこちら</a>
        </div>
      </div>
    </article>
    <article class="top_reason">
      <div class="l-content-sm">
        <div class="heading-a">
          <h2 class="head"><span class="line">安井建設が<span class="c-orange">選ばれる理由</span></span></h2>
          <h3 class="subhead">全国の工務店がお手本にする高い品質と性能、親切丁寧な家づくり</h3>
        </div>
        <ul class="unordered">
          <li class="listitem">
            <a href="<?php echo home_url(); ?>/reason/family">
              <div class="img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/reason_img01.jpg" alt=""></div>
              <h4 class="heading">家族の笑顔と絆をつくる家づくり</h4>
            </a>
          </li>
          <li class="listitem">
            <a href="<?php echo home_url(); ?>/reason/cost">
              <div class="img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/reason_img02.jpg" alt=""></div>
              <h4 class="heading">生涯コストを考えた家づくり</h4>
            </a>
          </li>
          <li class="listitem">
            <a href="<?php echo home_url(); ?>/reason/earthquake">
              <div class="img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/reason_img03.jpg" alt=""></div>
              <h4 class="heading">地震に強い家づくり</h4>
            </a>
          </li>
          <li class="listitem">
            <a href="<?php echo home_url(); ?>/reason/flow">
              <div class="img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/reason_img04.jpg" alt=""></div>
              <h4 class="heading">家づくりの流れ</h4>
            </a>
          </li>
        </ul>
        <div class="btn-e">
          <a href="<?php echo home_url(); ?>/reason">選ばれる理由をもっと見る</a>
        </div>
      </div>
    </article>
    <article class="top_instagram bg_thinpink">
      <div class="l-content-sm">
        <h2 class="heading">家族が幸せになる家づくりPhotoを<span>Instagram</span>でも公開中！</h2>
        <div>
          <?php echo do_shortcode('[instagram-feed user="yasui_kensetsu_konan"]'); ?>
        </div>
      </div>
    </article>
    <article class="top_voice bg_gray">
      <div class="l-content-sm">
        <div class="heading-a">
          <h2 class="head"><span class="line">安井建設で建てられた<span class="c-orange">お客様の声</span></span></h2>
          <h3 class="subhead">理想の住まいを実現</h3>
        </div>
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
                </div>
              </a>
            </li>
<?php endwhile; ?>
          </ul>
<?php wp_reset_query();endif; ?>
          <div class="btn-e">
            <a href="<?php echo home_url(); ?>/voice/">もっと見る</a>
          </div>
        </article>
      </div>
    </article>
    <article class="top_blog_column">
      <div class="l-content-sm cf">
        <article class="top_blog">
          <h2 class="mainheading"><span class="c-orange">スタッフブログ</span><span class="small">の最新記事</span></h2>

<?php
    $args= array(
		'post_type' => 'staffblog',
		'orderby' => 'date',
		'order' => 'desc',
		'posts_per_page' => '4'
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
          <ul class="articleList articleList-flat">
<?php while (have_posts()) : the_post(); ?>
<?php
	$upost = get_post($post);
	$curauth = get_userdata($upost->post_author);
	$user_login =	$curauth->user_login;
	$user_dec =	$curauth->description;
	$user_dis =	$curauth->display_name;
	$user_id  =	$curauth->ID;
	$user_nic =	$curauth->user_nicename;
	$user_url =	$curauth->user_url;
?>
            <li class="articleItem cf">
              <div class="imgwrap">
                <div class="img-staff">
<?php echo wp_get_attachment_image(get_field('スタッフ画像', 'user_'. $user_id ),'sq_size');?>
								</div>
                <a href="<?php the_permalink() ?>" class="cf">
                  <div class="img img-scale">
<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'index_size' );
if($thumbnail_image_url[0]){
	echo '<img src="' . $thumbnail_image_url[0] . '" class="" style="">';
}else{
	echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage.jpg" class="" style="">';
}
?>
									</div>
                </a>
              </div>
              <div class="content">
                <div class="head cf">
                  <p class="day"><?php the_time('Y.m.d'); ?></p>
                  <p class="name"><a href="<?php echo home_url(); ?>/author/<?php echo $user_nic;?>"><?php echo $user_dis;?></a></p>
                </div>
                <a href="<?php the_permalink() ?>">
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
                </a>
              </div>
            </li>
<?php endwhile; ?>
          </ul>
<?php wp_reset_query();endif; ?>
          <div class="btn-f">
            <a href="<?php echo home_url(); ?>/staffblog-all/">一覧を見る</a>
          </div>
        </article>
        <article class="top_column">
          <h2 class="mainheading"><span class="c-orange">家づくりコラム</span><span class="small">の最新記事</span></h2>
<?php
    $args= array(
		'post_type' => 'column',
		'orderby' => 'date',
		'order' => 'desc',
		'posts_per_page' => '4'
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
          <ul class="articleList articleList-flat">
<?php while (have_posts()) : the_post(); ?>
            <li class="articleItem cf">
              <div class="imgwrap">
                <a href="<?php the_permalink() ?>" class="cf">
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
                </a>
              </div>
              <div class="content">
                <div class="head cf">
                  <p class="day"><?php the_time('Y.m.d'); ?></p>
                </div>
                <a href="<?php the_permalink() ?>">
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
					if($cnt < 4){
						echo '<li><span>'.$term_name.'</span></li>';
					}
					$cnt++;
				}
	    }
	}
?>
                  </ul>
                </a>
              </div>
            </li>
<?php endwhile; ?>
          </ul>
<?php wp_reset_query();endif; ?>
          <div class="btn-f">
            <a href="<?php echo home_url(); ?>/column/">一覧を見る</a>
          </div>
        </article>
      </div>
    </article>
    <article class="top_news_sns">
      <div class="l-content-sm cf">
        <article class="top_sns">
          <div class="fb-container" id="pageplugin">
            <div class="fb-page" data-href="https://www.facebook.com/yasuikensetsu" data-tabs="timeline" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/yasuikensetsu" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/yasuikensetsu">安井建設株式会社（愛知県江南市　新築・リフォーム・耐震・太陽光等）</a></blockquote></div>
          </div>
          <div class="top_sns_bnr">
            <a href="https://www.instagram.com/yasui_kensetsu_konan/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/bnr_instagram.jpg" alt=""></a>
          </div>
        </article>
      </div>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>

  <article class="top_bottomnav">
    <ul class="unoreded">
      <li class="item">
        <a href="<?php echo home_url(); ?>/staff-auther-all">
          <span class="ja">スタッフ紹介</span>
          <span class="en">STAFF</span>
        </a>
      </li>
      <li class="item">
        <a href="<?php echo home_url(); ?>/about">
          <span class="ja">会社案内</span>
          <span class="en">COMPANY</span>
        </a>
      </li>
      <li class="item">
        <a href="<?php echo home_url(); ?>/faq">
          <span class="ja">よくあるご質問</span>
          <span class="en">FAQ</span>
        </a>
      </li>
      <li class="item">
        <a href="http://recruit-yasui-shinchiku.com/" target="_blank">
          <span class="ja">採用情報</span>
          <span class="en">RECRUIT</span>
        </a>
      </li>
    </ul>
  </article>
  <article class="top_bnr">
    <div class="l-content-sm">
<?php
    $args= array(
		'post_type' => 'banner',
		'posts_per_page' => '-1'
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
      <ul>
<?php while (have_posts()) : the_post(); ?>
        <li><a href="<?php the_field('リンクurl'); ?>" target="_blank"><img src="<?php the_field('画像'); ?>" alt="<?php echo $post->post_title;?>"></a></li>
<?php endwhile; ?>
      </ul>
<?php wp_reset_query();endif; ?>
    </div>
  </article>
  <article class="seotext">
    <div class="l-content-sm">
      <h2>家族が幸せに暮らせる家づくり、親切丁寧な仕事が評判です。<br>愛知県江南市で新築注文住宅、一戸建て、工務店なら当社にお任せください。</h2>
      <p>全国の「安くて、いい家」を提供したいと願う住宅会社150社とお互いに情報交換や切磋琢磨して完成した家をご提案。かっこよくておしゃれな家や、和モダン・シンプルモダンテイストなど、住まう人のこだわりや幸せな暮らしを実現する本格デザイン木造住宅・RCコンクリート住宅をご提供しています。安井建設が作る家は、ムリ、ムダ、ムラを徹底的に洗い出すことより品質、性能を落とすことなくコスト30％削減した「合理的新発想の家」。耐震等級3・ベタ基礎などの耐震性能、高耐火構造、高耐久構造、省エネ設計、健康にもこだわりました。安心してこだわりの家を完成させたい子育て世代の笑顔あふれる幸せな家族におすすめの家づくり、ぜひ展示場・ショールームにお越しいただきご体感ください。</p>
    </div>
  </article>


<?php get_footer(); ?>
