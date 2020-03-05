<?php get_header(''); ?>
<!--
<pre>
<?php print_r($wp_query); ?>
</pre>
-->
<?php
$curauth   = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$autherid  =	$curauth->ID;
$curauth  = get_userdata($autherid);
$user_login =	$curauth->user_login;
$user_dec =	$curauth->description;
$user_dis =	$curauth->display_name;
$user_id  =	$curauth->ID;
$user_nic =	$curauth->user_nicename;
$user_url =	$curauth->user_url;
$cr_study = get_field('肩書き', 'user_'. $autherid );
$cr_engname  = get_user_meta( $user_id , 'スタッフ名英語' , true );
$cr_profile  = get_field('profile', 'user_'. $autherid );
$cr_message  = get_field('message', 'user_'. $autherid );
$cr_syokusyu = get_field( '職種', 'user_'. $user_id );
$cr_syokusyuid = $cr_syokusyu["value"];
$cr_syokusyuname = $cr_syokusyu["label"];
$cr_userpage = home_url().'/staffblog-auther?auther='.$user_id;
$cr_kind  = get_user_meta( $user_id , '趣味など' , true );

	$arg = array(
	    'post_type' => 'staffblog',
	    'posts_per_page' => -1,
			'author' => $autherid
	    );
	$query = new WP_Query($arg);
	$all_num = $query->found_posts;//全件数
?>
  <main class="main staff_detail main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/staff/bg_head.jpg);">
      <h1>スタッフ紹介</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/about/">会社概要と社長のコメント</a></li>
        <li><a href="<?php echo home_url(); ?>/staff-auther-all">スタッフ紹介一覧</a></li>
        <li><?php echo $user_dis;?></li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm">
        <div class="staffBlock">
          <div class="staffarea cf">
            <div class="staffImg"><?php echo wp_get_attachment_image(get_field('詳細ページ用画像', 'user_'. $autherid ),'profile_size');?></div>
            <div class="staffdate">
              <p class="position"><?php echo $cr_syokusyuname;?></p>
              <p class="staffname"><?php echo $user_dis;?></p>
              <p class="staffname_en"><?php echo $cr_engname;?></p>
              <ul class="staff_unordered">
							<?php if( have_rows('趣味など','user_'. $autherid) ): ?>
								<?php while ( have_rows('趣味など','user_'. $autherid) ) : the_row(); ?>
                <li class="staff_item">
                  <p class="staff_item_head"><?php the_sub_field('表題'); ?></p>
                  <p class="staff_item_content"><?php the_sub_field('テキスト'); ?></p>
                </li>
								<?php endwhile; ?>
							<?php endif; ?>
              </ul>
              <div class="btn-staff "><a href="<?php echo $cr_userpage;?>">ブログを見る</a></div>　　　　　
            </div>
          </div>
          <div class="personalarea">
            <h3>PROFILE</h3>
            <div class="c-text">
              <p><?php echo $cr_profile;?></p>
            </div>
          </div>
          <div class="personalarea">
            <h3>MESSAGE</h3>
            <div class="c-text">
              <p><?php echo $cr_message;?></p>
            </div>
          </div>
          <div class="staffbloogListWrap cf">
            <div class="heading-s">
              <h2 class="head"><span class="line">NEW&nbsp;<span class="c-orange">BLOG</span></span></h2>
              <p class="shoulder">このスタッフが書いた最新ブログ</p>
            </div>
<?php
    $args= array(
		'post_type' => 'staffblog',
		'posts_per_page'=>'3',
		'author' => $user_id,
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
            <ul class="staffbloogList">
<?php while (have_posts()) : the_post(); ?>
<?php
	$upost = get_post($post);
	$curauth = get_userdata($upost->post_author);
	$user_login =	$curauth->user_login;
	$user_dec =	$curauth->description;
	$user_dis =	$curauth->display_name;
	$user_id  =	$curauth->ID;
	$user_nic =	$curauth->user_nicename;
?>
              <li class="articleItem">
                <a href="<?php the_permalink(); ?>">
                  <div class="img img-scale">
<?php
	$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'index_size2' );
	if($thumbnail_image_url){
		echo '<img src="' . $thumbnail_image_url[0] . '" class="" style="">';
	}else{
		echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage220.png" class="" style="">';
	}
?>
									</div>
                  <div class="content">
                    <div class="head cf">
                      <p class="day"><?php the_time('Y.m.d'); ?></p>
                      <p class="name"><?php echo $user_dis;?></p>
                    </div>
                    <h2 class="heading">
<?php
if(mb_strlen($post->post_title, 'UTF-8')>24){
	$title= mb_substr($post->post_title, 0, 24, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?>
										</h2>
                  </div>
                </a>
              </li>
<?php endwhile; ?>
            </ul>
<?php endif; ?>
            <div class="staffbloogListBlock_foot">
              <div class="btn-a btn">
                <a href="<?php echo home_url(); ?>/staffblog-auther?auther=<?php echo $user_id;?>">このスタッフのブログ一覧はこちら</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="section-otherstaff bg">
        <div class="l-content-sm">
          <div class="casevoiceBlock">
            <div class="casevoiceBlock_head">
              <div class="heading-st">
                <h2 class="head"><span class="line">STAFF</span></h2>
              </div>
              <div class="heading-s">
                <h2 class="shoulder">他のスタッフを見る</h2>
              </div>
            </div>
            <div class="staff_body">
              <ul class="staffList staff_slider" id="staff_slider">
<?php
	/*-------------
	ユーザー数の取得と設定
	--------------------*/
	$args = array(
    'meta_query' => array(
        'syokusyu' => array(
            'key' => '職種'
        ),
        'orderno' => array(
            'key' => 'orderno'
        ),
    ),
		// 'number' => '5',
    'exclude' => array('1',$user_id),
    'orderby' => array(
        'syokusyu' => 'asc',
        'orderno' => 'asc',
    )
	);
	$users = get_users( $args );

	/*-------------
	ユーザー情報の出力
	--------------------*/
	foreach($users as $user):
		$uid = $user->ID;
		$cr_katagaki = get_field( '肩書き', 'user_'. $uid );
		$cr_engname = get_user_meta( $uid , 'スタッフ名英語' , true );
		$cr_profile = get_user_meta( $uid , 'profile' , true );
		if(mb_strlen($cr_profile, 'UTF-8')>20){
			$cr_profile= mb_substr($cr_profile, 0, 20, 'UTF-8');
			$cr_profile= $cr_profile.'…';
		}
		$cr_study = get_user_meta( $uid , '職種' , true );
		$cr_syokusyu = get_field( '職種', 'user_'. $uid );
		$cr_syokusyuid = $cr_syokusyu["value"];
		$cr_syokusyuname = $cr_syokusyu["label"];

			echo '      <li class="staffItem">';
			echo '        <a href="'.get_author_posts_url( $uid ).'">';
			echo '          <div class="img img-scale">'.wp_get_attachment_image(get_field('スタッフ画像', 'user_'. $uid ),'sq_size').'</div>';
			echo '          <div class="staffList_content">';
			echo '            <p class="staffList_post">'.$cr_syokusyuname.'</p>';
			echo '            <p class="staffList_post">'.$cr_katagaki.'</p>';
			echo '            <h3 class="staffList_name">'.$user->display_name.'</h3>';
			echo '            <p class="staffList_name-en">'.$cr_engname.'</p>';
			echo '          </div>';
			echo '        </a>';
			echo '      </li>';

	endforeach;
?>

              </ul>
            </div>
          </div>
        </div>
      </section>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>
<?php include('latest_event.php'); ?>

<?php get_footer(''); ?>
