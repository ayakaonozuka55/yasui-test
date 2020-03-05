<aside class="side">

<?php
	//一番親階層のカテゴリをすべて取得
$categories = $wpdb->get_results("
    SELECT A.term_id as cat_ID, A.name, A.slug, B.count 
    FROM $wpdb->terms AS A
	LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id 
    WHERE B.parent = '0'    
    AND B.taxonomy = 'column_category' 
    ORDER BY B.parent, A.term_order ASC
");
	//取得したカテゴリへの各種処理
	foreach($categories as $val){
		//カテゴリのリンクURLを取得
		$cat_link = get_term_link($val->slug,'column_category');
		$oyacat_cnt = $val->count;

		if($oyacat_cnt > 0){

			//親カテゴリのリスト出力
			echo '  <div class="sideblock">';
			echo '    <h2><a href="' . $cat_link . '">' . $val -> name . '</a></h2>';
			echo '    <ul class="sideblock_unordered visible-md visible-sm">';


$category_children = $wpdb->get_results("
    SELECT A.term_id as cat_ID, A.name, A.slug, B.count 
    FROM $wpdb->terms AS A 
	LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id 
    WHERE B.taxonomy = 'column_category' 
    AND B.parent = $val->cat_ID 
	AND B.count != '0' 
    ORDER BY A.term_order ASC 
");

			//カテゴリのリスト出力
			foreach($category_children as $child_val){
				$cat_link = get_term_link($child_val -> slug,'column_category');
				echo '<li><a href="' . $cat_link . '">' . $child_val -> name . '</a></li>';
			}
			echo '    </ul>';

			echo '    <div class="select sideblock_select visible-xs">';
			echo '      <form action="">';
			echo '        <select name="category" onchange="document.location=form.category.options[form.category.selectedIndex].value;">';
			echo '          <option selected>選択してください</option>';

			foreach($category_children as $child_val){
				$cat_link = get_term_link($child_val -> slug,'column_category');
				echo '<option value="' . $cat_link . '">' . $child_val -> name . '</option>';
			}

			echo '        </select>';
			echo '      </form>';
			echo '    </div>';
			echo '  </div>';

		}
	}
?>


<?php 
$results = $wpdb->get_results("
    SELECT A.name, A.slug /* post_titleとguidとIDの値を取り出す */
    FROM $wpdb->terms AS A
	LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id 
    WHERE  B.taxonomy = 'column_author' 
		AND B.count != '0' 
    ORDER BY B.parent, A.term_order ASC
");
?>
<?php if($results):?>
  <div class="sideblock">
    <h2>著者から選ぶ</h2>
    <ul class="sideblock_unordered visible-md visible-sm">
<?php
foreach ($results as $value) :
	$oyaslug = $value->slug;
	$oyaname = $value->name;
?>
      <li>
        <a href="<?php echo home_url(); ?>/column_author/<?php echo $oyaslug; ?>"><?php echo $oyaname; ?></a>
      </li>
<?php endforeach; ?>
    </ul>
    <div class="select sideblock_select visible-xs">
      <form action="">
        <select name="category" onchange="document.location=form.category.options[form.category.selectedIndex].value;">
          <option selected>選択してください</option>
<?php
foreach ($results as $value) :
	$oyaslug = $value->slug;
	$oyaname = $value->name;
?>
          <option value="<?php echo home_url(); ?>/column_author/<?php echo $oyaslug; ?>"><?php echo $oyaname; ?></option>
<?php endforeach; ?>
        </select>
      </form>
    </div>
  </div>
<?php endif;?>



  <div class="sideblock">
    <h2>アーカイブ</h2>
    <div class="select sideblock_select">
      <form action="">
        <select name="category" onchange="document.location=form.category.options[form.category.selectedIndex].value;">
          <option selected>月別</option>
				  <?php wp_get_archives('post_type=column&type=monthly&format=option&show_post_count=1'); ?>
        </select>
      </form>
    </div>
  </div>
  <div class="sideblock sideblock-borderTop">
    <h2>タグから選ぶ</h2>
    <ul class="tag">
<?php
$category_children = $wpdb->get_results("
    SELECT A.term_id as cat_ID, A.name, A.slug, B.count 
    FROM $wpdb->terms AS A 
	LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id 
    WHERE B.taxonomy = 'column_tag' 
	AND B.count != '0' 
    ORDER BY A.term_order ASC
");
		//カテゴリのリスト出力
		foreach($category_children as $child_val){
			$cat_link = get_term_link($child_val -> slug,'column_tag');
			echo '<li class="item"><a href="' . $cat_link . '">'. $child_val -> name .'</a></li>';
		}
?>
    </ul>
  </div>

  <div class="sideblock sideblock-borderTop">
    <div class="sidettlArea cf">
      <h3><span class="line">ランキング</span></h3>
      <div class="periodarea">
        <label class="tab_label periodweek show" for="tab1">週間</label>
        <label class="tab_label periodmouth" for="tab2">月間</label>
      </div>
    </div>
    <div class="ranking">
      <ol class="ranking_content tab_panel active" id="tab1">
  <?php if (function_exists('wpp_get_mostpopular')): ?>
      <?php
      // オプションの設定
      $args = array(
        'limit' => 5, // 表示する記事数
        'range' => 'weekly', // 期間("daily", "weekly", "monthly", "all")
        'order_by' => 'views', // ソート順("comments", "views", "avg" (1日の平均閲覧数))
        'post_type' => 'column', // 投稿タイプ（post,page,your-custom-post-type）
        'thumbnail_width' => 220, // サムネイルの横幅
        'thumbnail_height' => 154, // サムネイルの高さ
        'stats_comments' => 0, // コメントを表示する(1)/表示しない(0)
        'stats_views' => 0, // 閲覧数を表示する(1)/表示しない(0)
        'stats_author' => 0, // 投稿者を表示する(1)/表示しない(0)
        'stats_date' => 0, // 日付を表示する(1)/表示しない(0)
        'stats_date_format' => 'Y.n.j', // 日付のフォーマット
        'stats_category' => 1, // カテゴリを表示する(1)/表示しない(0)
        'excerpt_length' => 20, // 投稿のコンテンツから"n"文字の抜粋を作る
        'post_html' => // HTMLの出力フォーマット
        '
          <li>
  	        <div class="thumbpic">{thumb}</div>
	          <div class="rankingtxt"><a href="{url}">{text_title}</a></div>
					</li>
		'
      );

      // 関数の実行
      wpp_get_mostpopular($args);
      ?>
  <?php endif; ?>
      </ol>
      <ol class="ranking_content tab_panel" id="tab2">
  <?php if (function_exists('wpp_get_mostpopular')): ?>
      <?php
      // オプションの設定
      $args = array(
        'limit' => 5, // 表示する記事数
        'range' => 'monthly', // 期間("daily", "weekly", "monthly", "all")
        'order_by' => 'views', // ソート順("comments", "views", "avg" (1日の平均閲覧数))
        'post_type' => 'column', // 投稿タイプ（post,page,your-custom-post-type）
        'thumbnail_width' => 220, // サムネイルの横幅
        'thumbnail_height' => 154, // サムネイルの高さ
        'stats_comments' => 0, // コメントを表示する(1)/表示しない(0)
        'stats_views' => 0, // 閲覧数を表示する(1)/表示しない(0)
        'stats_author' => 0, // 投稿者を表示する(1)/表示しない(0)
        'stats_date' => 0, // 日付を表示する(1)/表示しない(0)
        'stats_date_format' => 'Y.n.j', // 日付のフォーマット
        'stats_category' => 1, // カテゴリを表示する(1)/表示しない(0)
        'excerpt_length' => 20, // 投稿のコンテンツから"n"文字の抜粋を作る
        'post_html' => // HTMLの出力フォーマット
        '
          <li>
  	        <div class="thumbpic">{thumb}</div>
	          <div class="rankingtxt"><a href="{url}">{text_title}</a></div>
					</li>
		'
      );

      // 関数の実行
      wpp_get_mostpopular($args);
      ?>
  <?php endif; ?>
      </ol>
    </div>
  </div>

  <div class="sideblock">
    <div class="sidettlArea cf">
      <h3><span class="line">ピックアップ</span></h3>
    </div>
    <div class="pickup">
<?php
query_posts(
	array(
		'post_type'=>'column',
		'post_status'=>'publish',
		'posts_per_page'=>'5',
		'meta_query' => array(
			array(	'key'=>'ピックアップ',
				'value'=>1,
				'compare'=>'='
				)
			)
		));
?>
<?php if ( have_posts() ) : ?>
      <ul>
<?php while (have_posts()) : the_post(); ?>
        <li>
          <div class="thumbpic">
<a href="<?php the_permalink(); ?>"><?php $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'index_size' ); echo '<img src="' . $thumbnail_image_url[0] . '" >'; ?></a>
					</div>
          <div class="pickuptxt"><a href="<?php the_permalink(); ?>">
<?php 
if(mb_strlen($post->post_title, 'UTF-8')>25){
	$title= mb_substr($post->post_title, 0, 25, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?>
					</a></div>
        </li>
<?php endwhile; ?>
      </ul>
<?php wp_reset_query();endif; ?>
    </div>
  </div>
</aside>
