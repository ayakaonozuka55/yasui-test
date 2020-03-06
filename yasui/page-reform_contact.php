<?php get_header(); ?>
<?php
  function imgFromObj($obj) {
    $url = $obj["url"];
    echo "<img src='{$url}' class=''>";
  }
?>
<!-- sub-container -->

  <main class="main reform main_ex">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/making/reform_contact/bg_head.jpg);">
      <h1>リフォーム・リノベーション<br class="visible-xs">お問い合わせ・来場相談</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/making/">安井建設の家づくり</a></li>
        <li><a href="<?php echo home_url(); ?>/making/reform/">リフォーム・リノベーション</a></li>
        <li>お問い合わせ・来場相談</li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="lead lead-c">
        <div class="l-content-sm">
          <h2 class="lead-c_heading lead_heading"><span>リフォーム・リノベーションのこと、<br class="visible-xs">何でもご相談ください。</span></h2>
          <div class="text">
            <p>リフォーム・リノベーションのプロがお客様に合わせた最善なプランをご提案いたします。<br>また、押し売り・営業は一切いたしません。安心して、お気軽にお越しください。</p>
          </div>
        </div>
      </div>
      <section class="recommended bg_gray sectionwrap">
        <div class="l-content-sm">
          <div class="heading-a heading-a-sm">
            <h2 class="head"><span class="line"><span class="c-orange">ご来場いただく3つのポイント</span></span></h2>
            <p class="head_text">家づくりについてすべてを知り尽くした経験豊富な住宅のプロになんでも気軽に相談できる</p>
          </div>
          <div class="reform_contact_point">
            <div class="reform_contact_point_block">
              <div class="reform_contact_point_head">
                <div class="reform_contact_point_no">
                  <p class="reform_contact_point_no_inner">POINT<span>01</span></p>
                </div>
                <h3 class="reform_contact_point_heading">具体的な話や<br class="visible-md visible-sm">相談ができる</h3>
              </div>
              <div class="reform_contact_point_foot">
                <p>現状のお家の状態やリフォーム・リノベーションのことで不安なこと、悩んでいること、お客様のお考えなど何でもお話しください。実際にかかる費用や工事にかかる日数、手順、どのようなリフォームが良いかなど何でもお答えいたします。また、お客様に合った最善のアドバイスもさせていただきます。</p>
              </div>
            </div>
            <div class="reform_contact_point_block">
              <div class="reform_contact_point_head">
                <div class="reform_contact_point_no">
                  <p class="reform_contact_point_no_inner">POINT<span>02</span></p>
                </div>
                <h3 class="reform_contact_point_heading">ホームページでは<br class="visible-md visible-sm">知ることができない<br class="visible-md visible-sm">施工事例集や体感<br class="visible-md visible-sm">することができる</h3>
              </div>
              <div class="reform_contact_point_foot">
                <p>今までにリフォーム・リノベーションさせて頂いた数多くの施工事例集「Before」「After」を見る事ができます。実際に見て頂く事で参考になること間違いありません。会場によっては、体感することもできます。</p>
              </div>
            </div>
            <div class="reform_contact_point_block">
              <div class="reform_contact_point_head">
                <div class="reform_contact_point_no">
                  <p class="reform_contact_point_no_inner">POINT<span>03</span></p>
                </div>
                <h3 class="reform_contact_point_heading">ローンのご相談や<br class="visible-md visible-sm">シミュレーション</h3>
              </div>
              <div class="reform_contact_point_foot">
                <p>リフォーム・リノベーションでもお金の話は大切です。経験豊富な安井建設のアドバイザーが、リフォームローンをはじめとした住宅ローン商品ごとのメリットデメリットや、ライフプランに合わせたお客様に合った住宅ローンを診断・シミュレーションいたします。</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="reform_contact_cv">
        <h2 class="reform_contact_cv_heading"><span>リフォームリノベーションの事、<br>何でもお聞かせください。</span></h2>
        <div class="btn-h">
          <a href="#form"><span>問い合わせ・来場予約はこちら</span></a>
        </div>
      </section>
      <section class="reform_contact_venue bg_thinorange">
        <div class="l-content-sm">
          <div class="reform_contact_venue_head">
            <div class="heading-a heading-a-ex">
              <p class="reform_contact_venue_sub">ご家族もぜひ<br>ご一緒にどうぞ</p>
              <h2 class="head"><span class="line"><span class="c-orange">最寄りの会場を<br class="visible-xs">お選びください。</span></span></h2>
            </div>
          </div>
<?php
  $args= array(
    'post_type' => 'showroom','posts_per_page' => '-1');
  query_posts($args);
?>
<?php if ( have_posts() ) : ?>
<?php while (have_posts()) : the_post(); ?>
	<?php if(get_field('リフォームへ表示')):?>
          <div class="reform_contact_venue_block">
            <div class="reform_contact_venue_content">
              <div class="reform_contact_venue_img"><?php imgFromObj(get_field('リフォームメイン画像')); ?></div>
              <div class="reform_contact_venue_info">
                <h3 class="reform_contact_venue_heading"><?php the_title(); ?></h3>
                <div class="reform_contact_venue_table">
                  <div class="reform_contact_venue_tr">
                    <p class="reform_contact_venue_th">住所</p>
                    <p class="reform_contact_venue_td"><?php echo get_field('住所'); ?></p>
                  </div>
                  <div class="reform_contact_venue_tr">
                    <p class="reform_contact_venue_th">電話</p>
                    <p class="reform_contact_venue_td"><?php echo get_field('電話番号'); ?></p>
                  </div>
    							<?php if( have_rows('その他') ): ?>
    								<?php while ( have_rows('その他') ) : the_row(); ?>
                    <div class="reform_contact_venue_tr">
                      <p class="reform_contact_venue_th"><?php the_sub_field('表題'); ?></p>
                      <p class="reform_contact_venue_td"><?php the_sub_field('テキスト'); ?></p>
                    </div>
    								<?php endwhile; ?>
    							<?php endif; ?>
                </div>
              </div>
            </div>
            <?php if( have_rows('リフォーム特徴文') ): ?>
            <div class="reform_contact_venue_point">
              <?php while ( have_rows('リフォーム特徴文') ) : the_row(); ?>
              <p class="reform_contact_venue_point_item"><?php the_sub_field('文章'); ?></p>
              <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <div class="btn-h">
              <!-- <a href="#form"><?php the_title(); ?>に来場予約する</a> -->
              <a href="#form"><span>問い合わせ・来場予約はこちら</span></a>
            </div>
          </div>
  <?php endif; ?>
<?php endwhile; ?>
<?php wp_reset_query();endif; ?>
        </div>
      </section>
      <section class="request_form border_thinorange" id="form">
        <div class="l-content-sm">
          <div class="heading-a heading-a-sm">
            <h2 class="head"><span class="line"><span class="c-orange">リフォーム・リノベーション<br>お問い合わせ・来場相談予約</span></span></h2>
            <p class="head_text">フォームに従ってご入力をお願い致します。</p>
          </div>
          <div class="form reform_contact_form">
            <p class="form_note"><span class="c-red">*必須</span>は記入必須項目ですので、<span class="c-red">必ずご記入ください。</span><br><br>・メールアドレスは正しくご入力下さい。（弊社より返信メールが届きません。）<br>・半角カナ入力は文字化けの原因となりますのでご注意ください。<br>・データを送信される際の情報はSSL暗号化通信により保護されますので安心してご利用ください。</p>
            <form action="https://form.k3r.jp/yasuikensetsu/reformcontact" name="eventform" onsubmit="return checkSubmit();" method="POST">
              <div class="form_block hisu">
                <p class="form_heading">項目</p>
                <div class="form_content check">
									<label for="f_item_radio8_01"><input type="radio" name="f_item_radio8[]" value="お問い合わせ" id="f_item_radio8_01" />お問い合わせ</label>
									<label for="f_item_radio8_02"><input type="radio" name="f_item_radio8[]" value="来場予約" id="f_item_radio8_02" />来場予約</label>
                </div>
              </div>
              <div class="form_block nin">
                <p class="form_heading">来場場所</p>
                <div class="form_content form_select form_row">
                  <select name="f_item_drop7[]">
                  <option>選択してください</option>
                    <?php
                      $args= array(
                        'post_type' => 'showroom','posts_per_page' => '-1');
                      query_posts($args);
                    ?>
                  <?php if ( have_posts() ) : ?>
                  <?php while (have_posts()) : the_post(); ?>
                  	<?php if(get_field('リフォームへ表示')):?>
                    <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                    <?php endif; ?>
                  <?php endwhile; ?>
                  <?php wp_reset_query();endif; ?>
                  </select>
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">お問い合わせ内容</p>
                <div class="form_content form_block_naiyou check">
									<label for="f_item_select2_01"><input type="checkbox" name="f_item_select2[]" value="リフォームの事でのお問い合わせ" id="f_item_select2_01" />リフォームの事でのお問い合わせ</label>
                	<label for="f_item_select2_02"><input type="checkbox" name="f_item_select2[]" value="ショールーム来店予約" id="f_item_select2_02" />ショールーム来店予約</label>
                	<label for="f_item_select2_03"><input type="checkbox" name="f_item_select2[]" value="耐震補強工事について知りたい" id="f_item_select2_03" />耐震補強工事について知りたい</label>
                	<label for="f_item_select2_04"><input type="checkbox" name="f_item_select2[]" value="断熱リフォームについて知りたい" id="f_item_select2_04" />断熱リフォームについて知りたい</label>
                	<label for="f_item_select2_05"><input type="checkbox" name="f_item_select2[]" value="まるごとリフォームについて知りたい" id="f_item_select2_05" />まるごとリフォームについて知りたい</label>
                	<label for="f_item_select2_06"><input type="checkbox" name="f_item_select2[]" value="部分的なリフォームについて知りたい" id="f_item_select2_06" />部分的なリフォームについて知りたい</label>
                	<label for="f_item_select2_07"><input type="checkbox" name="f_item_select2[]" value="建て替えかリフォームか迷っている" id="f_item_select2_07" />建て替えかリフォームか迷っている</label>
                	<label for="f_item_select2_08"><input type="checkbox" name="f_item_select2[]" value="中古住宅を買ってリフォームしたい" id="f_item_select2_08" />中古住宅を買ってリフォームしたい</label>
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">名前（漢字）</p>
                <div class="form_row form_content">
                  <div class="form_col_6">
                    <input type="text" name="f_item_name_last" value="" placeholder="姓" class="input_text" required="required">
                  </div>
                  <div class="form_col_6">
                    <input type="text" name="f_item_name_first" value="" placeholder="名" class="input_text" required="required">
                  </div>
                </div>
              </div>
              <div class="form_block nin">
              	<p class="form_heading">住所：都道府県</p>
                <div class="form_content form_select form_row">
                  <div class="form_col_4">
                  	<select name="f_item_address_pref">
                  		<option value="" selected="">&lt;都道府県&gt;
                  		</option><option value="1">北海道
                  		</option><option value="2">青森県
                  		</option><option value="3">岩手県
                  		</option><option value="4">宮城県
                  		</option><option value="5">秋田県
                  		</option><option value="6">山形県
                  		</option><option value="7">福島県
                  		</option><option value="8">茨城県
                  		</option><option value="9">栃木県
                  		</option><option value="10">群馬県
                  		</option><option value="11">埼玉県
                  		</option><option value="12">千葉県
                  		</option><option value="13">東京都
                  		</option><option value="14">神奈川県
                  		</option><option value="15">新潟県
                  		</option><option value="16">富山県
                  		</option><option value="17">石川県
                  		</option><option value="18">福井県
                  		</option><option value="19">山梨県
                  		</option><option value="20">長野県
                  		</option><option value="21">岐阜県
                  		</option><option value="22">静岡県
                  		</option><option value="23">愛知県
                  		</option><option value="24">三重県
                  		</option><option value="25">滋賀県
                  		</option><option value="26">京都府
                  		</option><option value="27">大阪府
                  		</option><option value="28">兵庫県
                  		</option><option value="29">奈良県
                  		</option><option value="30">和歌山県
                  		</option><option value="31">鳥取県
                  		</option><option value="32">島根県
                  		</option><option value="33">岡山県
                  		</option><option value="34">広島県
                  		</option><option value="35">山口県
                  		</option><option value="36">徳島県
                  		</option><option value="37">香川県
                  		</option><option value="38">愛媛県
                  		</option><option value="39">高知県
                  		</option><option value="40">福岡県
                  		</option><option value="41">佐賀県
                  		</option><option value="42">長崎県
                  		</option><option value="43">熊本県
                  		</option><option value="44">大分県
                  		</option><option value="45">宮崎県
                  		</option><option value="46">鹿児島県
                  		</option><option value="47">沖縄県
                  		</option><option value="48">その他(日本国外等)
                  	</option></select>
                  </div>
                </div>
              </div>
              <div class="form_block nin">
                <p class="form_heading">住所：市・区・町・番地・建物名</p>
                <div class="form_content">
                  <input type="text" name="f_item_address_city" value="" class="input_text">
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">電話番号</p>
                <p class="form_block_note">確認のためのお電話を入れさせていただきます</p>
                <div class="form_col_8">
                  <input type="text" name="f_item_tel" value="" class="input_text" required="required">
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">メールアドレス</p>
                <div class="form_content form_row">
                  <div class="form_col_8">
                  	<input type="text" name="f_item_mail" value="" id="mailadrr" class="input_text" required="required">
                  </div>
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">メールアドレス（確認用）</p>
                <div class="form_content form_row">
                  <div class="form_col_8">
                  	<input type="text" name="f_item_division" value="" id="mailaddr_chk" class="input_text" required="required">
                  </div>
                </div>
              </div>
							<div class="form_block nin">
								<p class="form_heading">すでに担当させていただいている者がおりましたら名前をお書きください</p>
								<div class="form_content form_row">
									<div class="form_col_8">
										<input type="text" name="f_item_text6" value="" class="input_text">
									</div>
								</div>
							</div>
              <div class="form_privacy">
                <p>お客様に入力して頂いた氏名・住所・電話番号・E-mailアドレス等の個人情報は今後、弊社もしくは関係会社において、弊社が出展または主催する展示会・セミナーのご案内、弊社が提供する商品・サービスに関するご案内など各種情報のご提供、及び弊社営業部門からのご連絡などを目的として利用させて頂きます。弊社は、ご提供いただいた個人情報を、法令に基づく命令などを除いて、あらかじめお客様の同意を得ないで第三者に提供することはありません。</p>
              </div>
            	<input type="hidden" name="api_key" value="8b32762780ac192635644930399590b94ed9cfa7">
            	<input type="hidden" name="opt" value="1"><!-- メール配信 承諾=1 未承諾=0 -->
            	<input type="hidden" name="red" value="http://yasuiks.xsrv.jp/request-reform-thanks">

            	<!-- ↓↓↓オプション↓↓↓ -->
            	<!-- <input type="hidden" name="red_error" value="/contact/" /> -->
            	<!-- <input type="hidden" name="tag" value="フォーム登録時に付与したいリードタグ(カンマ区切りで複数可) (例: メロン,トマト)" /> -->

            	<!-- ↓↓↓テストモード↓↓↓ -->
            	<!-- APIフォームの動作テストをしたい場合は｢false｣を｢true｣にしてください。 -->
            	<!-- テストモードでは実際のフォーム登録は行われませんが自動返信メール等は送信されます。 -->
            	<input type="hidden" name="test_mode" value="false">
            	<!-- テストモードにおいて、フォーム登録が正しく行えることを確認したい場合にご使用ください。 -->
            	<!-- 以下の｢value｣に指定したメールアドレスにリード情報(登録通知の内容と同様)が送られます -->
            	<input type="hidden" name="test_mail" value="furukawa@t2c-inc.com">

            	<p class="form_submit"><input type="submit" value="プライバシーポリシーに同意して次へ"></p>
            </form>
        </div>
      </div>
    </section>
      <?php include('nav_reform.php'); ?>
    </article>
  </main>

<!-- TENP -->
<?php include('cv_reform.php'); ?>
<?php include('latest_event_reform.php'); ?>
<?php include('latest_column.php'); ?>

<!-- sub-container end -->
<?php get_footer(); ?>
