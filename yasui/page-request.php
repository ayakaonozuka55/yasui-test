<?php get_header(); ?>
<!-- sub-container -->
  <main class="main request main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/request/index_bg_head.jpg);">
      <h1>資料請求</h1>
    </div>
    <div class="breadcrumbs request_index_breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li>資料請求</li>
      </ul>
    </div>
    <article class="maincontent">
      <section class="request_startset request_index_list">
        <div class="l-content-sm">
          <div class="heading-a heading-a-ex">
            <h2 class="head"><span class="line">資料請求</span></h2>
					</div>
					<p class="text">安井建設では、新築住宅をご検討の方、リフォーム・リノベーションをご検討の方、<br class="visible-md　visible-sm">それぞれにダウンロードいただける資料をご用意しております。<br>ご希望の資料請求ページへお進みください。</p>
				</div>
				<div class="request_block_wrap l-content-sm">
					<article class="request_index_block">
						<a href="<?php echo home_url(); ?>/request/request-new/">
							<div class="request_index_item">
								<div class="index_item_head">
									<h3 class="index_item_heading">新築住宅</h3>
								</div>
								<div class="index_item_content">
									<div class="img">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/request/index_item_new.jpg" alt="">
									</div>
									<div class="index_item_inner">
										<div class="btn-a">
											<div class="btn">資料請求はこちら</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</article>
					<article class="request_index_block">
						<a href="<?php echo home_url(); ?>/request/request-reform/">
							<div class="request_index_item">
								<div class="index_item_head">
									<h3 class="index_item_heading">リフォーム・リノベーション</h3>
								</div>
								<div class="index_item_content">
									<div class="img">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/request/index_item_renovation.jpg" alt="">
									</div>
									<div class="index_item_inner">
										<div class="btn-a">
											<div class="btn">資料請求はこちら</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</article>
				</div>
				<?php include('tenp-excursion_bnr.php'); ?>
			</section>
		</article>
  </main>
<!-- TENP -->
<?php include('maincv.php'); ?>
<?php include('latest_event.php'); ?>

<!-- sub-container end -->
<?php get_footer(); ?>
