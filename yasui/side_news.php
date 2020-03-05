
<aside class="side">
  <div class="sideblock">
    <h2>カテゴリから選ぶ</h2>
    <ul class="sideblock_unordered visible-md visible-sm">
<?php
$category_children = $wpdb->get_results("
    SELECT A.term_id as cat_ID, A.name, A.slug, B.count 
    FROM $wpdb->terms AS A 
	LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id 
    WHERE B.taxonomy = 'category' 
		AND B.count != '0' 
    ORDER BY A.term_order ASC
");

		//カテゴリのリスト出力
		foreach($category_children as $child_val){
			$cat_link = get_category_link($child_val -> cat_ID);
			echo '<li><a href="' . $cat_link . '">' . $child_val -> name . '</a></li>';
		}
?>
    </ul>
    <div class="select sideblock_select visible-xs">
      <form action="">
        <select name="category" onchange="document.location=form.category.options[form.category.selectedIndex].value;">
          <option selected>選択してください</option>
<?php
$category_children = $wpdb->get_results("
    SELECT A.term_id as cat_ID, A.name, A.slug, B.count 
    FROM $wpdb->terms AS A 
	LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id 
    WHERE B.taxonomy = 'category' 
		AND B.count != '0' 
    ORDER BY A.term_order ASC
");

		//カテゴリのリスト出力
		foreach($category_children as $child_val){
			$cat_link = get_category_link($child_val -> cat_ID);
			echo '<option value="' . $cat_link . '">' . $child_val -> name . '</option>';
		}
?>
        </select>
      </form>
    </div>
  </div>
</aside>
