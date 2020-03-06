<?php get_header(); ?>
<!-- sub-container -->
  <main class="main request main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/request/bg_head.jpg);">
      <h1>リフォーム・リノベーション資料請求 ダウンロード</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
				<li><a href="<?php echo home_url(); ?>/">TOP</a></li>
				<li><a href="<?php echo home_url(); ?>/request/">資料請求</a></li>
        <li>リフォーム・リノベーション資料請求 ダウンロード</li>
      </ul>
    </div>
    <article class="maincontent">
      <section class="request_reform">
        <div class="heading-a">
          <h2 class="head"><span class="line">リフォーム・リノベーションに<br><span class="c-orange">役立つ資料をお届けします</span></span></h2>
        </div>
        <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/request-renovation/img_request.png" alt=""></div>
      </section>
      <section class="request_form bg_gray">
        <div class="l-content-sm">
          <div class="heading-a">
            <h2 class="head"><span class="line">資料ダウンロード<br class="visible-xs"><span class="c-orange">お申し込みフォーム</span></span></h2>
            <p class="head_text">必要事項をご記入いただき、 [プライバシーポリシーに同意して次へ] ボタンをクリックしてください。<br>送信後、資料ダウンロードページをメールにてお知らせいたします。</p>
					</div>
					<div class="request_form_btn">
						<div class="btn-a btn">
							<a href="<?php echo home_url(); ?>/request/request-new/">新築資料請求ダウンロードはこちら</a>
						</div>
					</div>
          <div class="form">
            <p class="form_note"><span class="c-red">*必須</span>は記入必須項目ですので、<span class="c-red">必ずご記入ください。</span><br><br>・メールアドレスは正しくご入力下さい。（弊社より返信メールが届きません。）<br>・半角カナ入力は文字化けの原因となりますのでご注意ください。<br>・データを送信される際の情報はSSL暗号化通信により保護されますので安心してご利用ください。</p>
						<!--<form action="https://form.k3r.jp/yasuikensetsu/shiryonew2" onSubmit="return checkSubmit();" id="reqdl" method="POST">-->
						<!-- <form action="https://form.k3r.jp/yasuikensetsu/requestnew" method="POST"> -->
							<form action="<?php echo get_template_directory_uri(); ?>/requestpost-reform.php" onSubmit="return checkSubmit();" id="reqdl" method="POST">
              <div class="form_block hisu">
              	<p class="form_heading">ご希望の資料をお選びください</p>
                <div class="form_content form_select form_row">
                  <div class="form_row form_catalog">
									<?php if( have_rows('資料請求ダウンロード')): ?>
									<?php $dlcnt=0;?>
									<?php while ( have_rows('資料請求ダウンロード')) : the_row(); ?>

										<div class="form_col_6 form_catalog_card">
											<input type="checkbox" name="f_item_select4[]" value="<?php the_sub_field('タイトル'); ?>（<?php the_sub_field('ダウンロードファイル'); ?>）" id="dl_<?php echo $dlcnt;?>" />
											<label for="dl_<?php echo $dlcnt;?>" class="form_catalog_label">
												<div class="form_catalog_head">
													<div class="form_catalog_checkbox"><span></span></div>
													<h3 class="form_catalog_heading"><?php the_sub_field('タイトル'); ?></h3>
												</div>
												<div class="form_catalog_foot">
													<p class="form_catalog_text"><?php the_sub_field('リード文'); ?></p>
													<div class="form_catalog_img"><span style="background-image: url(<?php the_sub_field('画像'); ?>);"></span></div>
												</div>
											</label>
										</div>

									<?php $dlcnt++;?>
									<?php endwhile; ?>
									<?php endif; ?>

                  </div>
								</div>
              </div>
              <div class="form_block hisu">
              	<p class="form_heading">名前（漢字）</p>
                <div class="form_row form_content">
                  <div class="form_col_6">
                  	<input type="text" name="f_item_name_last" value="" placeholder="姓" class="input_text" required="required"  />
                  </div>
                  <div class="form_col_6">
                  	<input type="text" name="f_item_name_first" value="" placeholder="名" class="input_text" required="required"  />
                  </div>
                </div>
              </div>
              <div class="form_block hisu">
              	<p class="form_heading">住所：都道府県</p>
                <div class="form_content form_select form_row">
                  <div class="form_col_4">
                  	<select name="f_item_address_pref" required="required" >
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
              <div class="form_block hisu">
                <p class="form_heading">住所：市・区・町・番地・建物名</p>
                <div class="form_content">
                  <input type="text" name="f_item_address_city" value="" class="input_text" required="required"  />
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">電話番号</p>
                <p class="form_block_note">確認のためのお電話を入れさせていただきます</p>
                <div class="form_content form_row">
                  <div class="form_col_8">
                    <input type="text" name="f_item_tel" value="" class="input_text" required="required"  />
                  </div>
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">メールアドレス</p>
                <div class="form_content form_row">
                  <div class="form_col_8">
                  	<input type="text" name="f_item_mail" value="" class="input_text" required="required"  />
                  </div>
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">メールアドレス（確認用）</p>
                <div class="form_content form_row">
                  <div class="form_col_8">
                    <input type="text" name="f_item_text5" value="" class="input_text" required="required"  />
                  </div>
                </div>
							</div>
							<div class="form_block hisu">
                <p class="form_heading">プライバシーポリシーに同意</p>
                <div class="form_content form_row">
                  <div class="form_col_8">
										<input type="radio" id="form_radio_opp" name="f_item_radio7[]" checked="checked">
										<label for="form_radio_opp" class="radio" value="同意しない">同意しない</label>
										<input type="radio" id="form_radio_con" name="f_item_radio7[]">
										<label for="form_radio_con" class="radio" value="同意する" required="required">同意する</label>
                  </div>
                </div>
              </div>
              <div class="form_privacy">
                <p>お客様に入力して頂いた氏名・住所・電話番号・E-mailアドレス等の個人情報は今後、弊社もしくは関係会社において、弊社が出展または主催する展示会・セミナーのご案内、弊社が提供する商品・サービスに関するご案内など各種情報のご提供、及び弊社営業部門からのご連絡などを目的として利用させて頂きます。弊社は、ご提供いただいた個人情報を、法令に基づく命令などを除いて、あらかじめお客様の同意を得ないで第三者に提供することはありません。</p>
              </div>

            	<!-- ↓↓↓必須↓↓↓ -->
            	<input type="hidden" name="api_key" value="8b32762780ac192635644930399590b94ed9cfa7" />
            	<input type="hidden" name="opt" value="1" /><!-- メール配信 承諾=1 未承諾=0 -->
            	<input type="hidden" name="red" value="<?php echo home_url(); ?>/request-reform-thanks" />
              <!--  終了画面-->

            	<!-- ↓↓↓オプション↓↓↓ -->
            	<!-- <input type="hidden" name="red_error" value="https://example.com/error.html" /> -->
              <!-- エラ＾-->
            	<!-- <input type="hidden" name="tag" value="フォーム登録時に付与したいリードタグ(カンマ区切りで複数可) (例: メロン,トマト)" /> -->

            	<!-- ↓↓↓テストモード↓↓↓ -->
            	<!-- APIフォームの動作テストをしたい場合は｢false｣を｢true｣にしてください。 -->
            	<!-- テストモードでは実際のフォーム登録は行われませんが自動返信メール等は送信されます。 -->
            	<input type="hidden" name="test_mode" value="false" />
            	<!-- テストモードにおいて、フォーム登録が正しく行えることを確認したい場合にご使用ください。 -->
            	<!-- 以下の｢value｣に指定したメールアドレスにリード情報(登録通知の内容と同様)が送られます -->
            	<input type="hidden" name="test_mail" value="onozuka@t2c-inc.com" />

            	<p class="form_submit"><input type="submit" value="プライバシーポリシーに同意して次へ"/></p>
            </form>
        </div>
      </section>
    </article>
  </main>
<!-- TENP -->
<?php include('cv_reform.php'); ?>

<!-- sub-container end -->
<?php get_footer(); ?>
