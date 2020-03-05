<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<?php remove_filter('the_content', 'wpautop'); ?>
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
$taxonomy_names = get_post_taxonomies();
$terms = get_the_terms($post->ID,$taxonomy_names[0]);
$postid = $post->ID;
date_default_timezone_set('Asia/Tokyo');
?>
	<!-- MAIM -->
  <main class="main event">
    <div class="main_head" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/staffblog/bg_head.jpg);">
      <div>見学会・イベント・セミナー情報</div>
    </div>
    <div class="breadcrumbs">
      <ul class="cf l-content-sm">
        <li><a href="<?php echo home_url(); ?>/">TOP</a></li>
        <li><a href="<?php echo home_url(); ?>/event/">見学会・イベント・セミナー情報</a></li>
				<li><a href="<?php echo home_url(); ?>/event_category/<?php echo $terms[0]->slug; ?>"><?php echo $terms[0]->name; ?></a></li>
        <li><?php the_title(); ?></li>
      </ul>
    </div>
    <article class="maincontent">
      <div class="l-content-sm cf">
        <article class="main_body">
          <div class="component c-detailhead c-detailhead-e">
<?php if(date("Y/m/d") <= get_field('終了日')):?>
            <div class="held held-accepting">予約受付中</div>
<?php else:?>
            <div class="held held-end">終了しました</div>
<?php endif;?>
            <h1 class="heading"><?php the_title(); ?></h1>
            <div class="body cf">
              <div class="img">
<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
	if($thumbnail_image_url){
		echo '<img src="' . $thumbnail_image_url[0] . '" class="" style="">';
	}else{
		echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage.jpg" class="" style="">';
	}
?>
							</div>
              <div class="content">
                <div class="table">
                  <div class="table-tr">
                    <h2 class="table-th"><span>日程</span></h2>
                    <p class="table-td"><?php the_field('日程'); ?></p>
                  </div>
                  <div class="table-tr">
                    <h2 class="table-th"><span>時間</span></h2>
                    <p class="table-td"><?php the_field('時間'); ?></p>
                  </div>
                  <div class="table-tr">
                    <h2 class="table-th"><span>場所</span></h2>
                    <p class="table-td">
                      <?php the_field('場所'); ?>
											<?php if(get_field('地図リンク')):?>
                      	<a href="<?php the_field('地図リンク'); ?>" class="table-map">地図</a>
											<?php endif; ?>
                    </p>
                  </div>
                </div>
                <ul class="category cf">
<?php
	$taxonomy_names = get_post_taxonomies();
	$terms = get_the_terms($postid,$taxonomy_names[0]);
	if($terms){
	    foreach ($terms as $cate) {
	      $term_name = $cate->name;
	      $term_slug = $cate->slug;
	      $term_oya = $cate->parent;
				if($term_oya != '0'){
					$cat_link = get_term_link($term_slug,'event_category');
					echo '<li><a href="'.$cat_link.'">'.$term_name.'</a></li>';
				}
	    }
	}
?>
                </ul>
              </div>
            </div>
            <div class="foot">
              <div class="text">
								<?php if(get_field('リード文')):?>
	                <p><?php the_field('リード文'); ?></p>
								<?php endif; ?>
             </div>
            </div>
          </div>

<?php if( have_rows('コンポーネント') ): ?>
<?php while ( have_rows('コンポーネント') ) : the_row(); ?>
<?php if( get_row_layout() == '大見出し' ): ?>
          <div class="component c-mainheading">
            <h2 class="head"><?php the_sub_field('大見出し'); ?></h2>
          </div>

<?php elseif( get_row_layout() == '中見出し' ): ?>
          <div class="component c-middleheading">
            <h3 class="head"><?php the_sub_field('中見出し'); ?></h3>
          </div>

<?php elseif( get_row_layout() == '小見出し' ): ?>
          <div class="component c-subheading">
            <h4 class="head"><?php the_sub_field('小見出し'); ?></h4>
          </div>

<?php elseif( get_row_layout() == 'テキストエリア' ): ?>
          <div class="component c-text">
            <?php the_sub_field('テキストエリア'); ?>
          </div>

<?php elseif( get_row_layout() == 'リンクボタン' ): ?>
          <div class="component c-btn btn-a">
            <a href="<?php the_sub_field('リンク先url'); ?>"><?php the_sub_field('リンク名'); ?></a>
          </div>

<?php elseif( get_row_layout() == '画像' ): ?>
          <div class="component c-img-col1">
            <div class="img">
              <?php imgFromObj(get_sub_field('画像')); ?>
              <p class="caption"><?php the_sub_field('キャプション'); ?></p>
            </div>
          </div>

<?php elseif( get_row_layout() == '2列画像' ): ?>
          <div class="component c-img-col2">
            <div class="img">
              <?php imgFromObj(get_sub_field('画像①')); ?>
              <p class="caption"><?php the_sub_field('キャプション①'); ?></p>
            </div>
            <div class="img">
              <?php imgFromObj(get_sub_field('画像②')); ?>
              <p class="caption"><?php the_sub_field('キャプション②'); ?></p>
            </div>
          </div>

<?php elseif( get_row_layout() == 'youtube' ): ?>
          <div class="component c-movie">
            <div class="inner">
               <?php the_sub_field('youtube'); ?>
            </div>
            <p class="caption"><?php the_sub_field('キャプション'); ?></p>
          </div>

<?php elseif( get_row_layout() == 'googlemap' ): ?>
          <div class="component c-map">
            <div class="inner">
              <?php the_sub_field('googlemap'); ?>
            </div>
            <p class="caption"><?php the_sub_field('キャプション'); ?></p>
          </div>

<?php elseif( get_row_layout() == 'ギャラリー' ): ?>
          <div class="component c-gallery">
            <div class="gallery_list">
						<?php while ( have_rows('ギャラリー') ) : the_row(); ?>
<?php
 $attachment_id = get_sub_field('画像');
 $size1 = "full";
 $size2 = "sq_size";
 $image1 = wp_get_attachment_image_src( $attachment_id, $size1 );
 $image2 = wp_get_attachment_image_src( $attachment_id, $size2 );
?>
              <div class="item">
                <a href="<?php echo $image1[0]; ?>" class="galley_trigger" data-group="gallery01">
								<img src="<?php echo $image2[0]; ?>" alt="">
								</a>
                <p class="caption"><?php the_sub_field('キャプション'); ?></p>
              </div>
						<?php endwhile; ?>
            </div>
          </div>

<?php elseif( get_row_layout() == 'おすすめ記事' ): ?>
<?php
$posts = get_sub_field('おすすめ記事');
if( $posts ):
?>
	<?php foreach( $posts as $val ): ?>
          <div class="component c-reccomend">
            <div class="img">
<?php
$gazou_id = get_the_post_thumbnail_url( $val->ID, 'full' );
if($gazou_id){
	echo '<img src="' . $gazou_id . '" style="">';
}else{
	echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage220.png" class="" style="">';
}
?>
						</div>
            <div class="content">
              <h5 class="heading"><?php echo get_the_title( $val->ID ); ?></h5>
              <div class="c-text"><p>
<?php
    $content = get_page($val->ID);
if(mb_strlen($content->post_content, 'UTF-8')>40){
    $content= mb_substr(strip_tags(apply_filters('the_content', $content->post_content), '<br><span>'), 0,40, 'UTF-8');
    echo $content.'…';
}else{
    echo strip_tags(apply_filters('the_content', $content->post_content), '<br><span>');
}
?>
							</p></div>
              <div class="btn-c"><a href="<?php echo get_permalink( $val->ID ); ?>">もっと見る</a></div>
            </div>
          </div>
	<?php endforeach; ?>
<?php endif; ?>

<?php elseif( get_row_layout() == '日程' ): ?>
          <div class="component c-agenda">
						<table>
							<tbody>
								<tr>
									<th>日程</th>
									<td><?php the_sub_field('日程'); ?></td>
								</tr>
								<tr>
									<th>時間</th>
									<td><?php the_sub_field('時間'); ?></td>
								</tr>
								<tr>
									<th>住所</th>
									<td><?php the_sub_field('住所'); ?></td>
								</tr>

								<?php while ( have_rows('その他') ) : the_row(); ?>
								<tr>
									<th><?php the_sub_field('表題'); ?></th>
									<td><?php the_sub_field('テキストエリア'); ?></td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
          </div>
	<?php elseif( get_row_layout() == '写真テキスト' ): ?>
		<?php
		$imgtext = get_sub_field('並び順');
		if ($imgtext == 'imgtext'){
	    echo '<div class="component c-imgtext">';
		} else {
	    echo '<div class="component c-imgtext c-imgtext-re">';
		}
		?>
			<div class="img">
				<?php imgFromObj(get_sub_field('画像')); ?>
			</div>
			<div class="c-text">
				<?php the_sub_field('テキストエリア'); ?>
			</div>
		</div>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<?php if(date("Y/m/d") < get_field('終了日')):?>
          <div class="component c-form">
            <a href="#form">
              <span>24時間受付</span>
              WEBご予約フォームは<br class="visible-xs">こちら
            </a>
          </div>
<?php endif;?>

<?php if(get_field('オススメ記事')):?>
<div class="component c-reccomendRelation">
	<h3 class="head"><?php the_field('オススメ記事タイトル'); ?></h3>
							<?php
							$posts = get_field('オススメ記事');
							if( $posts ):
							?>
            <ul class="articleList articleList-lengthwise">
								<?php foreach( $posts as $val ): ?>
		              <li class="articleItem event-accepting">
			                <div class="imgwrap">
			                  <a href="<?php echo get_permalink( $val->ID ); ?>" class="cf">
			                    <div class="img img-scale">
													<?php
													$gazou_id = get_the_post_thumbnail_url( $val->ID, 'index_size' );
													if($gazou_id){
														echo '<img src="' . $gazou_id . '" style="" >';
													}else{
														echo '<img src="/wp/wp-content/themes/yasui/assets/images/common/noimage220.png" class="" style="">';
													}
													?>
												</div>
												</a>
											</div>
					            <div class="content">
			                  <a href="<?php echo get_permalink( $val->ID ); ?>" class="cf">
					              <h4 class="heading"><?php echo get_the_title( $val->ID ); ?></h4>
			                  </a>
			                </div>
					          </li>
									<?php endforeach; ?>
	              </ul>
							<?php endif; ?>
						</div>
						<?php endif; ?>


            <section class="event_form" id="form">
              <div class="l-content-sm">
                <div class="heading-a heading-a-ex">
                  <h2 class="head"><span class="line">見学会・イベント<br class="visible-xs"><span class="c-orange">お申し込みフォーム</span></span></h2>
                  <p class="head_text">必要事項をご記入いただき、 [プライバシーポリシーに同意して次へ] ボタンをクリックしてください。</p>
                </div>
                <div class="form">
                  <p class="form_note"><span class="c-orange">*必須</span>は記入必須項目ですので、<span class="c-orange">必ずご記入ください。</span><br><br>・メールアドレスは正しくご入力下さい。（弊社より返信メールが届きません。）<br>・半角カナ入力は文字化けの原因となりますのでご注意ください。<br>・データを送信される際の情報はSSL暗号化通信により保護されますので安心してご利用ください。</p>
                  <form action="https://form.k3r.jp/yasuikensetsu/eventnew" onSubmit="return checkSubmit();" method="POST">
                    <div class="form_block hisu">
                      <p class="form_heading">見学会・イベント名</p>
                      <div class="form_content">
                      	<input type="text" name="f_item_text7" value="<?php the_title(); ?>" class="input_text" readonly required="required" />
                      </div>
                    </div>
			              <div class="form_block hisu">
			                <p class="form_heading">ご計画</p>
			                <div class="form_content check">
												<label for="shinchiku"><input type="checkbox" name="f_item_select10[]" value="新築" id="shinchiku" />新築</label>
												<label for="tatekae"><input type="checkbox" name="f_item_select10[]" value="建て替え" id="tatekae" />建て替え</label>
												<label for="reform"><input type="checkbox" name="f_item_select10[]" value="リフォーム" id="reform" />リフォーム</label>
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
                        <div class="form_col_6">
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
                      <div class="form_content form_row">
                        <div class="form_col_8">
                          <input type="text" name="f_item_tel" value="" class="input_text" required="required" />
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
                        	<input type="text" name="f_item_text9" value="" id="mailaddr_chk" class="input_text" required="required" />
                        </div>
                      </div>
                    </div>
                    <div class="form_block hisu">
                      <p class="form_heading">ご予約希望日</p>
                      <div class="form_content">
                        <div class="form_content form_calendar form_row">
                          <div class="form_col_6 form_calendar_wrap">
                          	<input type="text" name="f_item_calendar4" placeholder="クリックでカレンダー起動" class="input_text input_date" value="" required="required" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form_block hisu">
                      <p class="form_heading">ご予約希望時間</p>
                      <div class="form_content">
                        <div class="form_content form_select form_row">
                          <div class="form_col_6">
                            <select name="f_item_drop6[]" required="required">
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
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form_block hisu">
                      <p class="form_heading">ご参加人数</p>
                      <div class="form_content">
                      	<input type="radio" name="f_item_radio8[]" value="1人" />1人
                      	<input type="radio" name="f_item_radio8[]" value="2人" />2人
                      	<input type="radio" name="f_item_radio8[]" value="3人" />3人
                      	<input type="radio" name="f_item_radio8[]" value="4人" />4人
                      	<input type="radio" name="f_item_radio8[]" value="5人" />5人
                      	<input type="radio" name="f_item_radio8[]" value="6人" />6人
                      </div>
                    </div>
                    <div class="form_block nin">
                      <p class="form_heading">すでに担当させていただいている者がおりましたら名前をお書きください</p>
                      <div class="form_content form_row">
                        <div class="form_col_8">
                          <input type="text" name="f_item_text11" value="" class="input_text" />
                        </div>
                      </div>
                    </div>
                    <div class="form_block nin">
                      <p class="form_heading">自由記入</p>
                      <div class="form_content">
                      	<textarea name="f_item_free3" rows="12" placeholder="自由記入" class="input_textarea"></textarea>
                      </div>
                    </div>
                    <div class="form_privacy">
                      <p>お客様に入力して頂いた氏名・住所・電話番号・E-mailアドレス等の個人情報は今後、弊社もしくは関係会社において、弊社が出展または主催する展示会・セミナーのご案内、弊社が提供する商品・サービスに関するご案内など各種情報のご提供、及び弊社営業部門からのご連絡などを目的として利用させて頂きます。弊社は、ご提供いただいた個人情報を、法令に基づく命令などを除いて、あらかじめお客様の同意を得ないで第三者に提供することはありません。</p>
                    </div>
                  	<input type="hidden" name="api_key" value="8b32762780ac192635644930399590b94ed9cfa7" />
                  	<input type="hidden" name="opt" value="1" /><!-- メール配信 承諾=1 未承諾=0 -->
                  	<input type="hidden" name="red" value="<?php echo home_url(); ?>/event-thanks" />

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

        </article>
				<!-- TENP -->
				<?php include('side_event.php'); ?>
      </div>
    </article>
  </main>


	<!-- TENP -->

	<?php
	$brand_terms = get_the_terms($postid,'event_brand');
	$reform_flg = '';
	if($brand_terms){
	    foreach ($brand_terms as $brand_term) {
	      $brand_term_slug = $brand_term->slug;
				if($brand_term_slug == 'eventbrand-reform'){
					$reform_flg = 'true';
				}
	    }
	}
	?>
	<!-- リフォーム・リノベーション判断 -->
	<?php if($reform_flg):?>
		<?php include('cv_reform.php');?>
			<!-- リフォーム・リノベーション -->
	<?php else:?>
		<?php include('maincv.php');?>
	<?php endif;?>

	<?php include('latest_event.php'); ?>


<?php get_footer(); ?>
