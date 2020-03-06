<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<?php remove_filter('the_content', 'wpautop'); ?>
	<?php $content_txt = get_the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo "<img src='{$url}' class='section_thumb-img'>";
  }
  function imgFromObj1($obj) {
    $url = $obj["url"];
    echo "<img src='{$url}' class=''>";
  }
  function imgFromObj2($obj) {
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
?>


	<!-- MAIM -->
  <main class="main staffblog detail">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/case_voice/case/bg_head.jpg);">
      <div>注文住宅建築実例</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/case_voice/">お家の実例・お客様の声</a></li>
        <li><a href="<?php echo home_url(); ?>/housing/">注文住宅建築実例</a></li>
				<li><a href="<?php echo home_url(); ?>/housing_category/<?php echo $oyaslug; ?>"><?php echo $oyaname; ?></a></li>
				<li><a href="<?php echo home_url(); ?>/housing_category/<?php echo $koslug; ?>"><?php echo $koname; ?></a></li>
        <li><?php the_title(); ?></li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="component c-detailhead c-detailhead-c cf">
            <h1 class="heading"><?php the_title(); ?></h1>
            <h2 class="subheading"><?php the_field('サブタイトル'); ?></h2>
            <div class="foot cf">
              <div class="content">
                <div class="text">
                  <?php the_field('リード文'); ?>
                </div>
<?php // 投稿に紐づくタームの一覧を表示
  $taxonomy_slug = 'housing_category'; // 任意のタクソノミースラッグを指定
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
          <div class="component c-table">
            <table class="table">
							<?php if(get_field('所在地')):?>
	              <tr>
	                <th class="head">所在地</th>
	                <td class="body"><?php the_field('所在地'); ?></td>
	              </tr>
							<?php endif;?>
							<?php if(get_field('主要用途')):?>
	              <tr>
	                <th class="head">主要用途</th>
	                <td class="body"><?php the_field('主要用途'); ?></td>
	              </tr>
							<?php endif;?>
							<?php if(get_field('敷地面積')):?>
	              <tr>
	                <th class="head">敷地面積</th>
	                <td class="body"><?php the_field('敷地面積'); ?></td>
	              </tr>
							<?php endif;?>
							<?php if(get_field('延床面積')):?>
	              <tr>
	                <th class="head">延べ床面積</th>
	                <td class="body"><?php the_field('延床面積'); ?></td>
	              </tr>
							<?php endif;?>
							<?php if(get_field('床面積')):?>
	              <tr>
	                <th class="head">床面積</th>
	                <td class="body"><?php the_field('床面積'); ?></td>
	              </tr>
							<?php endif;?>
							<?php if( have_rows('その他') ): ?>
								<?php while ( have_rows('その他') ) : the_row(); ?>
	              <tr>
	                <th class="head"><?php the_sub_field('表題'); ?></th>
	                <td class="body"><?php the_sub_field('テキスト'); ?></td>
	              </tr>
								<?php endwhile; ?>
							<?php endif; ?>
            </table>
          </div>

<?php if( have_rows('コンポーネント') ): ?>
<?php while ( have_rows('コンポーネント') ) : the_row(); ?>
<?php if( get_row_layout() == '内容' ): ?>
          <div class="component c-gallery">
						<?php if(get_sub_field('見出し')):?>
	            <div class="heading-b">
	              <h4 class="head"><?php the_sub_field('見出し'); ?></h4>
	            </div>
						<?php endif; ?>
						<?php if(get_sub_field('テキストエリア')):?>
	            <div class="c-text">
	              <?php the_sub_field('テキストエリア'); ?>
	            </div>
						<?php endif; ?>
						<?php if( have_rows('ギャラリー') ): ?>
	            <div class="gallery_list">
								<?php while ( have_rows('ギャラリー') ) : the_row(); ?>
		              <div class="item">
<?php
 $attachment_id = get_sub_field('画像');
 $size1 = "full";
 $size2 = "sq_size";
 $image1 = wp_get_attachment_image_src( $attachment_id, $size1 );
 $image2 = wp_get_attachment_image_src( $attachment_id, $size2 );
?>
		                <a href="<?php echo $image1[0]; ?>" class="galley_trigger" data-group="gallery01">
											<img src="<?php echo $image2[0]; ?>" class="" style="">
										</a>
		                <p class="caption"><?php the_sub_field('キャプション'); ?></p>
		              </div>
								<?php endwhile; ?>
	            </div>
						<?php endif; ?>
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
              <div class="c-text">
<?php
  $content = get_page($val->ID);
	if(mb_strlen($content->post_content, 'UTF-8')>40){
	    $content= mb_substr(strip_tags(apply_filters('the_content', $content->post_content), '<br><span>'), 0,40, 'UTF-8');
	    echo $content.'…';
	}else{
	    echo strip_tags(apply_filters('the_content', $content->post_content), '<br><span>');
	}
?>
              </div>
              <div class="btn-c"><a href="<?php echo get_permalink( $val->ID ); ?>">もっと見る</a></div>
            </div>
          </div>
	<?php endforeach; ?>
<?php endif; ?>

<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<?php
$posts = get_field('お客様の声');
if( $posts ):
?>
	<?php foreach( $posts as $val ): ?>
          <div class="component c-case">
            <h4 class="head">この実例のお客様の声</h4>
            <div class="foot cf">
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
                <h5 class="subhead"><?php echo get_the_title( $val->ID ); ?></h5>
                <div class="text"><p>
<?php
    $content = get_post_meta($val->ID, 'リード文', true);
if(mb_strlen($content, 'UTF-8')>86){
    $content= mb_substr(strip_tags($content, '<br><span>'), 0,86, 'UTF-8');
    echo $content.'…';
}else{
    echo strip_tags($$content, '<br><span>');
}
?>
                </p></div>
                <div class="btn-c"><a href="<?php echo get_permalink( $val->ID ); ?>">もっと見る</a></div>
              </div>
            </div>
          </div>
	<?php endforeach; ?>
<?php endif; ?>

          <div class="component c-tag">
            <ul class="tag">
<?php
	$p_taxonomy_names = get_post_taxonomies();
	$p_terms = get_the_terms($postid,$p_taxonomy_names[1]);
	if($p_terms){
	    foreach ($p_terms as $pcate) {
	        $pterm_name = $pcate->name;
	        $pterm_slug = $pcate->slug;
					$cat_link = get_term_link($pterm_slug,'housing_tag');
					echo '<li class="item"><a href="' . $cat_link . '">'.$pterm_name.'</a></li>';
	    }
	}
?>
            </ul>
          </div>

          <div class="component c-reccomendRelation">
            <h4 class="head">関連おすすめ建築実例</h4>
<?php
    $args= array(
		'post_type' => 'housing',
		'orderby' => 'rand',
		'posts_per_page'=>'6',
		'tax_query' => array('relation' => 'AND',
			array(	'taxonomy'=>'housing_category',
					'terms' => array($termslug),
					'include_children' => true,
					'field' => 'slug',
					'operator' => 'AND'
				)
		)
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
                  </div>
                </a>
              </li>
<?php endwhile; ?>
            </ul>
<?php wp_reset_query();endif; ?>
          </div>

					<!-- TENP -->
					<?php include('choose_case.php'); ?>

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

        </article>

				<!-- TENP -->
				<?php include('side_case.php'); ?>
      </div>
		</article>
		<?php include('tenp-excursion_bnr.php'); ?>
  </main>

	<!-- TENP -->
	<?php include('maincv.php'); ?>


<?php get_footer(); ?>
