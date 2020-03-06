<?php
/**
 * @package WordPress
 */


// アイキャッチ画像を有効にする。
add_theme_support('post-thumbnails');

// カスタムメニュー有効
register_nav_menus(array(
  'news_nav'=>'News_Navigation'
));

// 投稿スラッグ自動生成
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );

add_filter('protected_title_format', 'remove_protected');
function remove_protected($title) {
       return '%s';
}

// ID表示
function add_category_columns($columns)
{
    $index = 1; // 追加位置

    return array_merge(
        array_slice($columns, 0, $index),
        array('id' => 'ID'),
        array_slice($columns, $index)
    );
}
add_filter('manage_edit-category_columns', 'add_category_columns');

function add_category_custom_fields($deprecated, $column_name, $term_id)
{
    if ($column_name == 'id') {
        echo $term_id;
    }
}
add_action('manage_category_custom_column', 'add_category_custom_fields', 10, 3);

add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
add_filter( 'show_admin_bar', '__return_false' );// 管理バーのHTMLを非表示


//ページネーション
function pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<ul class='pager'>";
//        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."' class='pager_number'>&laquo;</a>";
        if($paged > 1 && $showitems < $pages) echo "<li class='pager_prev'><a href='".get_pagenum_link($paged - 1)."'><span>◀︎</span></a></li>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class='pager_number current'><a><span>".$i."</span></a></li>":"<li class='pager_number'><a href='".get_pagenum_link($i)."' ><span>".$i."</span></a></li>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<li class='pager_next'><a href='".get_pagenum_link($paged + 1)."'><span>▶︎</span></a></li>";
//        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."' class='pager_number'>&raquo;</a>";
        echo "</ul>\n";
    }
}

// 管理画面：投稿を新着情報に変更
function custom_post_menu_label() {
	global $menu;
	global $submenu;
    $menu[5][0] = '新着情報';
	$submenu['edit.php'][5][0] = '新着情報一覧';
    $submenu['edit.php'][10][0] = '新しい新着情報';
}
add_action('init', 'custom_post_object_label');

function custom_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = '新着情報';
	$labels->singular_name = '新着情報';
	$labels->add_new = _x('新規作成', '新着情報');
	$labels->add_new_item = '新しい新着情報';
	$labels->edit_item = '新着情報の編集';
	$labels->new_item = '新しい新着情報';
	$labels->view_item = '新着情報を表示';
	$labels->search_items = '新着情報検索';
    $labels->not_found = '新着情報が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱の新着情報にも見つかりませんでした';
}
add_action('admin_menu', 'custom_post_menu_label');

///////////////////////////////////////////////////////////////////////////////
// カスタム投稿タイプを作成する(トップ設定)
add_action('init', 'add_top_post_type');
function add_top_post_type() {
    $params = array(
            'labels' => array(
                    'name' => 'トップ設定',
                    'singular_name' => 'トップ設定情報',
                    'add_new' => '新規追加',
                    'add_new_item' => 'トップ設定を新規追加',
                    'edit_item' => 'トップ設定を編集する',
                    'new_item' => '新規トップ設定',
                    'all_items' => 'トップ設定一覧',
                    'view_item' => 'トップ設定の説明を見る',
                    'search_items' => '検索する',
                    'not_found' => 'トップ設定が見つかりませんでした。',
                    'not_found_in_trash' => 'ゴミ箱内にトップ設定が見つかりませんでした。'
            ),
            'public' => true,
						'menu_position' => 5, //管理メニューの表示位置を指定
            'has_archive' => true,
						'menu_icon'     => 'dashicons-images-alt',
            'supports' => array(
                    'title',
                    'thumbnail',
                    'custom-fields',
            )
    );
    register_post_type('top', $params);
}

///////////////////////////////////////////////////////////////////////////////
// カスタム投稿タイプを作成する(注文住宅建築実例)
add_action('init', 'add_housing_post_type');
function add_housing_post_type() {
    $params = array(
            'labels' => array(
                    'name' => '注文住宅建築実例',
                    'singular_name' => '注文住宅建築実例',
                    'add_new' => '新規追加',
                    'add_new_item' => '注文住宅建築実例を新規追加',
                    'edit_item' => '注文住宅建築実例を編集する',
                    'new_item' => '注文住宅建築実例',
                    'all_items' => '注文住宅建築実例一覧',
                    'view_item' => '注文住宅建築実例の説明を見る',
                    'search_items' => '検索する',
                    'not_found' => '注文住宅建築実例が見つかりませんでした。',
                    'not_found_in_trash' => 'ゴミ箱内に注文住宅建築実例が見つかりませんでした。'
            ),
            'public' => true,
						'menu_position' => 6, //管理メニューの表示位置を指定
            'has_archive' 	=> true,
						'menu_icon'     => 'dashicons-admin-multisite',
            'supports' 			=> array(
                    'title',
                    'thumbnail',
                    'custom-fields',
            ),
            'taxonomies' => array('housing_category','housing_tag')
    );
    register_post_type('housing', $params);
}
// カスタム投稿タイプ（housing）用のカテゴリ（カテゴリ）を作成する
add_action('init', 'create_housing_category_taxonomies');
function create_housing_category_taxonomies() {
    // カテゴリを作成
    $labels = array(
            'name'                => 'カテゴリ',        //複数系のときのカテゴリ名
            'singular_name'       => 'カテゴリ',        //単数系のときのカテゴリ名
            'search_items'        => 'カテゴリを検索',
            'all_items'           => '全てのカテゴリ',
            'parent_item'         => '親カテゴリ',
            'parent_item_colon'   => '親カテゴリ:',
            'edit_item'           => 'カテゴリを編集',
            'update_item'         => 'カテゴリを更新',
            'add_new_item'        => '新規カテゴリを追加',
            'new_item_name'       => '新規カテゴリ',
            'menu_name'           => 'カテゴリ'        //ダッシュボードのサイドバーメニュー名
    );
    $args = array(
            'hierarchical'        => true,
            'labels'              => $labels,
            'rewrite'             => array( 'slug' => 'housing_category' )
    );
    register_taxonomy( 'housing_category', 'housing', $args );
}
// カスタム投稿タイプ（housing）用のカテゴリ（タグ）を作成する
add_action('init', 'create_housing_tag_taxonomies');
function create_housing_tag_taxonomies() {
    // カテゴリを作成
    $labels = array(
            'name'                => 'タグ',        //複数系のときのカテゴリ名
            'singular_name'       => 'タグ',        //単数系のときのカテゴリ名
            'search_items'        => 'タグを検索',
            'all_items'           => '全てのタグ',
            'parent_item'         => '親タグ',
            'parent_item_colon'   => '親タグ:',
            'edit_item'           => 'タグを編集',
            'update_item'         => 'タグを更新',
            'add_new_item'        => '新規タグを追加',
            'new_item_name'       => '新規タグ',
            'menu_name'           => 'タグ'        //ダッシュボードのサイドバーメニュー名
    );
    $args = array(
            'hierarchical'        => true,
            'labels'              => $labels,
            'rewrite'             => array( 'slug' => 'housing_tag' )
    );
    register_taxonomy( 'housing_tag', 'housing', $args );
}


///////////////////////////////////////////////////////////////////////////////
// カスタム投稿タイプを作成する(お客様の声)
add_action('init', 'add_voice_post_type');
function add_voice_post_type() {
    $params = array(
            'labels' => array(
                    'name' => 'お客様の声',
                    'singular_name' => 'お客様の声',
                    'add_new' => '新規追加',
                    'add_new_item' => 'お客様の声を新規追加',
                    'edit_item' => 'お客様の声を編集する',
                    'new_item' => '新規お客様の声',
                    'all_items' => 'お客様の声一覧',
                    'view_item' => 'お客様の声の説明を見る',
                    'search_items' => '検索する',
                    'not_found' => 'お客様の声が見つかりませんでした。',
                    'not_found_in_trash' => 'ゴミ箱内にお客様の声が見つかりませんでした。'
            ),
            'public' => true,
						'menu_position' => 7, //管理メニューの表示位置を指定
            'has_archive' 	=> true,
						'menu_icon'     => 'dashicons-format-chat',
            'supports' 			=> array(
                    'title',
                    'thumbnail',
                    'custom-fields',
            ),
            'taxonomies' => array('voice_category','voice_tag')
    );
    register_post_type('voice', $params);
}
// カスタム投稿タイプ（お客様の声）用のカテゴリ（カテゴリ）を作成する
add_action('init', 'create_voice_category_taxonomies');
function create_voice_category_taxonomies() {
    // カテゴリを作成
    $labels = array(
            'name'                => 'カテゴリ',        //複数系のときのカテゴリ名
            'singular_name'       => 'カテゴリ',        //単数系のときのカテゴリ名
            'search_items'        => 'カテゴリを検索',
            'all_items'           => '全てのカテゴリ',
            'parent_item'         => '親カテゴリ',
            'parent_item_colon'   => '親カテゴリ:',
            'edit_item'           => 'カテゴリを編集',
            'update_item'         => 'カテゴリを更新',
            'add_new_item'        => '新規カテゴリを追加',
            'new_item_name'       => '新規カテゴリ',
            'menu_name'           => 'カテゴリ'        //ダッシュボードのサイドバーメニュー名
    );
    $args = array(
            'hierarchical'        => true,
            'labels'              => $labels,
            'rewrite'             => array( 'slug' => 'voice_category' )
    );
    register_taxonomy( 'voice_category', 'voice', $args );
}
// カスタム投稿タイプ（お客様の声）用のカテゴリ（タグ）を作成する
add_action('init', 'create_voice_tag_taxonomies');
function create_voice_tag_taxonomies() {
    // カテゴリを作成
    $labels = array(
            'name'                => 'タグ',        //複数系のときのカテゴリ名
            'singular_name'       => 'タグ',        //単数系のときのカテゴリ名
            'search_items'        => 'タグを検索',
            'all_items'           => '全てのタグ',
            'parent_item'         => '親タグ',
            'parent_item_colon'   => '親タグ:',
            'edit_item'           => 'タグを編集',
            'update_item'         => 'タグを更新',
            'add_new_item'        => '新規タグを追加',
            'new_item_name'       => '新規タグ',
            'menu_name'           => 'タグ'        //ダッシュボードのサイドバーメニュー名
    );
    $args = array(
            'hierarchical'        => true,
            'labels'              => $labels,
            'rewrite'             => array( 'slug' => 'voice_tag' )
    );
    register_taxonomy( 'voice_tag', 'voice', $args );
}


///////////////////////////////////////////////////////////////////////////////
// カスタム投稿タイプを作成する(よくある質問)
add_action('init', 'add_faq_post_type');
function add_faq_post_type() {
    $params = array(
            'labels' => array(
                    'name' => 'よくある質問',
                    'singular_name' => 'よくある質問',
                    'add_new' => '新規追加',
                    'add_new_item' => 'よくある質問を新規追加',
                    'edit_item' => 'よくある質問を編集する',
                    'new_item' => '新規よくある質問',
                    'all_items' => 'よくある質問一覧',
                    'view_item' => 'よくある質問の説明を見る',
                    'search_items' => '検索する',
                    'not_found' => 'よくある質問が見つかりませんでした。',
                    'not_found_in_trash' => 'ゴミ箱内によくある質問が見つかりませんでした。'
            ),
            'public' => true,
						'menu_position' => 8, //管理メニューの表示位置を指定
            'has_archive' => true,
						'menu_icon'     => 'dashicons-editor-help',
            'supports' => array(
                    'title',
                    'editor',
                    'author',
                    'thumbnail',
                    'custom-fields',
            ),
            'taxonomies' => array('faq_category')
    );
    register_post_type('faq', $params);
}

// カスタム投稿タイプ（faq）用のカテゴリ（カテゴリ）を作成する
add_action('init', 'create_faq_category_taxonomies');
function create_faq_category_taxonomies() {
    // カテゴリを作成
    $labels = array(
            'name'                => 'カテゴリ',        //複数系のときのカテゴリ名
            'singular_name'       => 'カテゴリ',        //単数系のときのカテゴリ名
            'search_items'        => 'カテゴリを検索',
            'all_items'           => '全てのカテゴリ',
            'parent_item'         => '親カテゴリ',
            'parent_item_colon'   => '親カテゴリ:',
            'edit_item'           => 'カテゴリを編集',
            'update_item'         => 'カテゴリを更新',
            'add_new_item'        => '新規カテゴリを追加',
            'new_item_name'       => '新規カテゴリ',
            'menu_name'           => 'カテゴリ'        //ダッシュボードのサイドバーメニュー名
    );
    $args = array(
            'hierarchical'        => true,
            'labels'              => $labels,
            'rewrite'             => array( 'slug' => 'faq_category' )
    );
    register_taxonomy( 'faq_category', 'faq', $args );
}

///////////////////////////////////////////////////////////////////////////////
// カスタム投稿タイプを作成する(受賞歴・メディア情報)
add_action('init', 'add_media_post_type');
function add_media_post_type() {
    $params = array(
            'labels' => array(
                    'name' => '受賞歴・メディア情報',
                    'singular_name' => '受賞歴・メディア情報',
                    'add_new' => '新規追加',
                    'add_new_item' => '受賞歴・メディア情報を新規追加',
                    'edit_item' => '受賞歴・メディア情報を編集する',
                    'new_item' => '新規受賞歴・メディア情報',
                    'all_items' => '受賞歴・メディア情報一覧',
                    'view_item' => '受賞歴・メディア情報の説明を見る',
                    'search_items' => '検索する',
                    'not_found' => '受賞歴・メディア情報が見つかりませんでした。',
                    'not_found_in_trash' => 'ゴミ箱内に受賞歴・メディア情報が見つかりませんでした。'
            ),
            'public' => true,
						'menu_position' => 9, //管理メニューの表示位置を指定
            'has_archive' => true,
						'menu_icon'     => 'dashicons-awards',
            'supports' => array(
                    'title',
                    'thumbnail',
                    'custom-fields',
            ),
            'taxonomies' => array('media_category')
    );

    register_post_type('media', $params);
}
// カスタム投稿タイプ（受賞歴・メディア情報）用のカテゴリ（カテゴリ）を作成する
add_action('init', 'create_media_category_taxonomies');
function create_media_category_taxonomies() {
    // カテゴリを作成
    $labels = array(
            'name'                => 'カテゴリ',        //複数系のときのカテゴリ名
            'singular_name'       => 'カテゴリ',        //単数系のときのカテゴリ名
            'search_items'        => 'カテゴリを検索',
            'all_items'           => '全てのカテゴリ',
            'parent_item'         => '親カテゴリ',
            'parent_item_colon'   => '親カテゴリ:',
            'edit_item'           => 'カテゴリを編集',
            'update_item'         => 'カテゴリを更新',
            'add_new_item'        => '新規カテゴリを追加',
            'new_item_name'       => '新規カテゴリ',
            'menu_name'           => 'カテゴリ'        //ダッシュボードのサイドバーメニュー名
    );
    $args = array(
            'hierarchical'        => true,
            'labels'              => $labels,
            'rewrite'             => array( 'slug' => 'media_category' )
    );
    register_taxonomy( 'media_category', 'media', $args );
}

///////////////////////////////////////////////////////////////////////////////
// カスタム投稿タイプを作成する(見学会・イベント・セミナー)
add_action('init', 'add_event_post_type');
function add_event_post_type() {
    $params = array(
            'labels' => array(
                    'name' => '見学会・イベント・セミナー',
                    'singular_name' => '見学会・イベント・セミナー',
                    'add_new' => '新規追加',
                    'add_new_item' => '見学会・イベント・セミナーを新規追加',
                    'edit_item' => '見学会・イベント・セミナーを編集する',
                    'new_item' => '新規見学会・イベント・セミナー',
                    'all_items' => '見学会・イベント・セミナー一覧',
                    'view_item' => '見学会・イベント・セミナーの説明を見る',
                    'search_items' => '検索する',
                    'not_found' => '見学会・イベント・セミナーが見つかりませんでした。',
                    'not_found_in_trash' => 'ゴミ箱内に見学会・イベント・セミナーが見つかりませんでした。'
            ),
            'public' => true,
						'menu_position' => 10, //管理メニューの表示位置を指定
            'has_archive' => true,
						'menu_icon'     => 'dashicons-store',
            'supports' => array(
                    'title',
                    'thumbnail',
                    'custom-fields',
            ),
            'taxonomies' => array('event_category','event_brand')
    );

    register_post_type('event', $params);
}
// カスタム投稿タイプ（見学会・イベント・セミナー）用のカテゴリ（カテゴリ）を作成する
add_action('init', 'create_event_category_taxonomies');
function create_event_category_taxonomies() {
    // カテゴリを作成
    $labels = array(
            'name'                => 'カテゴリ',        //複数系のときのカテゴリ名
            'singular_name'       => 'カテゴリ',        //単数系のときのカテゴリ名
            'search_items'        => 'カテゴリを検索',
            'all_items'           => '全てのカテゴリ',
            'parent_item'         => '親カテゴリ',
            'parent_item_colon'   => '親カテゴリ:',
            'edit_item'           => 'カテゴリを編集',
            'update_item'         => 'カテゴリを更新',
            'add_new_item'        => '新規カテゴリを追加',
            'new_item_name'       => '新規カテゴリ',
            'menu_name'           => 'カテゴリ'        //ダッシュボードのサイドバーメニュー名
    );
    $args = array(
            'hierarchical'        => true,
            'labels'              => $labels,
            'rewrite'             => array( 'slug' => 'event_category' )
    );
    register_taxonomy( 'event_category', 'event', $args );
}
// カスタム投稿タイプ（見学会・イベント・セミナー）用のカテゴリ（ブランド）を作成する
add_action('init', 'create_event_brand_taxonomies');
function create_event_brand_taxonomies() {
    // カテゴリを作成
    $labels = array(
            'name'                => 'ブランド',        //複数系のときのカテゴリ名
            'singular_name'       => 'ブランド',        //単数系のときのカテゴリ名
            'search_items'        => 'ブランドを検索',
            'all_items'           => '全てのブランド',
            'parent_item'         => '親ブランド',
            'parent_item_colon'   => '親ブランド:',
            'edit_item'           => 'ブランドを編集',
            'update_item'         => 'ブランドを更新',
            'add_new_item'        => '新規ブランドを追加',
            'new_item_name'       => '新規ブランド',
            'menu_name'           => 'ブランド'        //ダッシュボードのサイドバーメニュー名
    );
    $args = array(
            'hierarchical'        => true,
            'labels'              => $labels,
            'rewrite'             => array( 'slug' => 'event_brand' )
    );
    register_taxonomy( 'event_brand', 'event', $args );
}
///////////////////////////////////////////////////////////////////////////////
// カスタム投稿タイプを作成する(スタッフブログ)
add_action('init', 'add_staffblog_post_type');
function add_staffblog_post_type() {
    $params = array(
            'labels' => array(
                    'name' => 'スタッフブログ',
                    'singular_name' => 'スタッフブログ',
                    'add_new' => '新規追加',
                    'add_new_item' => 'スタッフブログを新規追加',
                    'edit_item' => 'スタッフブログを編集する',
                    'new_item' => '新規スタッフブログ',
                    'all_items' => 'スタッフブログ一覧',
                    'view_item' => 'スタッフブログの説明を見る',
                    'search_items' => '検索する',
                    'not_found' => 'スタッフブログが見つかりませんでした。',
                    'not_found_in_trash' => 'ゴミ箱内にスタッフブログが見つかりませんでした。'
            ),
            'public' => true,
						'menu_position' => 11, //管理メニューの表示位置を指定
            'has_archive' => true,
						'menu_icon'     => 'dashicons-id-alt',
            'supports' => array(
                    'title',
                    'author',
                    'thumbnail',
                    'custom-fields',
            )
    );
    register_post_type('staffblog', $params);
}

///////////////////////////////////////////////////////////////////////////////
// カスタム投稿タイプを作成する(家づくりコラム)
add_action('init', 'add_column_post_type');
function add_column_post_type() {
    $params = array(
            'labels' => array(
                    'name' => '家づくりコラム',
                    'singular_name' => '家づくりコラム',
                    'add_new' => '新規追加',
                    'add_new_item' => '家づくりコラムを新規追加',
                    'edit_item' => '家づくりコラムを編集する',
                    'new_item' => '家づくりコラム',
                    'all_items' => '家づくりコラム一覧',
                    'view_item' => '家づくりコラムの説明を見る',
                    'search_items' => '検索する',
                    'not_found' => '家づくりコラムが見つかりませんでした。',
                    'not_found_in_trash' => 'ゴミ箱内に家づくりコラムが見つかりませんでした。'
            ),
            'public' => true,
						'menu_position' => 12, //管理メニューの表示位置を指定
            'has_archive' 	=> true,
						'menu_icon'     => 'dashicons-id-alt',
            'supports' 			=> array(
                    'title',
                    'thumbnail',
                    'custom-fields',
            ),
            'taxonomies' => array('column_category','column_author','column_tag')
    );
    register_post_type('column', $params);
}
// カスタム投稿タイプ（家づくりコラム）用のカテゴリ（カテゴリ）を作成する
add_action('init', 'create_column_category_taxonomies');
function create_column_category_taxonomies() {
    // カテゴリを作成
    $labels = array(
            'name'                => 'カテゴリ',        //複数系のときのカテゴリ名
            'singular_name'       => 'カテゴリ',        //単数系のときのカテゴリ名
            'search_items'        => 'カテゴリを検索',
            'all_items'           => '全てのカテゴリ',
            'parent_item'         => '親カテゴリ',
            'parent_item_colon'   => '親カテゴリ:',
            'edit_item'           => 'カテゴリを編集',
            'update_item'         => 'カテゴリを更新',
            'add_new_item'        => '新規カテゴリを追加',
            'new_item_name'       => '新規カテゴリ',
            'menu_name'           => 'カテゴリ'        //ダッシュボードのサイドバーメニュー名
    );
    $args = array(
            'hierarchical'        => true,
            'labels'              => $labels,
            'rewrite'             => array( 'slug' => 'column_category' )
    );
    register_taxonomy( 'column_category', 'column', $args );
}
// カスタム投稿タイプ（家づくりコラム）用のカテゴリ（著者）を作成する
add_action('init', 'create_column_author_taxonomies');
function create_column_author_taxonomies() {
    // 著者を作成
    $labels = array(
            'name'                => '著者',        //複数系のときのカテゴリ名
            'singular_name'       => '著者',        //単数系のときのカテゴリ名
            'search_items'        => '著者を検索',
            'all_items'           => '全ての著者',
            'parent_item'         => '親著者',
            'parent_item_colon'   => '親著者:',
            'edit_item'           => '著者を編集',
            'update_item'         => '著者を更新',
            'add_new_item'        => '新規著者を追加',
            'new_item_name'       => '新規著者',
            'menu_name'           => '著者'        //ダッシュボードのサイドバーメニュー名
    );
    $args = array(
            'hierarchical'        => true,
            'labels'              => $labels,
            'rewrite'             => array( 'slug' => 'column_author' )
    );
    register_taxonomy( 'column_author', 'column', $args );
}

// カスタム投稿タイプ（家づくりコラム）用のカテゴリ（タグ）を作成する
add_action('init', 'create_column_tag_taxonomies');
function create_column_tag_taxonomies() {
    // カテゴリを作成
    $labels = array(
            'name'                => 'タグ',        //複数系のときのカテゴリ名
            'singular_name'       => 'タグ',        //単数系のときのカテゴリ名
            'search_items'        => 'タグを検索',
            'all_items'           => '全てのタグ',
            'parent_item'         => '親タグ',
            'parent_item_colon'   => '親タグ:',
            'edit_item'           => 'タグを編集',
            'update_item'         => 'タグを更新',
            'add_new_item'        => '新規タグを追加',
            'new_item_name'       => '新規タグ',
            'menu_name'           => 'タグ'        //ダッシュボードのサイドバーメニュー名
    );
    $args = array(
            'hierarchical'        => true,
            'labels'              => $labels,
            'rewrite'             => array( 'slug' => 'column_tag' )
    );
    register_taxonomy( 'column_tag', 'column', $args );
}

///////////////////////////////////////////////////////////////////////////////
// カスタム投稿タイプを作成する(モデルハウス・ショールーム)
add_action('init', 'add_showroom_post_type');
function add_showroom_post_type() {
    $params = array(
            'labels' => array(
                    'name' => 'モデルハウス・ショールーム',
                    'singular_name' => 'モデルハウス・ショールーム',
                    'add_new' => '新規追加',
                    'add_new_item' => 'モデルハウス・ショールームを新規追加',
                    'edit_item' => 'モデルハウス・ショールームを編集する',
                    'new_item' => 'モデルハウス・ショールーム',
                    'all_items' => 'モデルハウス・ショールーム一覧',
                    'view_item' => 'モデルハウス・ショールームの説明を見る',
                    'search_items' => '検索する',
                    'not_found' => 'モデルハウス・ショールームが見つかりませんでした。',
                    'not_found_in_trash' => 'ゴミ箱内にモデルハウス・ショールームが見つかりませんでした。'
            ),
            'public' => true,
						'menu_position' => 13, //管理メニューの表示位置を指定
            'has_archive' 	=> true,
						'menu_icon'     => 'dashicons-admin-home',
            'supports' 			=> array(
                    'title',
                    'custom-fields',
            )
    );
    register_post_type('showroom', $params);
}
///////////////////////////////////////////////////////////////////////////////
// カスタム投稿タイプを作成する(バナー)
add_action('init', 'add_banner_post_type');
function add_banner_post_type() {
    $params = array(
            'labels' => array(
                    'name' => 'バナー',
                    'singular_name' => 'バナー',
                    'add_new' => '新規追加',
                    'add_new_item' => 'バナーを新規追加',
                    'edit_item' => 'バナーを編集する',
                    'new_item' => 'バナー',
                    'all_items' => 'バナー一覧',
                    'view_item' => 'バナーの説明を見る',
                    'search_items' => '検索する',
                    'not_found' => 'バナーが見つかりませんでした。',
                    'not_found_in_trash' => 'ゴミ箱内にバナーが見つかりませんでした。'
            ),
            'public' => true,
						'menu_position' => 14, //管理メニューの表示位置を指定
            'has_archive' 	=> true,
						'menu_icon'     => 'dashicons-align-center',
            'supports' 			=> array(
                    'title',
                    'custom-fields',
            )
    );
    register_post_type('banner', $params);
}


///////////////////////////////////////////////////////////////////////////////
// ユーザー記事一覧ページにカスタム投稿を含める
function my_search_filter($query) {
  if (is_author() && $query->is_main_query() ) {
    $query->set( 'post_type', array( 'staffblog' ) );
  }
}
add_action( 'pre_get_posts','my_search_filter' );




// 投稿一覧にID追加
function add_posts_columns_postid($columns) {
  $columns['postid'] = 'ID';
  return $columns;
}
function add_posts_columns_postid_row($column_name, $post_id) {
  if( 'postid' == $column_name ) {
    echo $post_id;
  }
}
add_filter( 'manage_posts_columns', 'add_posts_columns_postid' );
add_action( 'manage_posts_custom_column', 'add_posts_columns_postid_row', 10, 2 );

///////////////////////////////////////////////////////////////////////////////////////////////
// 投稿画面から不要な機能を削除します。
function remove_post_supports() {
	unregister_taxonomy_for_object_type( 'post_tag', 'post' ); // タグ
}
add_action( 'init', 'remove_post_supports' );

///////////////////////////////////////////////////////////////////////////////////////////////
// 管理画面：カテゴリーの階層構造
function lig_wp_category_terms_checklist_no_top( $args, $post_id = null ) {
    $args['checked_ontop'] = false;
    return $args;
}
add_action( 'wp_terms_checklist_args', 'lig_wp_category_terms_checklist_no_top' );

///////////////////////////////////////////////////////////////////////////////////////////////
// 記事が属する子タームを親タームのID順で並び替え
function cmp_parent( $a, $b ) {
  if ( $a->parent == $b->parent ) {
    return 0;
  }
  return ( $a->parent > $b->parent ) ? 1 : -1;
}
function my_child_categories(){
  global $wpdb;
  $child_ids = $wpdb->get_col("SELECT term_id FROM $wpdb->term_taxonomy WHERE parent>0");
  foreach($child_ids as $key => $child_id){
	$child = &get_category($child_id);
	echo '<li class="categoryLabel">'.$child->name.'</li>';
  }
}


///////////////////////////////////////////////////////////////////////////////////////////////
// wp_title()の日付アーカイブのタイトルを変更します。
function adjust_date_title( $title, $sep, $seplocation ) {
	$m        = get_query_var( 'm' );
	$year     = get_query_var( 'year' );
	$monthnum = get_query_var( 'monthnum' );
	$day      = get_query_var( 'day' );
	$date_title = '';

	// mパラメータがある場合 (パーマリンク設定がデフォルトの場合の日付アーカイブ)
	if ( is_archive() && ! empty( $m ) ) {
		$my_year  = substr( $m, 0, 4 );
		$my_month = substr( $m, 4, 2 );
		$my_day   = substr( $m, 6, 2 );
		$date_title    = $my_year . '年' . ( $my_month ? $my_month . '月' : '' ) . ( $my_day ? $my_day . '日' : '' );
	}
	// yearパラメータがある場合 (パーマリンク設定がデフォルト以外の日付アーカイブ)
	if ( is_archive() && ! empty( $year ) ) {
		$date_title = $year . '年';
		if ( ! empty( $monthnum ) ) {
			$date_title .= zeroise( $monthnum, 2 ) . '月';
		}
		if ( ! empty( $day ) ) {
			$date_title .= zeroise( $day, 2 ) . '日';
		}
	}
	// 日付調整を行ったタイトルがあれば区切り文字を追加(左か右)
	if ( '' != $date_title ) {
		if ( 'right' == $seplocation ) {
			$title = $date_title . " $sep ";
		} else {
			$title = " $sep " . $date_title;
		}
	}

	return $title;
}
add_filter( 'wp_title', 'adjust_date_title', 10, 3 );


///////////////////////////////////////////////////////////////////////////////////////////////
// ユーザー一覧に表示フィールドを追加する
add_action('manage_users_columns','manage_users_columns');
add_action('manage_users_custom_column','custom_manage_users_custom_column',10,3);

function manage_users_columns($column_headers) {
    $column_headers['orderno'] = '並び順';
    return $column_headers;
}

function custom_manage_users_custom_column($custom_column,$column_name,$user_id) {

    $user_info = get_userdata($user_id);

    ${$column_name} = $user_info->$column_name;
    $custom_column = "\t".${$column_name}."\n";

    return $custom_column;
}





///////////////////////////////////////////////////////////////////////////////////////////////
// 寄稿者に画像アップ
if ( current_user_can('contributor') && !current_user_can('upload_files') )
    add_action('admin_init', 'allow_contributor_uploads');

  function allow_contributor_uploads() {
      $contributor = get_role('contributor');
      $contributor->add_cap('upload_files');
}

///////////////////////////////////////////////////////////////////////////////////////////////
// レビュー待ちの投稿がされた場合に管理者にメールを送信します。
function mail_for_pending( $new_status, $old_status, $post ) {
// 投稿がレビュー待ち以外からレビュー待ちに変わった(新規の場合は$old_statusが'new'、$new_statusが'pending'になります)
	if ( $old_status != 'pending' && $new_status == 'pending' ) {
		// ブログ名(サイト名)
		$blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
		// 投稿名
		$post_title = wp_specialchars_decode($post->post_title, ENT_QUOTES);

		// 件名
		$subject = "[{$blogname}] 承認待ちの投稿が投稿されました({$post_title})";
		// 本文
		$message = "承認待ちの投稿「{$post_title}」が投稿されました。確認をお願いします。\r\n";
		$message .= "\r\n";
		$message .= "編集および公開: \r\n";
		$message .= wp_specialchars_decode(get_edit_post_link( $post->ID ), ENT_QUOTES) . "\r\n";

		// 送信先(管理者メールアドレス)
		$to = get_option('admin_email');
		// メールを送信
		$r = wp_mail( $to, $subject, $message );
		$r = wp_mail( 'freedom10furukawa@gmail.com', $subject, $message );
	}
}
add_action( 'transition_post_status', 'mail_for_pending', 10, 3 );


///////////////////////////////////////////////////////////////////////////////////////////////
// サムネイル画像
add_image_size('index_size', 220, 165, true);
add_image_size('index_size2', 304, 228, true);
add_image_size('top_size', 1000, 400, true);
add_image_size('sns_size', 350, 177, true);
add_image_size('sq_size', 500, 500, true);
add_image_size('profile_size', 543, 393, true);


///////////////////////////////////////////////////////////////////////////////////////////////
// previous_post_link() と next_post_link() にクラス付加
add_filter( 'previous_post_link', 'add_prev_post_link_class' );
function add_prev_post_link_class($output) {
  return str_replace('<a href=', '<a href=', $output);
}
add_filter( 'next_post_link', 'add_next_post_link_class' );
function add_next_post_link_class($output) {
  return str_replace('<a href=', '<a href=', $output);
}

///////////////////////////////////////////////////////////////////////////////////////////////
// [homeurl]・・・ページ内リンクの記述に利用
// [tdir]・・・テーマファイル（親テーマ）内の画像を参照する時に利用
add_shortcode('homeurl', 'shortcode_url');
function shortcode_url() {
	return get_bloginfo('url');
}
add_shortcode('tdir', 'tmp_dir');
function tmp_dir() {
	return get_template_directory_uri();
}

?>