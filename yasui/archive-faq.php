<?php get_header(''); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo $url;
  }
?>
  <main class="main qanda">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/reason/qanda/bg_head.jpg);">
      <h1>よくあるご質問（Q&A）</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/reason/">選ばれる理由</a></li>
        <li>よくあるご質問（Q&A）</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="archive">
            <div class="lead lead-b">
              <div class="text">
                <p>お客様からの家づくりやリフォーム・リノベーションに関するよくあるご質問を掲載します 。家づくりにおいて注文住宅のプランニング、性能や素材、土地探しや資金のことまで、お客様からよくいただいた質問について回答いたします。家づくりの参考にご覧ください。</p>
              </div>
            </div>
            <div class="archive_body">
<?php 
$results = $wpdb->get_results("
    SELECT A.name, A.slug /* post_titleとguidとIDの値を取り出す */
    FROM $wpdb->terms AS A
	LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id 
    WHERE  B.taxonomy = 'faq_category' 
		AND B.count != '0' 
    ORDER BY B.parent, A.term_order ASC
");
?>
<?php
foreach ($results as $value) :
	$oyaslug = $value->slug;
	$oyaname = $value->name;
?>
              <div class="archive_body_item">
                <div class="qandaList">
                  <div class="qandaList_head">
                    <div class="heading-b">
                      <h2 class="head"><?php echo $oyaname; ?></h2>
                    </div>
                  </div>
                  <!-- /.qandaList_head -->
                  <div class="qandaList_body">
<?php
    $args= array(
		'post_type' => 'faq',
    'tax_query' => array( 
        array(
						'taxonomy' => 'faq_category',
            'field' => 'slug',
            'terms' => $oyaslug
        ),
    ),
		'posts_per_page' => '3'
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
                  <!-- /.qandaList_body -->
                  <div class="qandaList_foot">
                    <a href="<?php echo home_url(); ?>/faq_category/<?php echo $oyaslug; ?>" class="btn-d qandaList_btn">もっと見る</a>
                  </div>
                  <!-- /.qandaList_foot -->
                </div>
              </div>

<?php endforeach; ?>

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
