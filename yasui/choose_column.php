<article class="choose">
<?php 
$results = $wpdb->get_results("
  SELECT A.name, A.slug /* post_titleとguidとIDの値を取り出す */
    FROM $wpdb->terms AS A
	LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id 
    WHERE B.parent = '0'    
    AND B.taxonomy = 'column_category' 
		AND B.count != 0
    ORDER BY B.parent, A.term_order ASC
");
foreach ($results as $value) {
	$cate_array[] = $value->slug;
}
if($cate_array){
	foreach ($cate_array as $categon) {
		$catid = get_term_by('slug',$categon,'column_category');
		echo '  <div class="choose_block">';
		echo '    <h2 class="choose_heading">'.esc_html($catid->name).'から選ぶ</h2>';
		echo '    <ul class="choose_unordered cf">';

		$results02 = $wpdb->get_results("
		  SELECT A.name, A.slug, A.term_id /* post_titleとguidとIDの値を取り出す */
		    FROM $wpdb->terms AS A
			LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id 
		    WHERE B.parent = ".$catid->term_id."
		    AND B.taxonomy = 'column_category' 
				AND B.count != 0
		    ORDER BY B.parent, A.term_order ASC
		");
		foreach ($results02 as $value02) {
			echo '<li><a href="'.get_category_link( $value02->term_id ).'">'.esc_html($value02->name).'</a></li>';
		}

		echo '    </ul>';
		echo '  </div>';
	}
}
?>

</article>
