<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<?php remove_filter('the_content', 'wpautop'); ?>
	<?php $content_txt = get_the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo "<img src='{$url}' class='section_thumb-img'>";
  }
  function imgFromObj1($obj) {
    $url = $obj["url"];
    echo "<img src='{$url}' class=''>";
  }
  function imgFromObj2($obj) {
    $url = $obj["url"];
    echo $url;
  }
?>
	<!-- MAIM -->
  <main class="main case_voice detail main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/model_house/bg_head.jpg);">
      <h1><?php the_title(); ?></h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/showroom"> 安井建設のショールーム・モデルハウス来場予約</a></li>
        <li><?php the_title(); ?></li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="lead lead-c">
        <div class="l-content-sm">
          <h2 class="lead-c_heading lead_heading"><span><?php the_field('見出し特徴文'); ?></span></h2>
          <div class="text">
            <p><?php the_field('リード文'); ?></p>
          </div>
        </div>
      </div>
      <section>
        <div class="l-content-sm">
          <div class="model_h_detail">
            <?php imgFromObj1(get_field('メイン画像')); ?>
            <h3><?php the_title(); ?></h3>
            <div class="model_h_list_wrap cf">
              <ul class="model_h_list_info">
                <li><span class="bg_w">住所</span><span class="detail"><?php the_field('住所'); ?></span></li>
                <li><span class="bg_w">電話</span><span class="detail"><?php the_field('電話番号'); ?></span></li>
							<?php if( have_rows('その他') ): ?>
								<?php while ( have_rows('その他') ) : the_row(); ?>
                <li><span class="bg_w"><?php the_sub_field('表題'); ?></span><span class="detail"><?php the_sub_field('テキスト'); ?></span></li>
								<?php endwhile; ?>
							<?php endif; ?>
              </ul>
              <ul class="model_h_list_txt">
							<?php if( have_rows('特徴文') ): ?>
								<?php while ( have_rows('特徴文') ) : the_row(); ?>
                <li><?php the_sub_field('文章'); ?></li>
								<?php endwhile; ?>
							<?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="u_cv">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/model_house/img_txt_reservation.png" alt="reservation">
          <p>ご見学、ご来店、ご相談はご予約をお願い致します。</p>
          <a href="#form">ご予約はこちら</a>
        </div>
        <div class="show_r_to_tel_box">
          <div class="show_r_to_tel_txt">お急ぎのお客様は<br class="visible-xs">お気軽にお電話ください。</div>
          <div class="show_r_to_tel_num"><a href="tal:0120543536">0120-54-3536</a></div>
        </div>
      </section>

      <section class="model_h_point">
        <div class="l-content-sm">
          <div class="casevoiceBlock_head">
            <div class="heading-a">
              <h2 class="title"><span class="line"><span class="c-orange">見どころポイント</span></span></h2>
            </div>
          </div>
          <div class="model_h_point_box_wrap">
            <ul class="model_h_point_box">
						<?php if( have_rows('見どころ') ): ?>
							<?php while ( have_rows('見どころ') ) : the_row(); ?>
							<?php
							 $attachment_id = get_sub_field('画像');
							 $size1 = "profile_size";
							 $image1 = wp_get_attachment_image_src( $attachment_id, $size1 );
							?>
	              <li>
	                <img src="<?php echo $image1[0]; ?>" alt="">
	                <h3><?php the_sub_field('タイトル'); ?></h3>
	                <p><?php the_sub_field('テキストエリア'); ?></p>
	              </li>
							<?php endwhile; ?>
						<?php endif; ?>
            </ul>
          </div>
        </div>
      </section>

      <section>
        <div class="u_cv">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/model_house/img_txt_reservation.png" alt="reservation">
          <p>ご見学、ご来店、ご相談はご予約をお願い致します。</p>
          <a href="#form">ご予約はこちら</a>
        </div>
        <div class="show_r_to_tel_box">
          <div class="show_r_to_tel_txt">お急ぎのお客様は<br class="visible-xs">お気軽にお電話ください。</div>
          <div class="show_r_to_tel_num"><a href="tal:0120543536">0120-54-3536</a></div>
        </div>
      </section>

      <section class="model_h_point">
        <div class="l-content-sm">
          <div class="casevoiceBlock_head">
            <div class="heading-a">
              <h2 class="title"><span class="line">アクセスマップ</span></h2>
            </div>
          </div>
          <div class="ggmap"><?php the_field('googlemap'); ?></div>
          <p class="ggmap_txt"><?php the_field('マップテキスト'); ?></p>
        </div>
      </section>

      <section>
        <div class="u_cv">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/model_house/img_txt_reservation.png" alt="reservation">
          <p>ご見学、ご来店、ご相談はご予約をお願い致します。</p>
          <a href="#form">ご予約はこちら</a>
        </div>
        <div class="show_r_to_tel_box">
          <div class="show_r_to_tel_txt">お急ぎのお客様は<br class="visible-xs">お気軽にお電話ください。</div>
          <div class="show_r_to_tel_num"><a href="tal:0120543536">0120-54-3536</a></div>
        </div>
      </section>

      <section class="model_h_point model">
        <div class="casevoiceBlock_head">
          <div class="heading-a">
            <h2 class="title"><span class="line">モデルハウス・店舗一覧</span></h2>
          </div>
        </div>
<?php
    $args= array(
		'post_type' => 'showroom'
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
          <div class="model_h_list_box modelhouse_slider" id="modelhouse_slider">
<?php while (have_posts()) : the_post(); ?>
            <div class="model_h_list_item">
							<a href="<?php the_permalink(); ?>">
<?php if( have_rows('画像スライダー') ): ?>
	<?php $gcnt=0; ?>
	<?php while ( have_rows('画像スライダー') ) : the_row(); ?>
	<?php
	 $attachment_id = get_sub_field('画像');
	 $size1 = "profile_size";
	 $image1 = wp_get_attachment_image_src( $attachment_id, $size1 );
	 $gcnt++;
	 if($gcnt=='1'):
	?>
	<div class="img img-scale">
    <img src="<?php echo $image1[0]; ?>" alt="">
	</div>
	<?php endif;?>
	<?php endwhile; ?>
<?php endif;?>
              <h4><?php the_title(); ?></h4>
              <p class="show_r_list_address"><?php the_field('住所'); ?></p>
              <p class="show_r_list_tel"><?php the_field('電話番号'); ?></p>
							</a>
            </div>
<?php endwhile; ?>
          </div>
<?php wp_reset_query();endif; ?>
      </section>


      <section class="request_form bg_gray" id="form">
        <div class="l-content-sm">
          <div class="heading-a">
            <h2 class="head"><span class="line">モデルハウス・店舗　ご来場ご予約<br class="visible-xs"><span class="c-orange">フォーム</span></span></h2>
            <p class="head_text">必要事項をご記入いただき、 [プライバシーポリシーに同意して次へ] ボタンをクリックしてください。</p>
          </div>
          <div class="form">
            <p class="form_note"><span class="c-red">*必須</span>は記入必須項目ですので、<span class="c-red">必ずご記入ください。</span><br><br>・メールアドレスは正しくご入力下さい。（弊社より返信メールが届きません。）<br>・半角カナ入力は文字化けの原因となりますのでご注意ください。<br>・データを送信される際の情報はSSL暗号化通信により保護されますので安心してご利用ください。</p>
            <form action="https://form.k3r.jp/yasuikensetsu/madelnew" name="eventform" onSubmit="return checkSubmit();" method="POST">
              <div class="form_block hisu">
                <p class="form_heading">ショールーム・モデルハウス名</p>
                <div class="form_content">
                  <input type="text" name="f_item_text4" value="<?php the_title(); ?>" class="input_text" readonly required="required" />
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">ご計画</p>
                <div class="form_content check">
									<label for="shinchiku"><input type="checkbox" name="f_item_select6[]" value="新築" id="shinchiku" />新築</label>
									<label for="tatekae"><input type="checkbox" name="f_item_select6[]" value="建て替え" id="tatekae" />建て替え</label>
									<label for="reform"><input type="checkbox" name="f_item_select6[]" value="リフォーム" id="reform" />リフォーム</label>
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">名前（漢字）</p>
                <div class="form_row form_content">
                  <div class="form_col_6">
                    <input type="text" name="f_item_name_last" value="" placeholder="姓" class="input_text" required="required" />
                  </div>
                  <div class="form_col_6">
                    <input type="text" name="f_item_name_first" value="" placeholder="名" class="input_text" required="required" />
                  </div>
                </div>
              </div>
              <div class="form_block nin">
              	<p class="form_heading">住所：都道府県</p>
                <div class="form_content form_select form_row">
                  <div class="form_col_4">
                  	<select name="f_item_address_pref">
                  		<option value="" selected><都道府県>
                  		<option value="1">北海道
                  		<option value="2">青森県
                  		<option value="3">岩手県
                  		<option value="4">宮城県
                  		<option value="5">秋田県
                  		<option value="6">山形県
                  		<option value="7">福島県
                  		<option value="8">茨城県
                  		<option value="9">栃木県
                  		<option value="10">群馬県
                  		<option value="11">埼玉県
                  		<option value="12">千葉県
                  		<option value="13">東京都
                  		<option value="14">神奈川県
                  		<option value="15">新潟県
                  		<option value="16">富山県
                  		<option value="17">石川県
                  		<option value="18">福井県
                  		<option value="19">山梨県
                  		<option value="20">長野県
                  		<option value="21">岐阜県
                  		<option value="22">静岡県
                  		<option value="23">愛知県
                  		<option value="24">三重県
                  		<option value="25">滋賀県
                  		<option value="26">京都府
                  		<option value="27">大阪府
                  		<option value="28">兵庫県
                  		<option value="29">奈良県
                  		<option value="30">和歌山県
                  		<option value="31">鳥取県
                  		<option value="32">島根県
                  		<option value="33">岡山県
                  		<option value="34">広島県
                  		<option value="35">山口県
                  		<option value="36">徳島県
                  		<option value="37">香川県
                  		<option value="38">愛媛県
                  		<option value="39">高知県
                  		<option value="40">福岡県
                  		<option value="41">佐賀県
                  		<option value="42">長崎県
                  		<option value="43">熊本県
                  		<option value="44">大分県
                  		<option value="45">宮崎県
                  		<option value="46">鹿児島県
                  		<option value="47">沖縄県
                  		<option value="48">その他(日本国外等)
                  	</select>
                  </div>
                </div>
              </div>
              <div class="form_block nin">
                <p class="form_heading">住所：市・区・町・番地・建物名</p>
                <div class="form_content">
                  <input type="text" name="f_item_address_city" value="" class="input_text" />
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">電話番号</p>
                <p class="form_block_note">確認のためのお電話を入れさせていただきます</p>
                <div class="form_col_8">
                  <input type="text" name="f_item_tel" value="" class="input_text" required="required" />
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">メールアドレス</p>
                <div class="form_content form_row">
                  <div class="form_col_8">
                  	<input type="text" name="f_item_mail" value="" id="mailadrr" class="input_text" required="required" />
                  </div>
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">メールアドレス（確認用）</p>
                <div class="form_content form_row">
                  <div class="form_col_8">
                  	<input type="text" name="f_item_text5" value="" id="mailaddr_chk" class="input_text" required="required" />
                  </div>
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">ご予約希望日</p>
                <div class="form_content">
                  <div class="form_content form_calendar form_row">
                    <div class="form_col_4 form_calendar_wrap">
                      <input type="text" name="f_item_calendar1" placeholder="クリックでカレンダー起動" class="input_text input_date" value="" required="required" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">ご予約希望時間</p>
                <div class="form_content">
                  <div class="form_content form_select form_row">
                    <div class="form_col_4">
                      <select name="f_item_drop3[]" required="required">
                        <option value="10時">10時</option>
                        <option value="10時30分">10時30分</option>
                        <option value="11時">11時</option>
                        <option value="11時30分">11時30分</option>
                        <option value="12時">12時</option>
                        <option value="12時30分">12時30分</option>
                        <option value="13時">13時</option>
                        <option value="13時30分">13時30分</option>
                        <option value="14時">14時</option>
                        <option value="14時30分">14時30分</option>
                        <option value="15時">15時</option>
                        <option value="15時30分">15時30分</option>
                        <option value="16時">16時</option>
                        <option value="16時30分">16時30分</option>
                        <option value="17時">17時</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
							<div class="form_block nin">
								<p class="form_heading">すでに担当させていただいている者がおりましたら名前をお書きください</p>
								<div class="form_content form_row">
									<div class="form_col_8">
										<input type="text" name="f_item_text7" value="" class="input_text" />
									</div>
								</div>
							</div>
              <div class="form_privacy">
                <p>お客様に入力して頂いた氏名・住所・電話番号・E-mailアドレス等の個人情報は今後、弊社もしくは関係会社において、弊社が出展または主催する展示会・セミナーのご案内、弊社が提供する商品・サービスに関するご案内など各種情報のご提供、及び弊社営業部門からのご連絡などを目的として利用させて頂きます。弊社は、ご提供いただいた個人情報を、法令に基づく命令などを除いて、あらかじめお客様の同意を得ないで第三者に提供することはありません。</p>
              </div>
            	<input type="hidden" name="api_key" value="8b32762780ac192635644930399590b94ed9cfa7" />
            	<input type="hidden" name="opt" value="1" /><!-- メール配信 承諾=1 未承諾=0 -->
            	<input type="hidden" name="red" value="<?php echo home_url(); ?>/showroom-thanks" />

            	<!-- ↓↓↓オプション↓↓↓ -->
            	<!-- <input type="hidden" name="red_error" value="/contact/" /> -->
            	<!-- <input type="hidden" name="tag" value="フォーム登録時に付与したいリードタグ(カンマ区切りで複数可) (例: メロン,トマト)" /> -->

            	<!-- ↓↓↓テストモード↓↓↓ -->
            	<!-- APIフォームの動作テストをしたい場合は｢false｣を｢true｣にしてください。 -->
            	<!-- テストモードでは実際のフォーム登録は行われませんが自動返信メール等は送信されます。 -->
            	<input type="hidden" name="test_mode" value="false" />
            	<!-- テストモードにおいて、フォーム登録が正しく行えることを確認したい場合にご使用ください。 -->
            	<!-- 以下の｢value｣に指定したメールアドレスにリード情報(登録通知の内容と同様)が送られます -->
            	<input type="hidden" name="test_mail" value="furukawa@t2c-inc.com" />

            	<p class="form_submit"><input type="submit" value="プライバシーポリシーに同意して次へ"/></p>
            </form>
        </div>
      </section>



			<!-- TENP -->
			<?php include('maincv.php'); ?>

      <section class="info section-info bg_thinpink">
        <div class="l-content-sm">
          <div class="casevoiceBlock">
            <div class="casevoiceBlock_head">
              <div class="heading-a">
                <h2 class="title"><span class="line">最新の見学会・イベント情報</span></h2>
              </div>
            </div>
<?php
date_default_timezone_set('Asia/Tokyo');

    $args= array(
		'post_type' => 'event',
		'posts_per_page' => '4',
		'orderby' => 'meta_value',
		'meta_key' => '開始日',
		'order' => 'ASC',
		'meta_query' => array(
			array( 'key' => '終了日',
				'value' => date('Y/m/d'),
				'compare' => '>=',
				'type' => 'DATE'
				),
			array( 'key' => '終了日',
				'value' => '',
				'compare' => '=',
				),
				'relation'=>'OR'
			)
   );
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
            <ul class="articleList articleList-4column">
<?php while (have_posts()) : the_post(); ?>
              <li class="articleItem articleItem-bgWhite">
                <a href="<?php the_permalink() ?>">
                  <div class="img img-scale">
<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'index_size' );
if($thumbnail_image_url[0]){
	echo '<img src="' . $thumbnail_image_url[0] . '" class="" style="">';
}else{
	echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage220.png" class="" style="">';
}
?>
									</div>
                  <div class="content">
                    <p class="day"><?php the_time('Y.m.d'); ?><</p>
                    <h3 class="heading">
<?php
if(mb_strlen($post->post_title, 'UTF-8')>30){
	$title= mb_substr($post->post_title, 0, 30, 'UTF-8');
	echo $title.'…';
}else{
	echo $post->post_title;
}
?>
										</h3>
                    <p class="text">
<?php
$acfcontent = get_field('リード文');
if(mb_strlen($acfcontent, 'UTF-8')>30){
	$acfcontent= mb_substr($acfcontent, 0, 30, 'UTF-8');
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
						$cnt++;
					}
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
<?php wp_reset_query();endif; ?>
            <div class="btn-a">
              <a href="<?php echo home_url(); ?>/event">もっと見る</a>
            </div>
      </section>
    </article>
  </main>


<?php get_footer(); ?>
