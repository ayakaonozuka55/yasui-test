<?php get_header(''); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo $url;
  }
?>
<?php
$taxonomy_slug = get_query_var('taxonomy'); // タクソノミースラッグを取得
$taxonomy_var = get_taxonomy($taxonomy_slug); // タクソノミーの情報を取得
$term_info = get_term_by('slug',$term,$taxonomy_var->name);
$tax_id = $term_info->term_id;
?>

  <main class="main staffblog detail">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/column/bg_head.jpg);">
      <div>家づくりコラム</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/column/">家づくりコラム</a></li>
        <li><?php single_cat_title() ?></li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="lead lead-a">
            <h1 class="lead-a_heading lead_heading"><?php single_cat_title() ?></h1>
            <p class="lead_text"><?php echo term_description($tax_id); ?></p>
          </div>
          <div class="archive">
            <div class="archive_body">
<?php
$mainterm = get_term_by('slug', $term, $taxonomy_slug);
$term_id  = $mainterm->term_id;
?>
<?php
$category_children = $wpdb->get_results("
    SELECT A.term_id as cat_ID, A.name, A.slug, B.count
    FROM $wpdb->terms AS A
	LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id
    WHERE B.parent = '$term_id'
    AND B.taxonomy = '$taxonomy_slug'
	AND B.count != '0'
    ORDER BY A.term_order ASC
");
			//子カテゴリの数だけリスト出力
			foreach($category_children as $child_val) :
				$cat_link = get_term_link($child_val -> slug,$taxonomy_slug);
				$ko_cat_name = $child_val -> name;

            echo '  <div class="archive_body_item">'."\n";
            echo '    <div class="heading-b">'."\n";
            echo '      <h2 class="head">' . $child_val -> name . '</h2>'."\n";
            echo '    </div>'."\n";

?>
<?php
    $args= array(
        'tax_query' => array(
            array(
								'taxonomy' => $taxonomy_var->name,
                'field' => 'term_id',
                'terms' => $child_val->cat_ID
            ),
        ),
		'post_type' => 'column',
		'posts_per_page'=>'3'
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
                <div class="archive_body_item_body">
                  <article class="articleListWrap">
                    <ul class="articleList articleList-lengthwise">

<?php while (have_posts()) : the_post(); ?>

                      <li class="articleItem">
                        <a href="<?php the_permalink(); ?>">
                          <div class="img img-scale">
<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'index_size' );
if($thumbnail_image_url[0]){
	echo '<img src="' . $thumbnail_image_url[0] . '" class="column_item_img" style="">';
}else{
	echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage220.png" class="" style="">';
}
?>
													</div>
                          <div class="content">
                            <p class="day"><?php the_time('Y.m.d'); ?></p>
                            <h3 class="heading">
<?php
if(mb_strlen($post->post_title, 'UTF-8')>22){
	$title= mb_substr($post->post_title, 0, 22, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?>
														</h3>
                            <p class="text">
<?php
$acfcontent = get_field('リード文');
if(mb_strlen($acfcontent, 'UTF-8')>36){
	$acfcontent= mb_substr($acfcontent, 0, 36, 'UTF-8');
	echo $acfcontent.'…';
}else{
	echo $acfcontent;
}
?>
														</p>
		                        <ul class="category cf">
<?php
	$taxonomy_names = get_post_taxonomies();
	$terms = get_the_terms($post->ID,$taxonomy_names[0]);
	$cnt = 1;
	if($terms){
	    foreach ($terms as $cate) {
	      $term_name = $cate->name;
	      $term_slug = $cate->slug;
	      $term_oya = $cate->parent;
				if($term_oya != '0'){
					if($cnt < 3){
						echo '<li><span>'.$term_name.'</span></li>';
					}
					$cnt++;
				}
	    }
	}
?>
		                        </ul>
                          </div>
                        </a>
                      </li>
<?php endwhile; ?>

                    </ul>
                  </article>
                </div>
                <div class="archive_body_item_foot">
                  <div class="btn-a btn">
                    <a href="<?php echo $cat_link; ?>"><?php echo $child_val -> name; ?>の家づくりコラムをもっと見る</a>
                  </div>
                </div>
<?php wp_reset_query();endif; ?>
              </div>
<?php endforeach; ?>

            </div>
          </div>
					<!-- TENP -->
					<?php include('choose_column.php'); ?>
        </article>
				<!-- TENP -->
				<?php include('side_column.php'); ?>
      </div>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>

<?php get_footer(''); ?>
