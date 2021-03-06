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
?>
	<!-- MAIM -->
  <main class="main award detail main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/about/award/bg_head.jpg);">
      <div>受賞歴・メディア情報</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/about/">会社概要と社長のコメント</a></li>
        <li><a href="<?php echo home_url(); ?>/media/">受賞歴・メディア情報</a></li>
				<li><a href="<?php echo home_url(); ?>/media_category/<?php echo $terms[0]->slug; ?>"><?php echo $terms[0]->name; ?></a></li>
        <li><?php the_title(); ?></li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="component c-detailhead c-detailhead-a cf">
            <div class="content">
              <div class="head cf">
                <p class="day"><?php the_time('Y.m.d'); ?></p>
<?php // 投稿に紐づくタームの一覧を表示
  $taxonomy_slug = 'media_category'; // 任意のタクソノミースラッグを指定
  $category_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // タームの情報を取得
  if(!empty($category_terms)){ // 変数が空でなければ true
    if(!is_wp_error($category_terms)){ // 変数が WordPress Error でなければ true
      echo '<ul class="category cf">';
      foreach($category_terms as $category_term){ // タームのループを開始
        echo '<li><a href="'.get_term_link($category_term->slug, $taxonomy_slug).'">'.$category_term->name.'</a></li>'; // タームをリンク付きで表示
      } // ループの終了
      echo '</ul>';
    }
  }
?>
              </div>
              <h1 class="detailheading"><?php the_title(); ?></h1>
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
<?php if( have_rows('コンポーネント') ): ?>
<?php while ( have_rows('コンポーネント') ) : the_row(); ?>
<?php if( get_row_layout() == '大見出し' ): ?>
          <div class="component c-mainheading">
            <h2 class="head"><?php the_sub_field('大見出し'); ?></h2>
          </div>

<?php elseif( get_row_layout() == '中見出し' ): ?>
          <div class="component c-middleheading">
            <h3 class="head"><?php the_sub_field('中見出し'); ?></h3>
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

          <div class="detailpager">
            <ul>
<?php if (get_previous_post()):?>
							<li class="detailpager_prev"><?php previous_post_link('%link','前の記事へ'); ?></li>
<?php endif; ?>
              <li class="detailpager_top"><a href="">記事一覧に<br>戻る</a></li>
<?php if (get_next_post()):?>
							<li class="detailpager_next"><?php next_post_link('%link','次の記事へ'); ?></li>
<?php endif; ?>
            </ul>
          </div>

        </article>
				<!-- TENP -->
				<?php include('side_award.php'); ?>
      </div>
    </article>
		<!-- TENP -->
		<?php include('nav_about.php'); ?>
  </main>


	<!-- TENP -->
	<?php include('maincv.php'); ?>


<?php get_footer(); ?>
