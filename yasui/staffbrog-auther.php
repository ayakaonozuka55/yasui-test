<?php
/*
Template Name: STAFF BLOG 個人表示用テンプレート
*/
?>
<?php get_header(''); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo $url;
  }
?>
<?php
	$autherid = $_GET['auther'];
	$curauth  = get_userdata($autherid);
	$user_login =	$curauth->user_login;
	$user_dec =	$curauth->description;
	$user_dis =	$curauth->display_name;
	$user_id  =	$curauth->ID;
	$user_nic =	$curauth->user_nicename;
	$user_url =	$curauth->user_url;
?>
  <main class="main staffblog">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/staffblog/bg_head.jpg);">
      <div>スタッフブログ</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/staffblog-all/">スタッフブログ</a></li>
        <li><?php echo $user_dis;?>のブログ記事一覧</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="lead lead-a">
            <h1 class="lead-a_heading lead_heading"><?php echo $user_dis;?>のブログ記事一覧</h1>
            <div class="text">
              <p><?php echo $user_dis;?>の家づくりの裏話やプライベートで日々思うことをブログで更新中！</p>
            </div>
          </div>
          <article class="articleListWrap">
            <ul class="articleList articleList-flat">
<?php
    $args= array(
		'post_type' => 'staffblog',
		'author' => $autherid,
		'orderby' => 'date',
		'order' => 'desc',
		'paged' => $paged
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
<?php while (have_posts()) : the_post(); ?>

	            <li class="articleItem cf">
	              <div class="imgwrap">
	                <div class="img-staff">
<?php echo wp_get_attachment_image(get_field('スタッフ画像', 'user_'. $autherid ),'sq_size');?>
									</div>
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
	                  <p class="name"><a href="<?php echo home_url(); ?>/author/<?php echo $user_nic;?>"><?php echo $user_dis;?></a></p>
	                </div>
	                <a href="<?php the_permalink() ?>">
	                  <h2 class="heading">
<?php
if(mb_strlen($post->post_title, 'UTF-8')>70){
	$title= mb_substr($post->post_title, 0, 70, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?>
										</h2>
	                  <p class="text">
<?php if( have_rows('コンポーネント') ): $acfcnt=0; ?>
<?php while ( have_rows('コンポーネント') ) : the_row(); ?>
<?php if( get_row_layout() == 'テキストエリア' ): ?>
	<?php if($acfcnt==0): ?>
	<?php
	$acfcontent = get_sub_field('テキストエリア');
	if(mb_strlen($acfcontent, 'UTF-8')>55){
	    $content= mb_substr(strip_tags($acfcontent, '<br><span>'), 0,55, 'UTF-8');
	    echo $content.'…';
	}else{
	    echo strip_tags($acfcontent, '<br><span>');
	}
	?>
	<?php endif; ?>
<?php $acfcnt++; endif; ?>
<?php endwhile; ?>
<?php endif; ?>
										</p>
	                </a>
	              </div>
	            </li>
<?php endwhile; ?>
            </ul>

<?php if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
} ?>
<?php wp_reset_query();endif; ?>

          </article>
        </article>
				<!-- TENP -->
				<?php include('side_staffblog.php'); ?>
      </div>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>
<?php include('latest_event.php'); ?>

<?php get_footer(''); ?>
