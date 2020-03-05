<?php get_header(); ?>
<!-- sub-container -->

  <main class="main contact main_ex bg_gray">
    <div class="main_head" style="background-image: url(/wp/wp-content/themes/yasui/assets/images/request/bg_head.jpg);">
      <h1>お問い合わせ</h1>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="/">TOP</a></li>
        <li>お問い合わせ</li>
      </ul>
    </div>
    <article class="maincontent">
      <section class="request_form ">
        <div class="l-content-sm">
          <div class="heading-a">
            <h2 class="head"><span class="line">お問い合わせ<br class="visible-xs"><span class="c-orange">フォーム</span></span></h2>
            <p class="head_text">てす必要事項をご記入いただき、 [プライバシーポリシーに同意して次へ] ボタンをクリックしてください。</p>
          </div>
         <div class="form">
            <p class="form_note"><span class="c-red">*必須</span>は記入必須項目ですので、<span class="c-red">必ずご記入ください。</span><br><br>・メールアドレスは正しくご入力下さい。（弊社より返信メールが届きません。）<br>・半角カナ入力は文字化けの原因となりますのでご注意ください。<br>・データを送信される際の情報はSSL暗号化通信により保護されますので安心してご利用ください。</p>
            <form action="https://form.k3r.jp/yasuikensetsu/test" onSubmit="return checkSubmit();" method="POST" name="Form1">
              <div class="form_block hisu">
                <p class="form_heading">名前（漢字）</p>
                <p class="form_block_note">全角で入力してください</p>
                <div class="form_row form_content">
                  <div class="form_col_6">
                    <input type="text" name="f_item_name_last" value="" placeholder="姓" class="input_text" required="required"  title="全角で入力してください"/>
                  </div>
                  <div class="form_col_6">
                    <input type="text" name="f_item_name_first" value="" placeholder="名" class="input_text" required="required"  title="全角で入力してください" />
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
              <div class="form_block nin">
                <p class="form_heading">電話番号</p>
                <p class="form_block_note">確認のためのお電話を入れさせていただきます</p>
                <div class="form_content form_row">
                  <div class="form_col_8">
                    <input type="text" name="f_item_tel" value="" class="input_text" />
                  </div>
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
                  	<input type="text" name="f_item_text4" value="" id="mailaddr_chk" class="input_text" required="required" />
                  </div>
                </div>
              </div>
              <div class="form_block hisu">
                <p class="form_heading">お問い合わせ内容</p>
                <div class="form_content">
                	<textarea name="f_item_free3" rows="12" placeholder="" class="input_textarea" required="required" ></textarea>
                </div>
              </div>
              <div class="form_privacy">
                <p>お客様に入力して頂いた氏名・住所・電話番号・E-mailアドレス等の個人情報は今後、弊社もしくは関係会社において、弊社が出展または主催する展示会・セミナーのご案内、弊社が提供する商品・サービスに関するご案内など各種情報のご提供、及び弊社営業部門からのご連絡などを目的として利用させて頂きます。弊社は、ご提供いただいた個人情報を、法令に基づく命令などを除いて、あらかじめお客様の同意を得ないで第三者に提供することはありません。</p>
              </div>
            	<input type="hidden" name="api_key" value="8b32762780ac192635644930399590b94ed9cfa7" />
            	<input type="hidden" name="opt" value="1" />
            	<input type="hidden" name="red" value="<?php echo home_url(); ?>/" />

            	<input type="hidden" name="test_mode" value="true" />
            	<input type="hidden" name="test_mail" value="hiraoka@t2c-inc.com" />

            	<p class="form_submit"><input type="submit" value="プライバシーポリシーに同意して次へ"/></p>
            </form>
        </div>
      </section>
    </article>
  </main>

<!-- TENP -->
<?php include('maincv.php'); ?>

<!-- sub-container end -->
<?php get_footer(); ?>
