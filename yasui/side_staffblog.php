
<aside class="side">
  <div class="sideblock">
    <h2>スタッフから選ぶ</h2>
    <dl class="sideblock_definition visible-md visible-sm">
	<?php
	/*-------------
	ユーザー数の取得と設定
	--------------------*/

	$users01 = get_users();
	$ucnt = 0;
	$acn = array(1,7);
	foreach($users01 as $user01):
		$uid01 = $user01->ID;
		$user_post_count01 = count_user_posts($uid01,'staffblog');
		if($user_post_count01 == 0){
			array_push($acn,$user01->ID);
		}else{
			$ucnt++;
		}
	endforeach;
	$total_users = $ucnt;

	$args = array(
    'meta_query' => array(
        'syokusyu' => array(
            'key' => '職種'
        ),
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
	$ucnt = 0;
	foreach($users as $user):
		$uid = $user->ID;
		$user_post_count = count_user_posts($uid,'staffblog');
		$cr_study = get_user_meta( $uid , '職種' , true );
		$cr_syokusyu = get_field( '職種', 'user_'. $uid );
		$cr_syokusyuid = $cr_syokusyu["value"];
		$cr_syokusyuname = $cr_syokusyu["label"];

		if( $user_post_count > 0 ){
			if($cr_syokusyuid != $keepsyoku){
	      echo '  </ul>';
	      echo '</dd>';
			}
			if(($cr_syokusyuid != $keepsyoku) || ($keepsyoku == '')){
	      echo '<dt class="js-accordionHead">'.$cr_syokusyuname.'</dt>';
	      echo '<dd class="js-accordionContent">';
	      echo '  <ul>';
			}

			echo '	<li>';
      echo '		<a href="'.home_url().'/staffblog-auther?auther='.$uid.'">';
      echo '			<div>'.wp_get_attachment_image(get_field('スタッフ画像', 'user_'. $uid ),'sq_size').'</div>';
      echo '			<p>'.$user->display_name.'</p>';
      echo '		</a>';
	    echo '	</li>';

			$keepsyoku = $cr_syokusyuid;

			if(($cr_syokusyuid != $keepsyoku) || ($keepsyoku == '')){
	      echo '  </ul>';
	      echo '</dd>';
			}
		}
		$ucnt++;
	endforeach;

	if($ucnt > 0){
		echo '  </ul>';
		echo '</dd>';
	}
	?>

    </dl>
    <div class="select sideblock_select visible-xs">
      <form action="">
        <select name="category" onchange="document.location=form.category.options[form.category.selectedIndex].value;">
          <option selected>選択してください</option>

	<?php
	/*-------------
	ユーザー情報の出力
	--------------------*/
	$ucnt = 0;
	foreach($users as $user):
		$uid = $user->ID;
		$user_post_count = count_user_posts($uid,'staffblog');
		$cr_study = get_user_meta( $uid , '職種' , true );
		$cr_syokusyu = get_field( '職種', 'user_'. $uid );
		$cr_syokusyuid = $cr_syokusyu["value"];
		$cr_syokusyuname = $cr_syokusyu["label"];

		if( $user_post_count > 0 ){
			if($cr_syokusyuid != $keepsyoku){
	      echo '</optgroup>';
			}
			if(($cr_syokusyuid != $keepsyoku) || ($keepsyoku == '')){
	      echo '<optgroup label="'.$cr_syokusyuname.'">';
			}

      echo '		<option value="'.home_url().'/staffblog-auther?auther='.$uid.'">';
      echo '			'.$user->display_name.'';
      echo '		</option>';

			$keepsyoku = $cr_syokusyuid;

			if(($cr_syokusyuid != $keepsyoku) || ($keepsyoku == '')){
	      echo '</optgroup>';
			}
		}
		$ucnt++;
	endforeach;

	if($ucnt > 0){
		echo '</optgroup>';
	}
	?>
        </select>
      </form>
    </div>
  </div>
  <div class="sideblock">
    <h2>アーカイブ</h2>
    <div class="select sideblock_select">
      <form action="">
        <select name="category" onchange="document.location=form.category.options[form.category.selectedIndex].value;">
          <option selected>月別</option>
				  <?php wp_get_archives('post_type=staffblog&type=monthly&format=option&show_post_count=1'); ?>
        </select>
      </form>
    </div>
  </div>
</aside>
