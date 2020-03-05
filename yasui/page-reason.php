<?php get_header(); ?>
<!-- sub-container -->

  <main class="main reason main_ex bg_gray">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/reason/bg_head.jpg);">
      <h1>選ばれる理由</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li>選ばれる理由</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="lead lead-c">
        <div class="l-content-sm">
          <h2 class="lead-c_heading lead_heading"><span>家族の笑顔と幸せを作る家づくり。<br>安井建設は地域密着の工務店として<br class="visible-md">安心・安全で確かな家づくりをお約束します。</span></h2>
          <div class="text">
            生涯コストを考えた家づくりや、安心・安全で確かな耐震性能、建てた後から始まるアフターサービスまで、<br class="visible-md">安井建設は愛知県江南市を中心に、地域密着の家づくりをしています。
          </div>
        </div>
      </div>
      <section>
        <div class="l-content-xs">
          <ul class="reasonList">
            <li class="reasonList_item">
              <a class="reasonListPanel" href="<?php echo home_url(); ?>/reason/family/">
                <div class="reasonListPanel_img img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/reason/img_family.jpg" alt=""></div>
                <div class="reasonListPanel_body">
                  <h2 class="reasonListPanel_heading">家族の笑顔と絆をつくる家づくり</h2>
                </div>
              </a>
            </li>
            <li class="reasonList_item">
              <a class="reasonListPanel" href="<?php echo home_url(); ?>/reason/cost/">
                <div class="reasonListPanel_img img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/reason/img_cost.jpg" alt=""></div>
                <div class="reasonListPanel_body">
                  <h2 class="reasonListPanel_heading">生涯コストを考えた家づくり</h2>
                </div>
              </a>
            </li>
            <li class="reasonList_item">
              <a class="reasonListPanel" href="<?php echo home_url(); ?>/reason_master/">
                <div class="reasonListPanel_img img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/reason/img_master.jpg" alt=""></div>
                <div class="reasonListPanel_body">
                  <h2 class="reasonListPanel_heading">尾張建築職人匠の会</h2>
                </div>
              </a>
            </li>
            <li class="reasonList_item">
              <a class="reasonListPanel" href="<?php echo home_url(); ?>/reason/region/">
                <div class="reasonListPanel_img img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/reason/img_region.jpg" alt=""></div>
                <div class="reasonListPanel_body">
                  <h2 class="reasonListPanel_heading">地域とともに</h2>
                </div>
              </a>
            </li>
            <li class="reasonList_item">
              <a class="reasonListPanel" href="<?php echo home_url(); ?>/reason/earthquake/">
                <div class="reasonListPanel_img img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/reason/img_earthquake.jpg" alt=""></div>
                <div class="reasonListPanel_body">
                  <h2 class="reasonListPanel_heading">地震に強い家づくり</h2>
                </div>
              </a>
            </li>
            <li class="reasonList_item">
              <a class="reasonListPanel" href="<?php echo home_url(); ?>/reason/flow/">
                <div class="reasonListPanel_img img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/reason/img_flow.jpg" alt=""></div>
                <div class="reasonListPanel_body">
                  <h2 class="reasonListPanel_heading">家づくりの流れ</h2>
                </div>
              </a>
            </li>
            <li class="reasonList_item">
              <a class="reasonListPanel" href="<?php echo home_url(); ?>/reason/afterservice/">
                <div class="reasonListPanel_img img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/reason/img_afterservice.jpg" alt=""></div>
                <div class="reasonListPanel_body">
                  <h2 class="reasonListPanel_heading">アフターサービス</h2>
                </div>
              </a>
            </li>
            <li class="reasonList_item">
              <a class="reasonListPanel" href="<?php echo home_url(); ?>/faq/">
                <div class="reasonListPanel_img img img-scale"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/reason/img_qanda.jpg" alt=""></div>
                <div class="reasonListPanel_body">
                  <h2 class="reasonListPanel_heading">よくあるご質問（Q&A）</h2>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.reasonList -->
        </div>
      </section>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>

<!-- sub-container end -->
<?php get_footer(); ?>
