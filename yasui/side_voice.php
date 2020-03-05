
<aside class="side">

<?php
	//一番親階層のカテゴリをすべて取得
$categories = $wpdb->get_results("
    SELECT A.term_id as cat_ID, A.name, A.slug, B.count
    FROM $wpdb->terms AS A
	LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id
    WHERE B.parent = '0'
    AND B.taxonomy = 'voice_category'
    ORDER BY B.parent, A.term_order ASC
");
	//取得したカテゴリへの各種処理
	foreach($categories as $val){
		//カテゴリのリンクURLを取得
		$cat_link = get_term_link($val->slug,'voice_category');
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
    WHERE B.taxonomy = 'voice_category'
    AND B.parent = $val->cat_ID
	AND B.count != '0'
    ORDER BY A.term_order ASC
");

			//カテゴリのリスト出力
			foreach($category_children as $child_val){
				$cat_link = get_term_link($child_val -> slug,'voice_category');
				echo '<li><a href="' . $cat_link . '">' . $child_val -> name . '</a></li>';
			}
			echo '    </ul>';

			echo '    <div class="select sideblock_select visible-xs">';
			echo '      <form action="">';
			echo '        <select name="category" onchange="document.location=form.category.options[form.category.selectedIndex].value;">';
			echo '          <option selected>選択してください</option>';

			foreach($category_children as $child_val){
				$cat_link = get_term_link($child_val -> slug,'voice_category');
				echo '<option value="' . $cat_link . '">' . $child_val -> name . '</option>';
			}

			echo '        </select>';
			echo '      </form>';
			echo '    </div>';
			echo '  </div>';

		}

	}
?>


  <div class="sideblock">

  <div class="sideblock sideblock-borderTop">
    <h2>タグから選ぶ</h2>
    <ul class="tag">
<?php
$category_children = $wpdb->get_results("
    SELECT A.term_id as cat_ID, A.name, A.slug, B.count
    FROM $wpdb->terms AS A
	LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id
    WHERE B.taxonomy = 'voice_tag'
	AND B.count != '0'
    ORDER BY A.term_order ASC
");
		//カテゴリのリスト出力
		foreach($category_children as $child_val){
			$cat_link = get_term_link($child_val -> slug,'voice_tag');
			echo '<li class="item"><a href="' . $cat_link . '">'. $child_val -> name .'</a></li>';
		}
?>
    </ul>
  </div>
</aside>
