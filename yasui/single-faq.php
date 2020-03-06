<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<?php $content_txt = get_the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo "<img src='{$url}' class=''>";
  }
  function imgFromObj1($obj) {
    $url = $obj["url"];
    echo $url;
  }
$postid = $post->ID;
$taxonomy_names = get_post_taxonomies();
$terms = get_the_terms($post->ID,$taxonomy_names[0]);
$taxonomy_var = get_taxonomy($taxonomy_names[0]);
$termname = $terms[0]->name;
$termslug = $terms[0]->slug;
$termlink = get_term_link($terms[0]->slug,$taxonomy_names[0]);
?>
	<!-- MAIM -->
  <main class="main qandadetail">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/reason/qanda/bg_head.jpg);">
      <div>よくあるご質問（Q&A）</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/reason/">選ばれる理由</a></li>
        <li><a href="<?php echo home_url(); ?>/faq/">よくあるご質問（Q&A）</a></li>
        <li><a href="<?php echo $termlink; ?>"><?php echo $termname; ?></a></li>
        <li><?php the_title(); ?></li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <article class="qandadetailWrap">
            <div class="heading-b">
              <h1 class="head"><?php the_title(); ?></h1>
            </div>
            <div class="component c-text">
              <?php echo $content_txt; ?>
            </div>
          </article>
          <div class="archive">
            <div class="archive_body">
              <div class="archive_body_item">
                <div class="qandaList">
                  <div class="qandaList_head">
                    <div class="heading-c">
                      <h2 class="head">関連して見られているよくあるご質問</h2>
                    </div>
                  </div>
                  <!-- /.qandaList_head -->
                  <div class="qandaList_body">
<?php
    $args= array(
		'post_type' => 'faq',
		'orderby' => 'rand',
		'post__not_in' => array($postid),
		'posts_per_page'=>'3',
		'tax_query' => array('relation' => 'AND',
			array(	'taxonomy'=>'faq_category',
					'terms' => array($termslug),
					'include_children' => true,
					'field' => 'slug',
					'operator' => 'AND'
				)
		)
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
<?php while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="qList">
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
		<?php include('tenp-excursion_bnr.php'); ?>
  </main>

	<!-- TENP -->
	<?php include('maincv.php'); ?>


<?php get_footer(); ?>
