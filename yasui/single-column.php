<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<?php remove_filter('the_content', 'wpautop'); ?>
	<?php $content_txt = get_the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo "<img src='{$url}' class=''>";
  }
  function imgFromObj1($obj) {
    $url = $obj["url"];
    echo $url;
  }
$taxonomy_names = get_post_taxonomies();
$terms = get_the_terms($post->ID,$taxonomy_names[0]);
$postid = $post->ID;
foreach ( $terms as $term ) {
	if($term->parent == '0'){
		 $oyaname = $term->name;
		 $oyaslug = $term->slug;
		 $oyaid = $term->term_id;
		 break;
	}
}
foreach ( $terms as $term ) {
	if($term->parent == $oyaid){
		 $koname = $term->name;
		 $koslug = $term->slug;
		 break;
	}
}
$rand_terms = get_the_terms($post->ID,$taxonomy_names[0]);
foreach ( $rand_terms as $randterm ) {
	if($randterm->parent != '0'){
		 $randcate = $randterm->slug;
		 break;
	}
}
?>

	<!-- MAIM -->
  <main class="main staffblog detail">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/column/bg_head.jpg);">
      <div>家づくりコラム</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/column">家づくりコラム</a></li>
				<li><a href="<?php echo home_url(); ?>/column_category/<?php echo $oyaslug; ?>"><?php echo $oyaname; ?></a></li>
				<li><a href="<?php echo home_url(); ?>/column_category/<?php echo $koslug; ?>"><?php echo $koname; ?></a></li>
        <li><?php the_title(); ?></li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="archive">
            <div class="archive_body">
              <article class="articleListWrap">
                <div class="component c-detailhead c-detailhead-d cf">
                  <div class="foot cf">
                    <div class="content">
                      <h1 class="heading"><?php the_title(); ?></h1>
                      <div class="text">
                        <p><?php the_field('リード文'); ?></p>
                      </div>
<?php // 投稿に紐づくタームの一覧を表示
  $taxonomy_slug = 'column_category'; // 任意のタクソノミースラッグを指定
  $category_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // タームの情報を取得
  if(!empty($category_terms)){ // 変数が空でなければ true
    if(!is_wp_error($category_terms)){ // 変数が WordPress Error でなければ true
      echo '<ul class="category cf">';
      foreach($category_terms as $category_term){ // タームのループを開始
				if($category_term->parent != '0'){
        	echo '<li><a href="'.get_term_link($category_term->slug, $taxonomy_slug).'">'.$category_term->name.'</a></li>'; // タームをリンク付きで表示
				}
      } // ループの終了
      echo '</ul>';
    }
  }
?>
                      <p class="day"><?php the_time('Y.m.d'); ?></p>
                      <div class="sns-button">
                        <ul class="clearfix">
                          <li class="twitter">
                            <a href="javascript:window.open('https://twitter.com/share?text=<?php the_title(); ?>'+encodeURIComponent(document.title)+'&url=<?php echo get_the_permalink(); ?>'+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');" target="_blank" data-dialog-w="600">
                              <svg aria-hidden="true" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path class="fill" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                              </svg>
                            </a>
                          </li>
                          <li class="facebook">
                            <a href="javascript:window.open('https://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');" rel="nofollow" target="_blank" data-dialog-w="600">
                              <svg aria-hidden="true" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-9" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 264 512">
                                <path class="fill" d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"></path>
                              </svg>
                            </a>
                          </li>
                          <li class="hatebu">
                            <a href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php echo get_the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" rel="nofollow" data-dialog-w="1000">
                              <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" viewBox="0 0 355.004 300">
                                <g>
                                  <path class="fill" d="M280.009,0h70v200.005h-70V0z" />
                                  <path class="fill" d="M215.192,160.596c-11.844-13.239-28.314-20.683-49.443-22.288 c18.795-5.122,32.443-12.616,41.077-22.628c8.593-9.88,12.856-23.292,12.856-40.171c0-13.362-2.922-25.184-8.579-35.397 c-5.805-10.152-14.14-18.276-25.102-24.357c-9.586-5.274-20.98-8.994-34.262-11.188c-13.349-2.126-36.709-3.198-70.231-3.198H0 V298.63h83.976c33.737,0,58.064-1.182,72.94-3.441c14.863-2.337,27.334-6.27,37.428-11.662 c12.484-6.587,22.007-15.964,28.662-28.01c6.698-12.085,10.014-26.02,10.014-41.956 C233.017,191.514,227.079,173.798,215.192,160.596z M75.26,67.27h17.398c20.108,0,33.617,2.267,40.59,6.787 c6.877,4.542,10.388,12.38,10.388,23.547c0,10.745-3.733,18.313-11.118,22.751c-7.483,4.354-21.117,6.562-41.079,6.562H75.26 V67.27z M144.276,237.733c-7.916,4.862-21.557,7.251-40.696,7.251H75.265v-64.949h29.54c19.654,0,33.243,2.475,40.469,7.414 c7.343,4.942,10.955,13.665,10.955,26.191C156.226,224.85,152.263,232.899,144.276,237.733z" />
                                  <path class="fill" d="M315.014,220.003c-22.101,0-40.002,17.891-40.002,39.991 c0,22.1,17.902,40.006,40.002,40.006c22.072,0,39.99-17.906,39.99-40.006C355.004,237.894,337.088,220.003,315.014,220.003z" />
                                </g>
                              </svg>
                            </a>
                          </li>
                          <li class="line">
                            <a href="javascript:window.open('https://line.me/R/msg/text/?'+encodeURIComponent(document.title)+'%20'+encodeURIComponent(location.href),'sharewindow','width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=!');" target="_blank" data-dialog-w="600">
                              <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" width="313px" height="300px" viewBox="0 0 315 300">
                                <defs>
                                  <style>
                                    .fill {
                                      fill: #00c300;
                                    }
                                  </style>
                                </defs>
                                <path class="fill" d="M280.344,206.351 C280.344,206.351 280.354,206.351 280.354,206.351 C247.419,244.375 173.764,290.686 157.006,297.764 C140.251,304.844 142.724,293.258 143.409,289.286 C143.809,286.909 145.648,275.795 145.648,275.795 C146.179,271.773 146.725,265.543 145.139,261.573 C143.374,257.197 136.418,254.902 131.307,253.804 C55.860,243.805 0.004,190.897 0.004,127.748 C0.004,57.307 70.443,-0.006 157.006,-0.006 C243.579,-0.006 314.004,57.307 314.004,127.748 C314.004,155.946 303.108,181.342 280.344,206.351 Z" /><path class="fill_line" d="M253.185,121.872 C257.722,121.872 261.408,125.569 261.408,130.129 C261.408,134.674 257.722,138.381 253.185,138.381
          C253.185,138.381 230.249,138.381 230.249,138.381 C230.249,138.381 230.249,153.146 230.249,153.146 C230.249,153.146 253.185,153.146 253.185,153.146 C257.710,153.146 261.408,156.851 261.408,161.398 C261.408,165.960 257.710,169.660 253.185,169.660 C253.185,169.660 222.018,169.660 222.018,169.660 C217.491,169.660 213.795,165.960 213.795,161.398 C213.795,161.398 213.795,130.149 213.795,130.149 C213.795,130.139 213.795,130.139 213.795,130.129 C213.795,130.129 213.795,130.114 213.795,130.109 C213.795,130.109 213.795,98.878 213.795,98.878 C213.795,98.858 213.795,98.850 213.795,98.841 C213.795,94.296 217.486,90.583 222.018,90.583 C222.018,90.583 253.185,90.583 253.185,90.583 C257.722,90.583 261.408,94.296 261.408,98.841 C261.408,103.398 257.722,107.103 253.185,107.103 C253.185,107.103 230.249,107.103 230.249,107.103 C230.249,107.103 230.249,121.872 230.249,121.872 C230.249,121.872 253.185,121.872 253.185,121.872 ZM202.759,161.398 C202.759,164.966 200.503,168.114 197.135,169.236 C196.291,169.521 195.405,169.660 194.526,169.660 C191.956,169.660 189.502,168.431 187.956,166.354 C187.956,166.354 156.012,122.705 156.012,122.705 C156.012,122.705 156.012,161.398 156.012,161.398 C156.012,165.960 152.329,169.660 147.791,169.660 C143.256,169.660 139.565,165.960 139.565,161.398 C139.565,161.398 139.565,98.841 139.565,98.841 C139.565,95.287 141.829,92.142 145.192,91.010 C146.036,90.730 146.915,90.583 147.799,90.583 C150.364,90.583 152.828,91.818 154.366,93.894 C154.366,93.894 186.310,137.559 186.310,137.559 C186.310,137.559 186.310,98.841 186.310,98.841 C186.310,94.296 190.000,90.583 194.536,90.583 C199.073,90.583 202.759,94.296 202.759,98.841 C202.759,98.841 202.759,161.398 202.759,161.398 ZM127.737,161.398 C127.737,165.960 124.051,169.660 119.519,169.660 C114.986,169.660 111.300,165.960 111.300,161.398 C111.300,161.398 111.300,98.841 111.300,98.841 C111.300,94.296 114.986,90.583 119.519,90.583 C124.051,90.583 127.737,94.296 127.737,98.841 C127.737,98.841 127.737,161.398 127.737,161.398 ZM95.507,169.660 C95.507,169.660 64.343,169.660 64.343,169.660 C59.816,169.660 56.127,165.960 56.127,161.398 C56.127,161.398 56.127,98.841 56.127,98.841 C56.127,94.296 59.816,90.583 64.343,90.583 C68.881,90.583 72.564,94.296 72.564,98.841 C72.564,98.841 72.564,153.146 72.564,153.146 C72.564,153.146 95.507,153.146 95.507,153.146 C100.047,153.146 103.728,156.851 103.728,161.398 C103.728,165.960 100.047,169.660 95.507,169.660 " />
                              </svg>
                            </a>
                          </li>
                          <li class="pocket">
                            <a href="https://getpocket.com/edit?url=<?php echo get_the_permalink(); ?>&title=<?php the_title(); ?>" rel="nofollow" rel="nofollow" target="_blank" data-dialog-w="600">
                              <svg aria-hidden="true" data-prefix="fab" data-icon="get-pocket" class="svg-inline--fa fa-get-pocket fa-w-14" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path class="fill" d="M407.6 64h-367C18.5 64 0 82.5 0 104.6v135.2C0 364.5 99.7 464 224.2 464c124 0 223.8-99.5 223.8-224.2V104.6c0-22.4-17.7-40.6-40.4-40.6zm-162 268.5c-12.4 11.8-31.4 11.1-42.4 0C89.5 223.6 88.3 227.4 88.3 209.3c0-16.9 13.8-30.7 30.7-30.7 17 0 16.1 3.8 105.2 89.3 90.6-86.9 88.6-89.3 105.5-89.3 16.9 0 30.7 13.8 30.7 30.7 0 17.8-2.9 15.7-114.8 123.2z"></path>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="img">
<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'index_size' );
	if($thumbnail_image_url){
		echo '<img src="' . $thumbnail_image_url[0] . '" class="" style="">';
	}else{
		echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage.jpg" class="" style="">';
	}
?>
										</div>
                  </div>
                </div>
<!--
                <div class="component tableofcontentsArea">
                  <ol class="numberList table-of-contents">
                    <li><a href="#">記事タイトルが入ります。</a>
                      <ul>
                        <li><a href="#">小見出しのタイトルが入ります。</a></li>
                      </ul>
                    </li>

                    <li><a href="#">記事タイトルが入ります。</a>
                      <ul>
                        <li><a href="#">小見出しのタイトルが入ります。</a></li>
                      </ul>
                    </li>
                  </ol>
                </div>
-->

<?php
// TOC Plus Alt (1/2)
// ※kiji_areaのh2,h3にも細工してあります。
$topplus_id_prefix = 'tocplus-i-';
$tocplus_id_num = 0;
$tocplus_lv_num = [0,0,0,0,0,0,0]; // label num of h0 (pseudo), h1,h2,h3,h4,h5,h6
$tocplus_lv_current = 0;
$tocplus_lv_before  = 0;
$tocplus_html = '';
$tocplus_html .= '<div class="component tableofcontentsArea">'."\n";
$tocplus_html .= '  <ol class="numberList table-of-contents">'."\n";
if (have_rows('コンポーネント')) {
  while (have_rows('コンポーネント')) {
    the_row();
    $tocplus_lv_current = 0;
    switch (get_row_layout()) {
      case '大見出し': $tocplus_lv_current = 1; break;
      case '中見出し': $tocplus_lv_current = 2; break;
      case 'h3_ttl_area': $tocplus_lv_current = 3; break;
      case 'h4_ttl_area': $tocplus_lv_current = 4; break;
      case 'h5_ttl_area': $tocplus_lv_current = 5; break;
      case 'h6_ttl_area': $tocplus_lv_current = 6; break;
    }
    if (!$tocplus_lv_current) continue;
    if ($tocplus_lv_before != $tocplus_lv_current) {
      for ($i=$tocplus_lv_current+1; $i<=6; $i++) {
        $tocplus_lv_num[$i] = 0;
      }
    }
    $tocplus_lv_num[$tocplus_lv_current]++;
    $num = implode('-', array_filter($tocplus_lv_num, function($i){ return ($i === 0) ? false : true; }));
//    $title = get_sub_field('h'.$tocplus_lv_current.'_ttl');
		if( get_row_layout() == '大見出し' ){
			$title = get_sub_field('大見出し');
    	$tocplus_html .= '    <li class=""><a href="#'.$topplus_id_prefix.$tocplus_id_num.'"class=""><span class="toc_number toc_depth_'.$tocplus_lv_current.'">'.$num.'</span> '.$title.'</a></li>'."\n";
		}elseif( get_row_layout() == '中見出し' ){
			$title = get_sub_field('中見出し');
    	$tocplus_html .= '    <li class=""><a href="#'.$topplus_id_prefix.$tocplus_id_num.'"class=""><span class="toc_number toc_depth_'.$tocplus_lv_current.'">'.$num.'</span> '.$title.'</a></li>'."\n";
		}
    $tocplus_lv_before = $tocplus_lv_current;
    $tocplus_id_num++;
  }
}
$tocplus_html .= '  </ol>'."\n";
$tocplus_html .= '</div>'."\n";
echo $tocplus_html;
?>

<?php
// TOC Plus Alt (2/2)
$tocplus_id_num = 0;
?>
<?php if( have_rows('コンポーネント') ): ?>
<?php while ( have_rows('コンポーネント') ) : the_row(); ?>
<?php if( get_row_layout() == '大見出し' ): ?>
          <div class="component c-mainheading" <?php echo 'id="'.$topplus_id_prefix.$tocplus_id_num.'"'; ?>>
            <h2 class="head"><?php the_sub_field('大見出し'); ?></h2>
						<?php $tocplus_id_num++; ?>
          </div>

<?php elseif( get_row_layout() == '中見出し' ): ?>
          <div class="component c-middleheading" <?php echo 'id="'.$topplus_id_prefix.$tocplus_id_num.'"'; ?>>
            <h3 class="head"><?php the_sub_field('中見出し'); ?></h3>
						<?php $tocplus_id_num++; ?>
          </div>

<?php elseif( get_row_layout() == '小見出し' ): ?>
          <div class="component c-subheading">
            <h4 class="head"><?php the_sub_field('小見出し'); ?></h4>
          </div>

<?php elseif( get_row_layout() == 'テキストエリア' ): ?>
          <div class="component c-text">
            <?php the_sub_field('テキストエリア'); ?>
          </div>

<?php elseif( get_row_layout() == 'リンクボタン' ): ?>
          <div class="component c-btn btn-a">
            <a href="<?php the_sub_field('リンク先url'); ?>"><?php the_sub_field('リンク名'); ?></a>
          </div>

<?php elseif( get_row_layout() == '画像' ): ?>
          <div class="component c-img-col1">
            <div class="img">
              <?php imgFromObj(get_sub_field('画像')); ?>
              <p class="caption"><?php the_sub_field('キャプション'); ?></p>
            </div>
          </div>

<?php elseif( get_row_layout() == '2列画像' ): ?>
          <div class="component c-img-col2">
            <div class="img">
              <?php imgFromObj(get_sub_field('画像①')); ?>
              <p class="caption"><?php the_sub_field('キャプション①'); ?></p>
            </div>
            <div class="img">
              <?php imgFromObj(get_sub_field('画像②')); ?>
              <p class="caption"><?php the_sub_field('キャプション②'); ?></p>
            </div>
          </div>

<?php elseif( get_row_layout() == 'youtube' ): ?>
          <div class="component c-movie">
            <div class="inner">
               <?php the_sub_field('youtube'); ?>
            </div>
            <p class="caption"><?php the_sub_field('キャプション'); ?></p>
          </div>

<?php elseif( get_row_layout() == 'googlemap' ): ?>
          <div class="component c-map">
            <div class="inner">
              <?php the_sub_field('googlemap'); ?>
            </div>
            <p class="caption"><?php the_sub_field('キャプション'); ?></p>
          </div>

<?php elseif( get_row_layout() == 'ギャラリー' ): ?>
          <div class="component c-gallery">
            <div class="gallery_list">
						<?php while ( have_rows('ギャラリー') ) : the_row(); ?>
<?php
 $attachment_id = get_sub_field('画像');
 $size1 = "full";
 $size2 = "sq_size";
 $image1 = wp_get_attachment_image_src( $attachment_id, $size1 );
 $image2 = wp_get_attachment_image_src( $attachment_id, $size2 );
?>
              <div class="item">
                <a href="<?php echo $image1[0]; ?>" class="galley_trigger" data-group="gallery01">
								<img src="<?php echo $image2[0]; ?>" alt="">
								</a>
                <p class="caption"><?php the_sub_field('キャプション'); ?></p>
              </div>
						<?php endwhile; ?>
            </div>
          </div>

<?php elseif( get_row_layout() == 'おすすめ記事' ): ?>
<?php
$posts = get_sub_field('おすすめ記事');
if( $posts ):
?>
	<?php foreach( $posts as $val ): ?>
          <div class="component c-reccomend">
            <div class="img">
<?php
$gazou_id = get_the_post_thumbnail_url( $val->ID, 'index_size' );
if($gazou_id){
	echo '<img src="' . $gazou_id . '" style="">';
}else{
}
?>
						</div>
            <div class="content">
              <h4 class="heading"><?php echo get_the_title( $val->ID ); ?></h4>
              <div class="c-text"><p>
<?php
    $content = get_page($val->ID);
if(mb_strlen($content->post_content, 'UTF-8')>40){
    $content= mb_substr(strip_tags(apply_filters('the_content', $content->post_content), '<br><span>'), 0,40, 'UTF-8');
    echo $content.'…';
}else{
    echo strip_tags(apply_filters('the_content', $content->post_content), '<br><span>');
}
?>
							</p></div>
              <div class="btn-c"><a href="<?php echo get_permalink( $val->ID ); ?>">もっと見る</a></div>
            </div>
          </div>
	<?php endforeach; ?>
<?php endif; ?>

<?php elseif( get_row_layout() == '日程' ): ?>
          <div class="component c-agenda">
						<table>
							<tbody>
								<tr>
									<th>日程</th>
									<td><?php the_sub_field('日程'); ?></td>
								</tr>
								<tr>
									<th>時間</th>
									<td><?php the_sub_field('時間'); ?></td>
								</tr>
								<tr>
									<th>住所</th>
									<td><?php the_sub_field('住所'); ?></td>
								</tr>

								<?php while ( have_rows('その他') ) : the_row(); ?>
								<tr>
									<th><?php the_sub_field('表題'); ?></th>
									<td><?php the_sub_field('テキストエリア'); ?></td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
          </div>

	<?php elseif( get_row_layout() == '写真テキスト' ): ?>
		<?php
		$imgtext = get_sub_field('並び順');
		if ($imgtext == 'imgtext'){
	    echo '<div class="component c-imgtext">';
		} else {
	    echo '<div class="component c-imgtext c-imgtext-re">';
		}
		?>
			<div class="img">
				<?php imgFromObj(get_sub_field('画像')); ?>
			</div>
			<div class="c-text">
				<?php the_sub_field('テキストエリア'); ?>
			</div>
		</div>



<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

                <div class="entry_item">
                  <div class="horizontalLine"></div>
                </div>

                <div class="component c-tag">
                  <ul class="tag">
<?php
	$terms = get_the_terms($postid,'column_tag');
	if($terms){
	    foreach ($terms as $cate) {
	      $term_name = $cate->name;
	      $term_slug = $cate->slug;
	      $term_oya = $cate->parent;
				echo '<li class="item"><a href="/column_tag/'.$term_slug.'">'.$term_name.'</a></li>';
	    }
	}
?>
                  </ul>
                </div>

<?php
$staffs = get_the_terms($post->ID,'column_author');
if($staffs):
    foreach ($staffs as $staff) {
        $staff_name = $staff->name;
        $staff_slug = $staff->slug;
        $staff_id = $staff->term_id;
    }
$image = get_field('画像','column_author_'.$staff_id);
?>
                <div class="component c-line">
                  <div></div>
                </div>
                <div class="component c-author">
                  <div class="img"><img src="<?php echo $image["sizes"]["sq_size"]; ?>" alt=""></div>
                  <div class="content">
                    <div class="authorhead cf">
                      <h4 class="authorname"><?php echo $staff_name; ?></h4>
                    </div>
                    <div class="c-text">
                      <p><?php echo term_description($staff_id); ?></p>
                    </div>
			              <div class="btn-c"><a href="<?php echo home_url(); ?>/column_author/<?php echo $staff_slug;?>">この著者が書いた<br class="visible-xs">コラム一覧を見る</a></div>
                  </div>
                </div>
<?php else:?>
                <div class="component c-line">
                  <div></div>
                </div>
                <div class="component c-author">
                  <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/column/default.gif" alt=""></div>
                  <div class="content">
                    <div class="authorhead cf">
                      <h4 class="authorname">安井建設編集部</h4>
                    </div>
                    <div class="c-text">
                      <p>注文住宅のこと、間取りのこと、構造のこと、暮らし方のことなど、家づくりにまつわるお役立ち情報を発信していきます。</p>
                    </div>
                  </div>
                </div>
<?php endif;?>

                <div class="component c-reccomendRelation">
                  <h2 class="head">人気のコラム</h2>
<?php
    $args= array(
    'tax_query' => array(
      array(
					'taxonomy' => 'column_category',
          'field' => 'slug',
          'terms' => $randcate
      ),
    ),
		'post_type' => 'column',
		'orderby' => 'rand',
		'posts_per_page'=>'3',
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
                  <ul class="articleList articleList-lengthwise">
<?php while (have_posts()) : the_post(); ?>
                    <li class="articleItem">
                      <a href="<?php the_permalink(); ?>">
                        <div class="img img-scale">
<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'index_size' );
	if($thumbnail_image_url){
		echo '<img src="' . $thumbnail_image_url[0] . '" class="" style="">';
	}else{
		echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage220.png" class="" style="">';
	}
?>
                        </div>
                        <div class="content">
                          <p class="day"><?php the_time('Y.m.d'); ?></p>
                          <h5 class="heading">
<?php
if(mb_strlen($post->post_title, 'UTF-8')>20){
	$title= mb_substr($post->post_title, 0, 20, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?>
													</h5>
                          <p class="text">
<?php
    $content = get_field('リード文');
if(mb_strlen($content, 'UTF-8')>28){
    $content= mb_substr(strip_tags($content, '<br><span>'), 0,28, 'UTF-8');
    echo $content.'…';
}else{
    echo strip_tags($$content, '<br><span>');
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
					$cnt++;
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
								</div>
								<div class="single_excursion_bnr_area">
								<?php include('tenp-excursion_bnr.php'); ?>
								</div>
                <div class="articleLikeBox cf">
<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'sns_size' );
	if($thumbnail_image_url){
		echo '<div class="articleLikeBox_thumb" style="background-image:url(' . $thumbnail_image_url[0] . ');"></div>';
	}else{
		echo '<div class="articleLikeBox_thumb" style="background-image:url(<?php echo get_template_directory_uri(); ?>/wp/wp-content/themes/yasui/assets/images/common/noimage.jpg);"></div>';
	}
?>
                  <div class="articleLikeBox_main">
                    <p class="articleLikeBox_title">この記事が気に入ったら<br>いいね！しよう</p>
                    <div class="articleLikeBox_button">
                      <div class="fb-like" data-href="https://www.facebook.com/yasuikensetsu/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                    </div>
                    <div class="articleLikeBox_text"><?php the_title(); ?></div>
                  </div>
                </div>
			          <div class="detailpager">
			            <ul>
			<?php if (get_previous_post()):?>
			              <li class="detailpager_prev"><a href=""><?php previous_post_link('%link','前の記事へ'); ?></a></li>
			<?php endif; ?>
			              <li class="detailpager_top"><a href="<?php echo home_url(); ?>/column">記事一覧に<br>戻る</a></li>
			<?php if (get_next_post()):?>
			              <li class="detailpager_next"><a href=""><?php next_post_link('%link','次の記事へ'); ?></a></li>
			<?php endif; ?>
			            </ul>
			          </div>
              </article>
            </div>
          </div>
        </article>
				<!-- TENP -->
				<?php include('side_column.php'); ?>
      </div>
    </article>
  </main>

	<!-- TENP -->
	<?php include('maincv.php'); ?>


<?php get_footer(); ?>
