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
$postid = $post->ID;
?>
<?php
$post = get_post($post_id);
$curauth = get_userdata($post->post_author);
$user_login =	$curauth->user_login;
$user_dec =	$curauth->description;
$user_dis =	$curauth->display_name;
$user_id  =	$curauth->ID;
$user_nic =	$curauth->user_nicename;
$user_url =	$curauth->user_url;
$cr_study = get_field('肩書き', 'user_'. $user_id );
?>
	<!-- MAIM -->
  <main class="main staffblog detail">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/staffblog/bg_head.jpg);">
      <div>スタッフブログ</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/staffblog/">スタッフブログ</a></li>
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
                <p class="name"><a href="<?php echo home_url(); ?>/author/<?php echo $user_nic;?>"><?php echo $user_dis;?></a></p>
              </div>
              <h1 class="detailheading"><?php the_title(); ?></h1>
            </div>
<?php
	$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
	if($thumbnail_image_url){
    echo '        <div class="img">';
		echo '					<img src="' . $thumbnail_image_url[0] . '" class="" style="">';
    echo '        </div>';
	}else{
    echo '        <div class="img">';
		echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage.jpg" class="" style="">';
    echo '        </div>';
	}
?>
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


          <div class="component c-author">
            <div class="img"><span><?php echo wp_get_attachment_image(get_field('スタッフ画像', 'user_'. $user_id ),'sq_size');?></span></div>
            <div class="content">
              <h4>この記事を書いたスタッフ</h4>
              <div class="authorhead cf">
                <h5 class="authorname"><?php echo $user_dis;?></h5>
                <p><?php echo $cr_study;?></p>
              </div>
              <div class="c-text"><p><?php echo $user_dec;?></p></div>
              <div class="btn-c"><a href="<?php echo home_url(); ?>/staffblog-auther?auther=<?php echo $user_id;?>">このスタッフが書いた<br class="visible-xs">ブログ一覧を見る</a></div>
              <div class="btn-c"><a href="<?php echo home_url(); ?>/author/<?php echo $user_nic;?>">このスタッフの<br class="visible-xs">プロフィールを見る</a></div>
            </div>
          </div>

          <div class="detailpager">
            <ul>
<?php if (get_previous_post()):?>
              <li class="detailpager_prev"><a href=""><?php previous_post_link('%link','前の記事へ'); ?></a></li>
<?php endif; ?>
              <li class="detailpager_top"><a href="<?php echo home_url(); ?>/staffblog">記事一覧に<br>戻る</a></li>
<?php if (get_next_post()):?>
              <li class="detailpager_next"><a href=""><?php next_post_link('%link','次の記事へ'); ?></a></li>
<?php endif; ?>
            </ul>
          </div>

        </article>
				<!-- TENP -->
				<?php include('side_staffblog.php'); ?>
      </div>
		</article>
		<?php include('tenp-excursion_bnr.php'); ?>
  </main>

	<!-- TENP -->
	<?php include('maincv.php'); ?>
	<?php include('latest_event.php'); ?>


<?php get_footer(); ?>
