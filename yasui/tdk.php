
<?php if ( is_front_page() && is_home() ) : ?>
	<!--TOP-->
  <title>安井建設|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店</title>
  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
  <meta name="description" content="愛知県江南市で新築・耐震リフォームなら地域密着型の工務店、安井建設へ。本格木造・鉄筋RCコンクリートの注文住宅・一戸建てをお考えの方に、省エネルギー・高気密高断熱・高耐震の自然素材を使ったデザイン住宅をご提供いたします。" />

<?php elseif(is_page(2440)): ?>
	<!-- お家の実例・お客様の声 -->
	<title>お家の実例・お客様の声|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の建築実例写真やお客様の声をご紹介。暮らす人のライフスタイルに寄り添うプランニング、ふだんは見ることのない性能への工夫、実際の施工例やお客様の声からご紹介します。" />

<?php elseif(get_post_type() == 'voice'): ?>
	<!-- お客様の声一覧 -->
		<?php if ( is_single() ) : ?>
			<!-- 詳細 -->
		  <title><?php the_title(); ?>|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
		  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
		  <meta name="description" content="<?php the_title(); ?>。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設で建てたお客様の声をご紹介。家づくりの参考になる家を建てる前の不安や希望、建てた後の住み心地や快適さなど、実際に新築されたお客様のメッセージもご案内します。" />

		<?php else: ?>
			<?php
				$taxonomy_slug = get_query_var('taxonomy'); // タクソノミースラッグを取得
			  $term_object = get_queried_object(); // タームオブジェクトを取得
			  $cat = get_term( $term_object, $taxonomy_slug );
				$tax_id = $cat->term_id;
			?>
			<?php $current_term = single_term_title("", false);?>
			<?php	if($current_term):?>
				<?php if($cat->parent == '0'): ?>
					<!-- 親カテゴリ -->
				  <title><?php single_term_title(); ?>|お客様の声|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				  <meta name="description" content="<?php echo strip_tags(term_description($tax_id)); ?>" />

				<?php	else:?>
					<!-- 子カテゴリ -->
				  <title><?php single_term_title(); ?>|お客様の声|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
					<?php if( $cat->parent == '21' ): ?><!-- 地域から選ぶ -->
				  	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の<?php single_term_title(); ?>で建てたお客様の声をご紹介。本格木造・RC住宅「アトリエコラボスタイル」、シンプルモダン・ナチュラル・ブルックリン・レトロ風なデザイン住宅、ライフスタイルに合わせて選べる注文住宅、価格重視で選ぶローコスト企画住宅など、<?php single_term_title(); ?>で建てたお客様からいただいたメッセージ・太鼓判をご覧ください。" />
					<?php else: ?>
				  	<meta name="description" content="<?php echo strip_tags(term_description($tax_id)); ?>" />
					<?php endif; ?>

				<?php endif; ?>
			<?php	else:?>
					<!-- トップ -->
				  <title>お客様の声|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				  <meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設で建てたお客様の声をご紹介。家づくりの参考になる家を建てる前の不安や希望、建てた後の住み心地や快適さなど、実際に新築されたお客様のメッセージもご案内します。" />

			<?php endif; ?>
		<?php endif; ?>

<?php elseif(get_post_type() == 'housing'): ?>
	<!-- 注文住宅建築実例一覧 -->
		<?php if ( is_single() ) : ?>
			<!-- 詳細 -->
		  <title><?php the_title(); ?>|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
		  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
		  <meta name="description" content="<?php the_title(); ?>。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の建築実例写真をご紹介。二階建てや平屋・二世帯住宅など、シンプルモダンや和モダン、北欧風やブルックリン風のおしゃれでかっこいいデザインなど、豊富な注文住宅実例写真をご覧ください。" />

		<?php else: ?>
			<?php
				$taxonomy_slug = get_query_var('taxonomy'); // タクソノミースラッグを取得
			  $term_object = get_queried_object(); // タームオブジェクトを取得
			  $cat = get_term( $term_object, $taxonomy_slug );
				$tax_id = $cat->term_id;
			?>
			<?php $current_term = single_term_title("", false);?>
			<?php	if($current_term):?>
				<?php if($cat->parent == '0'): ?>
					<!-- 親カテゴリ -->
				  <title><?php single_term_title(); ?>|注文住宅建築実例|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				  <meta name="description" content="<?php echo strip_tags(term_description($tax_id)); ?>" />

				<?php	else:?>
					<!-- 子カテゴリ -->
				  <title><?php single_term_title(); ?>|注文住宅建築実例|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
					<?php if( $cat->parent == '99' ): ?><!-- 建てた年代から選ぶ -->
				  	<meta name="description" content="安井建設で建てたかっこよくておしゃれな家や、和モダン・シンプルモダンテイストなど、住まう人の幸せな暮らしを実現する本格デザイン木造住宅・RCコンクリート住宅、ローコスト企画住宅を<?php single_term_title(); ?>で建てた注文住宅建築実例フォトギャラリーをご紹介。二階建てや平屋・二世帯住宅、三階建てやビルトインガレージのある家など、かわいい北欧風やブルックリンスタイル、和風やナチュラルテイストまで、豊富な<?php single_term_title(); ?>で建てたデザイン注文住宅建築実例フォトギャラリーをご覧ください。" />
					<?php elseif( $cat->parent == '92' ): ?><!-- 広さから選ぶ -->
				  	<meta name="description" content="安井建設で建てたかっこよくておしゃれな家や、和モダン・シンプルモダンテイストなど、住まう人の幸せな暮らしを実現する本格デザイン木造住宅・RCコンクリート住宅、ローコスト企画住宅の広さ<?php single_term_title(); ?>で建てた注文住宅建築実例フォトギャラリーをご紹介。二階建てや平屋・二世帯住宅、三階建てやビルトインガレージのある家など、かわいい北欧風やブルックリンスタイル、和風やナチュラルテイストまで、豊富な広さ<?php single_term_title(); ?>で建てたデザイン注文住宅建築実例フォトギャラリーをご覧ください。" />
					<?php elseif( $cat->parent == '85' ): ?><!-- 価格帯から選ぶ -->
				  	<meta name="description" content="安井建設で建てたかっこよくておしゃれな家や、和モダン・シンプルモダンテイストなど、住まう人の幸せな暮らしを実現する本格デザイン木造住宅・RCコンクリート住宅、ローコスト企画住宅の予算<?php single_term_title(); ?>で建てた注文住宅建築実例フォトギャラリーをご紹介。二階建てや平屋・二世帯住宅、三階建てやビルトインガレージのある家など、かわいい北欧風やブルックリンスタイル、和風やナチュラルテイストまで、豊富な予算<?php single_term_title(); ?>で建てたデザイン注文住宅建築実例フォトギャラリーをご覧ください。" />
					<?php elseif( $cat->parent == '52' ): ?><!-- 地域から選ぶ -->
				  	<meta name="description" content="安井建設で建てたかっこよくておしゃれな家や、和モダン・シンプルモダンテイストなど、住まう人の幸せな暮らしを実現する本格デザイン木造住宅・RCコンクリート住宅、ローコスト企画住宅の<?php single_term_title(); ?>で建てた注文住宅建築実例フォトギャラリーをご紹介。二階建てや平屋・二世帯住宅、三階建てやビルトインガレージのある家など、かわいい北欧風やブルックリンスタイル、和風やナチュラルテイストまで、豊富な<?php single_term_title(); ?>のデザイン注文住宅建築実例フォトギャラリーをご覧ください。" />
					<?php else: ?>
				  	<meta name="description" content="<?php echo strip_tags(term_description($tax_id)); ?>" />
					<?php endif; ?>
				<?php endif; ?>
			<?php	else:?>
					<!-- トップ -->
				  <title>注文住宅建築実例|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				  <meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の建築実例写真をご紹介。二階建てや平屋・二世帯住宅など、シンプルモダンや和モダン、北欧風やブルックリン風のおしゃれでかっこいいデザインなど、豊富な注文住宅実例写真をご覧ください。" />

			<?php endif; ?>
		<?php endif; ?>

<?php elseif(is_page(2579)): ?>
	<!-- 安井建設の家づくり -->
	<title>安井の家づくり|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の商品ラインナップをご紹介。本格注文住宅から自然素材を使ったデザイン企画住宅、定額制の自由設計住宅、価格は安くても高性能なローコスト企画住宅まで、ライフスタイルや好みに合わせた幅広い家づくりをご提供します。" />

<?php elseif(is_page(5687)): ?>
	<!-- デザイン注文住宅 ATELIER CO LABO style-アトリエコラボスタイル- -->
	<title>デザイン注文住宅アトリエコラボスタイル|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設のデザイン注文住宅アトリエコラボスタイルをご紹介。建築士と作る高いデザイン性や、省エネルギーやランニングコストの安いパッシブデザイン、鉄筋コンクリートやSE構法などの強固な構造など本格注文住宅をご紹介します。" />

<?php elseif(is_page(5797)): ?>
	<!-- デザイン注文住宅 ATELIER CO LABO style-アトリエコラボスタイル- -->
	<title>デザイン注文住宅アトリエコラボスタイル|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設のデザイン注文住宅アトリエコラボスタイルをご紹介。建築士と作る高いデザイン性や、省エネルギーやランニングコストの安いパッシブデザイン、鉄筋コンクリートやSE構法などの強固な構造など本格注文住宅をご紹介します。" />

<?php elseif(is_page(5814)): ?>
	<!-- シンプルモダンスタイル EDGE-エッジ- -->
	<title>シンプルモダンスタイル EDGE|デザイン企画住宅|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で新築注文住宅・一戸建てを建てる安井建設の自然素材を使ったデザイン企画住宅のシンプルモダンスタイル EDGEをご紹介。洗練されたスタイリッシュな上質なデザインと住み心地。デザインだけではなく高気密・高断熱、耐震性など性能にもこだわった家づくり。" />

<?php elseif(is_page(5817)): ?>
	<!-- ナチュラルスタイル NATURE-ナチュレ- -->
	<title>ナチュラルスタイル NATURE|デザイン企画住宅|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で新築注文住宅・一戸建てを建てる安井建設の自然素材を使ったデザイン企画住宅のナチュラルスタイル NATUREをご紹介。自然素材を随所に取り入れたナチュラルなデザインと快適な住み心地。デザインだけではなく高気密・高断熱、耐震性など性能にもこだわった家づくり。" />

<?php elseif(is_page(5799)): ?>
	<!-- ブルックリンスタイル BETON-ベトン- -->
	<title>ブルックリンスタイル  BETON|デザイン企画住宅|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で新築注文住宅・一戸建てを建てる安井建設の自然素材を使ったデザイン企画住宅のブルックリンスタイル  BETONをご紹介。インダストリアルでおしゃれなビンテージ・レトロ感溢れる無骨でかっこいいデザインと快適な住み心地。デザインだけではなく高気密・高断熱、耐震性など性能にもこだわった家づくり。" />

<?php elseif(is_page(5824)): ?>
	<!-- ナチュラルレトロスタイル RUSTIC-ラスティック- -->
	<title>ナチュラルレトロスタイル RUSTIC|デザイン企画住宅|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で新築注文住宅・一戸建てを建てる安井建設の自然素材を使ったデザイン企画住宅のナチュラルレトロスタイル RUSTICをご紹介。無垢床や塗り壁を使ったレトロでかわいいカフェ風のおしゃれなナチュラルなデザインと快適な住み心地。デザインだけではなく高気密・高断熱、耐震性など性能にもこだわった家づくり。" />

<?php elseif(is_page(5832)): ?>
	<!-- 注文住宅 BAY style-ベイスタイル- -->
	<title>注文住宅ベイスタイル|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で新築注文住宅・一戸建てを建てる安井建設の定額制自由設計注文住宅ベイスタイルをご紹介。夫婦の寝室、書斎やママスペース、子供部屋の数など、自由な間取り、色、設備、外観など選んで組み合わせるオンリーワンの住まいです。高気密・高断熱、耐震性など性能にもこだわった家づくり。" />

<?php elseif(is_page(5835)): ?>
	<!-- 規格住宅FITTY style-フィッティースタイル-- -->
	<title>ローコスト企画住宅フィッティースタイル|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で新築注文住宅・一戸建てを建てる安井建設のローコスト企画住宅フィッティースタイルをご紹介。高性能な仕様、性能でありながら、理想の家づくりノウハウを凝縮し厳選したプランでコストを抑えた家づくり。高気密・高断熱、耐震性など性能にもこだわった新築住宅です。" />

<?php elseif(is_page(5837)): ?>
	<!-- リフォーム/リノベーション -->
	<title>リフォーム・リノベーション|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で新築注文住宅・一戸建てを建てる安井建設のリフォーム・リノベーションをご紹介。新築住宅で培ったノウハウと確かな耐震技術で、築年数が経過した家でも快適な家に。気になる箇所の部位別リフォームから、新築同様のフルリノベーション、耐震補強工事・断熱工事まで家づくりのプロに安心してお任せください。" />

<?php elseif(is_page(5839)): ?>
	<!-- 安井建設の木造耐震補強工事 -->
	<title>木造耐震補強工事|リフォーム・リノベーション|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で新築注文住宅・一戸建てを建てる安井建設の木造耐震補強工事ご紹介。まずは無料耐震診断を受けてください。新築住宅で培ったノウハウと確かな耐震技術で、築年数が経過した家でも安心の耐震補強工事を行います。耐震と断熱性能を同時に向上させるサービスを提供します。" />

<?php elseif(get_post_type() == 'showroom'): ?>
	<!-- ショールーム・モデルハウス一覧 -->
		<?php if ( is_single() ) : ?>
			<!-- 詳細 -->
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php $content_txt = strip_tags($post->post_content);$acfcontent = get_field('リード文',false);$acfcontent = strip_tags($acfcontent, '</br>'); ?>
			<?php endwhile; ?>
			<?php endif; ?>
			<title><?php the_title(); ?>|ショールーム・モデルハウス|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
			<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
			<meta name="description" content="<?php echo $acfcontent; ?>。快適に生活できる知恵が詰まった等身大のモデルハウスで、ライフスタイルに合わせた間取りや商品、住宅ローンやコストのこと等家づくりのことならなんでも相談ができます。平日・土日・夜間など、ご予約受付中。ぜひご家族でご来場ください。" />

		<?php	else:?>
			<!-- 一覧 -->
			<title>ショールーム・モデルハウス|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
			<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
			<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で新築注文住宅・一戸建てを建てる安井建設のショールーム・モデルハウスのご紹介。快適に生活できる知恵が詰まった等身大の展示場で、ライフスタイルに合わせた間取りや商品、住宅ローンやコストのこと等家づくりのことならなんでも相談ができます。平日・土日・夜間など、ご予約受付中。ぜひご家族でご来場ください。" />

		<?php endif; ?>

<?php elseif(is_page(5689)): ?>
	<!-- 選ばれる理由 -->
	<title>選ばれる理由|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設が皆様に選ばれる理由をご紹介。家族の笑顔と絆を作る家づくりや、生涯コストを考えた家、地震に強い家づくり、アフターサービスまでご覧ください。" />

<?php elseif(is_page(5691)): ?>
	<!-- 家族の笑顔と絆をつくる家づくり -->
	<title>家族の笑顔と絆をつくる家づくり|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設 </title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設が皆様に選ばれる理由をご紹介。家族の笑顔と絆を作る家づくりや、生涯コストを考えた家、地震に強い家づくり、アフターサービスまでご覧ください。" />

<?php elseif(is_page(5693)): ?>
	<!-- 生涯コストを考えた家づくり -->
	<title>生涯コストを考えた家づくり|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設 </title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設は、家づくりにおいて建物費用だけでなく、光熱費を含めた生涯コストが重要だと考えます。1棟1棟光熱費シミュレーションするだけでなく、安心・快適な建物として外せない基本性能もこだわったランニングコストに優れた家づくり。" />

<?php elseif(is_page(5424)): ?>
	<!-- 尾張建築職人匠の会 -->
	<title>尾張建築職人匠の会|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設 </title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設は、毎月、協力業者「尾張建築職人 匠の会」の方々に集まっていただき、定例会を開催しています。より良い現場の環境づくりや安全面のレベルアップ等勉強しています。" />

<?php elseif(is_page(5695)): ?>
	<!-- 地域とともに -->
	<title>地域とともに|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設では、住まい手のお客様はもちろん、ご近所の方々とも積極的な継がりを育めるよう、社員一丸となって取り組んでおります。" />

<?php elseif(is_page(5697)): ?>
	<!-- 地震に強い家づくり -->
	<title>地震に強い家づくり|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設 </title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設では、新築時に耐震等級3+起振機による耐震診断を全棟実施しています。最高レベルの耐震性を実現する高い技術と安心の10年地盤保証で住まう方に安心を提供しています。" />

<?php elseif(is_page(5699)): ?>
	<!-- 家づくりの流れ -->
	<title>家づくりの流れ|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の家づくりの流れをご紹介。資金計画からセミナー、プラン提案から土地探し、仕様決めから着工・完工まで、皆様に安心して納得の住まいをご提供できるようお客様に寄り添った家づくりを行います。" />

<?php elseif(is_page(5702)): ?>
	<!-- アフターサービス -->
	<title>アフターサービス|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の家づくりの流れをご紹介。資金計画からセミナー、プラン提案から土地探し、仕様決めから着工・完工まで、皆様に安心して納得の住まいをご提供できるようお客様に寄り添った家づくりを行います。" />

<?php elseif(is_page(5766)): ?>
	<!-- 土地をお探しの方へ -->
	<title>土地情報|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設   </title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設では、家を建てる人の土地探しもお手伝いしています。初めて土地探しをする方は、まずは土地探しのコツや購入の流れをご確認の上、弊社のオススメする土地情報をご覧ください。" />

<?php elseif(get_post_type() == 'faq'): ?>
	<!-- よくある質問 -->
		<?php if ( is_single() ) : ?>
			<!-- 詳細 -->
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php remove_filter('the_content', 'wpautop'); ?>
		  <title><?php the_title(); ?>|よくあるご質問（Q&A）|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
		  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
		  <meta name="description" content="<?php the_title(); ?><?php the_content(); ?>家づくり全般のことや構造、住宅ローンなどのお金のこと、土地選びのことなど、疑問にお答えしています。" />
			<?php endwhile; ?>
			<?php endif; ?>

		<?php else: ?>
			<?php
				$taxonomy_slug = get_query_var('taxonomy'); // タクソノミースラッグを取得
			  $term_object = get_queried_object(); // タームオブジェクトを取得
			  $cat = get_term( $term_object, $taxonomy_slug );
				$tax_id = $cat->term_id;
			?>
			<?php $current_term = single_term_title("", false);?>
			<?php	if($current_term):?>
					<!-- カテゴリ -->
				  <title><?php single_term_title(); ?>|よくあるご質問（Q&A）|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				  <meta name="description" content="<?php single_term_title(); ?>のQ&A一覧。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設に寄せられたよくある質問（Q&A）をご紹介します。家づくり全般のことや構造、住宅ローンなどのお金のこと、土地選びのことなど、疑問にお答えしています。" />

			<?php	else:?>
					<!-- トップ -->
				  <title>よくあるご質問（Q&A）|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				  <meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設に寄せられたよくある質問（Q&A）をご紹介します。家づくり全般のことや構造、住宅ローンなどのお金のこと、土地選びのことなど、疑問にお答えしています。" />

			<?php endif; ?>
		<?php endif; ?>

<?php elseif(is_page(5704)): ?>
	<!-- 会社案内 -->
	<title>会社案内|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の会社概要と社長メッセージをご紹介。「家づくりを通して家族の笑顔と幸せをつくる」という会社のミッションもご紹介します。" />

<?php elseif(get_post_type() == 'media'): ?>
	<!-- 受賞歴・メディア情報 -->
		<?php if ( is_single() ) : ?>
			<!-- 詳細 -->
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php remove_filter('the_content', 'wpautop'); ?>
		  <title><?php the_title(); ?>|受賞歴・メディア情報|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
		  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
		  <meta name="description" content="<?php the_title(); ?>。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の受賞歴・メディア掲載情報をご紹介。全国の工務店からお手本にされている安井建設の取り組みや受けた表彰などご覧ください。" />
			<?php endwhile; ?>
			<?php endif; ?>

		<?php else: ?>
			<?php
				$taxonomy_slug = get_query_var('taxonomy'); // タクソノミースラッグを取得
			  $term_object = get_queried_object(); // タームオブジェクトを取得
			  $cat = get_term( $term_object, $taxonomy_slug );
				$tax_id = $cat->term_id;
			?>
			<?php $current_term = single_term_title("", false);?>
			<?php	if($current_term):?>
					<!-- カテゴリ -->
				  <title><?php single_term_title(); ?>|受賞歴・メディア情報|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設 </title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				  <meta name="description" content="<?php single_term_title(); ?>の記事一覧。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の受賞歴・メディア掲載情報をご紹介。全国の工務店からお手本にされている安井建設の取り組みや受けた表彰などご覧ください。" />

			<?php	else:?>
					<!-- トップ -->
				  <title>受賞歴・メディア情報|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				  <meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の受賞歴・メディア掲載情報をご紹介。全国の工務店からお手本にされている安井建設の取り組みや受けた表彰などご覧ください。" />

			<?php endif; ?>
		<?php endif; ?>

<?php elseif(is_page(5706)): ?>
	<!-- 対応エリア -->
	<title>対応エリア|受賞歴・メディア情報|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の施工対応エリアをご紹介。お客様に「安心」をお届けする家づくりをするために、江南市から車で60分圏を目安にお家を建てております。" />

<?php elseif(is_page(174)): ?>
	<!-- STAFF一覧 -->
	<title>スタッフ紹介|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設のスタッフをご紹介。各スタッフのプロフィールやメッセージ、最新のブログ記事などをご確認いただけます。" />

<?php elseif(is_author()): ?>
	<!-- STAFF詳細 -->
	<?php
			$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
			$user_dis =	$curauth->display_name;
			$user_dec =	$curauth->description;
	?>
	<title><?php echo $user_dis;?>|スタッフ紹介|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="<?php echo $user_dis;?>のプロフィール。スタッフからのメッセージや最新のブログ記事などをご確認いただけます。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設のスタッフをご紹介。" />

<?php elseif(is_page(5708)): ?>
	<!-- 総合建設 -->
	<title>総合建設|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設は、総合建築で培った技術でお客様に安心の家づくりをご提供します。外観のみならず、トータル的なバランスとして”人にやさしい建物”の建築で我々は長年の信用・経験・実績に基づき、的確なアドバイスと、たくましい創造力をもった建物づくりを心がけてきました。そしてそれが町並みと町の自然環境に溶け込んだ、そんな建物づくりをしたいと考えています。" />

<?php elseif(get_post_type() == 'event'): ?>
	<!-- 見学会・イベント情報 -->
		<?php if ( is_single() ) : ?>
			<!-- 詳細 -->
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php remove_filter('the_content', 'wpautop'); ?>
			<?php $content_txt = strip_tags($post->post_content);$acfcontent = get_field('リード文',false);$acfcontent = strip_tags($acfcontent, '</br>'); ?>
		  <title><?php the_title(); ?>|見学会・セミナーイベント情報|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設 </title>
		  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
		  <meta name="description" content="<?php the_title(); ?><?php echo $acfcontent; ?>。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の過去に開催された見学会・イベントセミナー情報をご紹介。完成見学会や家づくり相談会だけではなく、収納や資金計画セミナー、土地探しセミナーなど家づくりに役立つイベントを開催しています。" />
			<?php endwhile; ?>
			<?php endif; ?>

		<?php else: ?>
			<?php
				$taxonomy_slug = get_query_var('taxonomy'); // タクソノミースラッグを取得
			  $term_object = get_queried_object(); // タームオブジェクトを取得
			  $cat = get_term( $term_object, $taxonomy_slug );
				$tax_id = $cat->term_id;
			?>
			<?php $current_term = single_term_title("", false);?>
			<?php	if($current_term):?>
					<!-- カテゴリ -->
				  <title><?php single_term_title(); ?>|見学会・セミナーイベント情報|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				  <meta name="description" content="<?php single_term_title(); ?>のイベント一覧。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の見学会・イベントセミナー情報をご紹介。完成見学会や家づくり相談会だけではなく、収納や資金計画セミナー、土地探しセミナーなど家づくりに役立つイベントを開催しています。" />

			<?php	else:?>
					<!-- トップ -->
				  <title>見学会・セミナーイベント情報|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設 </title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				  <meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の見学会・イベントセミナー情報をご紹介。完成見学会や家づくり相談会だけではなく、収納や資金計画セミナー、土地探しセミナーなど家づくりに役立つイベントを開催しています。" />

			<?php endif; ?>
		<?php endif; ?>

<?php elseif(is_page(166)): ?>
	<!-- スタッフブログ ALL -->
	<title>スタッフブログ|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設のスタッフブログ。家づくりのことやプライベートのこと、地元江南市のことなど、安井建設スタッフによるブログを更新中。ぜひご覧ください。" />

<?php elseif(is_page(169)): ?>
	<!-- スタッフブログ 個人 -->
	<?php
		$autherid = $_GET['auther'];
		$curauth  = get_userdata($autherid);
		$user_dis =	$curauth->display_name;
	?>
  <title><?php echo $user_dis;?>の記事一覧|スタッフブログ|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="<?php echo $user_dis;?>が書いたブログ一覧。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設のスタッフブログ。家づくりのことやプライベートのこと、地元江南市のことなど、安井建設スタッフによるブログを更新中。ぜひご覧ください。" />

<?php elseif( get_post_type() == 'staffblog' ): ?>
<!-- スタッフブログ -->
	<?php if ( is_single() ) : ?>
		<!-- 記事 -->
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<?php $content_txt = strip_tags($post->post_content); ?>
		<?php endwhile; ?>
		<?php endif; ?>
		<title><?php the_title(); ?>|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設 </title>
		<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
		<meta name="description" content="<?php the_title(); ?>。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設のスタッフブログ。家づくりのことやプライベートのこと、地元江南市のことなど、安井建設スタッフによるブログを更新中。ぜひご覧ください。" />

	<?php else: ?>
		<?php
			$taxonomy_slug = get_query_var('taxonomy'); // タクソノミースラッグを取得
		  $term_object = get_queried_object(); // タームオブジェクトを取得
		  $cat = get_term( $term_object, $taxonomy_slug );
			$tax_id = $cat->term_id;
			$title = wp_title('',false);
		?>
		<?php if($cat->parent == '0'): ?>
			<!-- カテゴリ -->
			<?php $current_term = single_term_title("", false);?>
			<?php	if($current_term):?>
				  <title><?php single_term_title(); ?>の記事一覧|スタッフブログ|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
					<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
					<meta name="description" content="<?php single_term_title(); ?>のブログ一覧。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設のスタッフブログ。家づくりのことやプライベートのこと、地元江南市のことなど、安井建設スタッフによるブログを更新中。ぜひご覧ください。" />
			<?php	else:?>
				  <title><?php echo $title; ?>の記事一覧|スタッフブログ|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
					<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
					<meta name="description" content="<?php echo $title; ?>のブログ一覧。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設のスタッフブログ。家づくりのことやプライベートのこと、地元江南市のことなど、安井建設スタッフによるブログを更新中。ぜひご覧ください。" />

			<?php endif; ?>
		<?php else: ?>
			  <title><?php single_term_title(); ?>の記事一覧|スタッフブログ|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
				<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				<meta name="description" content="<?php single_term_title(); ?>のブログ一覧。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設のスタッフブログ。家づくりのことやプライベートのこと、地元江南市のことなど、安井建設スタッフによるブログを更新中。ぜひご覧ください。" />

		<?php endif; ?>
	<?php endif; ?>

<?php elseif(get_post_type() == 'column'): ?>
	<!-- 家づくりコラム -->
		<?php if ( is_single() ) : ?>
			<!-- 詳細 -->
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php remove_filter('the_content', 'wpautop'); ?>
			<?php $content_txt = strip_tags($post->post_content);$acfcontent = get_field('リード文',false);$acfcontent = strip_tags($acfcontent, '</br>'); ?>
		  <title><?php the_title(); ?>|家づくりコラム|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
		  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
		  <meta name="description" content="<?php echo $acfcontent; ?>" />
			<?php endwhile; ?>
			<?php endif; ?>

		<?php else: ?>
			<?php
				$taxonomy_slug = get_query_var('taxonomy'); // タクソノミースラッグを取得
			  $term_object = get_queried_object(); // タームオブジェクトを取得
			  $cat = get_term( $term_object, $taxonomy_slug );
				$tax_id = $cat->term_id;
			?>
			<?php $current_term = single_term_title("", false);?>
			<?php	if($current_term):?>
				<?php if($cat->parent == '0'): ?>
					<!-- 親カテゴリ -->
				  <title><?php single_term_title(); ?>の記事一覧|家づくりコラム|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				  <meta name="description" content="<?php echo strip_tags(term_description($tax_id)); ?>" />

				<?php	else:?>
					<!-- 子カテゴリ -->
				  <title><?php single_term_title(); ?>の記事一覧|家づくりコラム|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				  <meta name="description" content="<?php echo strip_tags(term_description($tax_id)); ?>" />

				<?php endif; ?>
			<?php	else:?>
					<!-- トップ -->
				  <title>家づくりコラム|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設 </title>
				  <meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
				  <meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設が発信する家づくりコラム。家づくりのことや省エネルギー住宅、子育てや間取りのこと、収納やお金のことやインテリアやデザインなど家づくりにまつわるお役立ちコラムを配信しています。" />

			<?php endif; ?>
		<?php endif; ?>

<?php elseif(is_page(5761)): ?>
	<!-- YYコミュニティー -->
	<title>YYコミュニティー|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="" />

<?php elseif(is_page(5379)): ?>
	<!-- 資料請求 -->
	<title>資料請求|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設での資料請求はこちら。家づくりに関するお悩みに応える資料をセットで差し上げています。商品カタログや間取り集など、ダウンロードしていただけます。" />

<?php elseif(is_page(5774)): ?>
	<!-- お問い合わせ -->
	<title>お問い合わせ|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設へのお問い合わせはこちら。" />

<?php elseif(is_page(5748)): ?>
	<!-- プライバシーポリシー -->
	<title>プライバシーポリシー|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設サイトのプライバシーポリシー。" />

<?php elseif(is_page(203)): ?>
	<!-- NEWS ALL -->
	<title>新着情報|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
	<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	<meta name="description" content="愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の新着情報をご紹介。皆さまへのお知らせや最新情報はこちらから。" />

<?php elseif( get_post_type() == 'post' ): ?>
<!-- NEWS -->
	<?php if ( is_single() ) : ?>
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<?php $content_txt = strip_tags($post->post_content); ?>
		<?php endwhile; ?>
		<?php endif; ?>
	  <title><?php the_title(); ?>|新着情報|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設  </title>
		<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	  <meta name="description" content="<?php the_title(); ?>。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の新着情報をご紹介。皆さまへのお知らせや最新情報はこちらから。" />

	<?php elseif( is_category() ): ?>
	  <title><?php wp_title(''); ?>|新着情報|愛知県江南市、名古屋市、一宮市で新築木造・RCコンクリートのデザイン注文住宅、一戸建てを建てる地域密着の工務店|安井建設</title>
		<meta name="keyword" content="一戸建て,新築,リフォーム,注文住宅,愛知,工務店,江南,岩倉" />
	  <meta name="description" content="<?php wp_title(''); ?>の新着情報一覧。愛知県（名古屋・江南・犬山・一宮）・岐阜県で本格木造・RCコンクリートの注文住宅・一戸建てを新築している安井建設の新着情報をご紹介。皆さまへのお知らせや最新情報はこちらから。" />

	<?php endif; ?>

<?php endif; ?>
