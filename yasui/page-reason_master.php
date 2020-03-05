<?php get_header(); ?>
<!-- sub-container -->

  <main class="main reason-master main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/reason/master/bg_head.jpg);">
      <h1>尾張建築職人匠の会</h1>
    </div>
		<!-- TENP -->
		<?php include('nav_reason_pagehead.php'); ?>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/reason/">選ばれる理由</a></li>
        <li>尾張建築職人匠の会</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="lead lead-c">
        <div class="l-content-sm">
          <h2 class="lead-c_heading lead_heading"><span>職人さんとの距離が近いのも、<br class="visible-md">安井建設が選ばれる理由の一つです。</span></h2>
          <div class="text">
            毎月、協力業者「尾張建築職人 匠の会」の方々に集まっていただき、定例会を開催しています。<br>社員だけでなく協力業者「尾張建築職人 匠の会」と共に、お客様に喜んでいただけるよう、<br class="visible-md">より良い現場の環境づくりや安全面のレベルアップ等勉強しています。<br>協力業者「尾張建築職人 匠の会」の方々の協力もあり、<br class="visible-md">いつ着工中の現場にお客様が足を運んでいただいても良いよう綺麗な現場造りを目指しています。<br>また、定例会とは別に着工中現場の安全パトロールも毎月2回開催しています。
          </div>
        </div>
      </div>
        <div class="horizontalLine l-content-sm"></div>
        <!-- /.horizontalLine -->
        <section class="section-masters">
          <div class="l-content-sm">
              <div class="masters">
<?php if( have_rows('尾張建築職人匠の会')): ?>
	<?php $dlcnt=1;?>
	<?php while ( have_rows('尾張建築職人匠の会')) : the_row(); ?>
								<?php if (($dlcnt % 2) == 0): ?>
                  <div class="mastersBlock">
								<?php else:?>
                  <div class="mastersBlock mastersBlock-flipped">
								<?php endif;?>
                    <div class="mastersBlock_main">
                        <div class="mastersBlock_main_head">
                            <h2 class="mastersBlock_heading"><?php the_sub_field('名前'); ?></h2>
                        </div>
                        <div class="mastersBlock_main_body">
                            <p class="mastersBlock_text">コメント:<br>
                                <?php the_sub_field('コメント'); ?></p>
                        </div>
                    </div>
                    <div class="mastersBlock_sub">
                        <figure class="mastersBlock_thumb"><img src="<?php the_sub_field('画像'); ?>" alt=""></figure>
                    </div>
                  </div>

	<?php $dlcnt++;?>
	<?php endwhile; ?>
<?php endif; ?>
              </div>
              <!-- /.masters -->
          </div>
        </section>
				<!-- TENP -->
				<?php include('nav_reason.php'); ?>
      </article>
  </main>


<!-- TENP -->
<?php include('maincv.php'); ?>

<!-- sub-container end -->
<?php get_footer(); ?>
