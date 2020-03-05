<?php
$taxonomy = get_query_var( 'taxonomy' );
$post_type = get_taxonomy( $taxonomy )->object_type[0];

if ( (get_post_type() == 'event') || ($post_type == 'event') ) { //見学会・イベント・セミナー
  get_template_part( 'post-event' , false );

} elseif ( get_post_type() == 'housing' ) { //注文住宅建築実例
  $taxonomy_slug = get_query_var('taxonomy'); // タクソノミースラッグを取得
  $term_object = get_queried_object(); // タームオブジェクトを取得
  $cat = get_term( $term_object, $taxonomy_slug );
  if($cat->parent == '0'){
		if($taxonomy_slug == 'housing_category'){
    	get_template_part( 'post-oya-housing' , false );
		}else{
    	get_template_part( 'post-housing_tag' , false );
		}
  }else{
    get_template_part( 'post-housing' , false );
  }

} elseif ( get_post_type() == 'voice' ) { //お客様の声
  $taxonomy_slug = get_query_var('taxonomy'); // タクソノミースラッグを取得
  $term_object = get_queried_object(); // タームオブジェクトを取得
  $cat = get_term( $term_object, $taxonomy_slug );
  if($cat->parent == '0'){
		if($taxonomy_slug == 'voice_category'){
    	get_template_part( 'post-oya-voice' , false );
		}else{
    	get_template_part( 'post-voice_tag' , false );
		}
  }else{
    get_template_part( 'post-voice' , false );
  }

} elseif ( get_post_type() == 'faq' ) { //よくある質問
  get_template_part( 'post-faq' , false );

} elseif ( get_post_type() == 'column' ) { //家づくりコラム
  $taxonomy_slug = get_query_var('taxonomy'); // タクソノミースラッグを取得
  $term_object = get_queried_object(); // タームオブジェクトを取得
  $cat = get_term( $term_object, $taxonomy_slug );
  if($cat->parent == '0'){
		if($taxonomy_slug == 'column_category'){
    	get_template_part( 'post-oya-column' , false );
		}else{
    	get_template_part( 'post-column_tag' , false );
		}
  }else{
    get_template_part( 'post-column' , false );
  }

} elseif ( get_post_type() == 'media' ) { //受賞歴・メディア情報
  get_template_part( 'post-media' , false );

} elseif ( get_post_type() == 'faq' ) { //よくある質問
  get_template_part( 'post-faq' , false );

} elseif ( get_post_type() == 'staffblog' ) { //スタッフブログ
  get_template_part( 'post-staffblog' , false );

} elseif ( get_post_type() == 'showroom' ) { //ショールーム・展示場
  get_template_part( 'post-showroom' , false );

}

?>