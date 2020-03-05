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

  <main class="main qanda">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/reason/qanda/bg_head.jpg);">
      <div>よくあるご質問（Q&A）</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/reason/">選ばれる理由</a></li>
        <li><a href="<?php echo home_url(); ?>/faq/">よくあるご質問（Q&A）</a></li>
        <li><?php single_cat_title() ?></li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="archive">
            <div class="archive_body">
              <div class="archive_body_item">
                <div class="qandaList">
                  <div class="qandaList_head">
                    <div class="heading-b">
                      <h1 class="head"><?php single_cat_title() ?></h1>
                    </div>
                  </div>
                  <!-- /.qandaList_head -->
                  <div class="qandaList_body">
<?php
    $args= array(
		'post_type' => 'faq',
    'posts_per_page'=>'-1',
    'tax_query' => array(
        array(
						'taxonomy' => $taxonomy_var->name,
            'field' => 'slug',
            'terms' => $term
        ),
    )
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
<?php while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink() ?>" class="qList">
                      <span class="qList_sub"><span class="qList_icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/reason/qanda/icon_q.png" alt="Q"></span></span>
                      <span class="qList_main">
                        <span class="qList_text"><?php the_title(); ?></span>
                      </span>
                    </a>
<?php endwhile; ?>
<?php wp_reset_query();endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </article>
				<!-- TENP -->
				<?php include('side_qanda.php'); ?>
      </div>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>

<?php get_footer(''); ?>
