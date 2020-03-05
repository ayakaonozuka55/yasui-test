<?php
/*
Template Name: STAFF 一覧表示用テンプレート
*/
?>
<?php get_header(''); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo $url;
  }
?>
  <main class="main staff main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/staff/bg_head.jpg);">
      <h1>スタッフ紹介一覧</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/about/">会社概要と社長のコメント</a></li>
        <li>スタッフ紹介一覧</li>
      </ul>
    </div>
    <article class="maincontent">
      <section>
        <div class="l-content-sm">
          <div class="staffBlock">
            <div class="staffHead">
              <p class="shoulder"><span class="c-orange">＼</span> 安井建設のスタッフをご紹介 <span class="c-orange">／</span></p>
              <h2 class="heading-a heading-a-ex"><span class="line">建物を通して<br class="visible-xs"><span class="c-orange">家族の笑顔と幸せをつくる</span></span></h2>
              <div class="text">
                <p>設計・工事・コーディネーターなどさまざまなところで活躍する安井建設のスタッフをご紹介します。<br>
                  私たちみんなで力を合わせてお客様の笑顔と幸せをつくり、守っていきます。<br>
                  スタッフの楽しい日常がつまったブログもお楽しみください♪</p>
              </div>
            </div>
            <div class="staff_body">
              <ul class="staffList">

<?php
	/*-------------
	ユーザー数の取得と設定
	--------------------*/
	$args = array(
    'meta_query' => array(
        'orderno' => array(
            'key' => 'orderno'
        ),
    ),
    'exclude' => array('1'),
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
			echo '            <h3 class="staffList_name">'.$user->display_name.'</h3>';
			echo '            <p class="staffList_name-en">'.$cr_engname.'</p>';
			echo '            <p class="staffList_post_bottom">'.$cr_katagaki.'</p>';
			echo '          </div>';
			echo '        </a>';
			echo '      </li>';

	endforeach;
?>

              </ul>
            </div>
          </div>
          <!-- /.staffBlock -->
        </div>
      </section>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>
<?php include('latest_event.php'); ?>

<?php get_footer(''); ?>
