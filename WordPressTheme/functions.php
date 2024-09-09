<?php
function add_custom_scripts() {
    // Google Fontsの読み込み
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Gotu&family=Noto+Sans+JP&family=Noto+Serif+JP&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', array(), null);

    // SwiperのCSSの追加
    wp_enqueue_style( 'swiper', '//cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', false );

    // テーマのCSSの追加
    wp_enqueue_style( 'theme-styles', get_theme_file_uri('assets/css/style.css'), array(), '1.0.0', 'all' );

    // jQueryの追加
    wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js', array(), '3.7.0', true );

    // SwiperのJSの追加
    wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11.0.0/swiper-bundle.min.js', array('jquery'), '11.0.0', true );
    // テーマのJSの追加
    wp_enqueue_script( 'theme-scripts', get_theme_file_uri('assets/js/script.js'), array('jquery', 'swiper'), '1.0.0', true );

    // gallery-modal.jsの追加
    wp_enqueue_script( 'gallery-modal', get_theme_file_uri('assets/js/gallery-modal.js'), array('jquery'), '1.0.0', true );

    // myScriptData を定義（ローカライズ）
    wp_localize_script('theme-scripts', 'myScriptData', array(
        'pageInformationUrl' => get_permalink(get_page_by_path('page-information')) // page-information ページのURLを取得
    ));
}

add_action('wp_enqueue_scripts', 'add_custom_scripts');

// 関数名：add_rel_preconnect
// この関数は、特定のスタイルシート（Google FontsやSwiperなど）を読み込む際に、
// rel='preconnect'リンクタグをheadに追加して、外部リソースへの接続を事前に確立することで、
// ページのパフォーマンスを向上させる役割を持っています。
function add_rel_preconnect( $html, $handle, $href, $media ) {
    // 'google-fonts', 'google-fonts-lato', 'swiper'のスタイルハンドルの場合に条件が適用される
    if ( 'google-fonts' === $handle || 'google-fonts-lato' === $handle || 'swiper' === $handle ) {
        // Google FontsとSwiper用のrel='preconnect'リンクタグを追加する
        $html = <<<EOT
<link rel='preconnect' href='//fonts.googleapis.com'>
<link rel='preconnect' href='//fonts.gstatic.com' crossorigin>
$html
EOT;
    }
    // 変更されたHTMLを返す
    return $html;
}
// WordPressのフィルターフック 'style_loader_tag' に対して、add_rel_preconnect関数を追加
// 'style_loader_tag' は、スタイルシートを読み込む際に使用されるHTMLタグを変更するためのフック
// 10はフックの優先順位を示し、4はこの関数が4つの引数を受け取ることを示している
add_filter( 'style_loader_tag', 'add_rel_preconnect', 10, 4 );

// swiper
function display_slider_images() {
    // ACFオプションページからPC画像とスマホ画像を取得
    $pc_images_group = get_field('mv-pc', 'option');
    $sp_images_group = get_field('mv-sp', 'option');

    if ($pc_images_group && $sp_images_group) {
        // PC画像とスマホ画像のスライダーを作成
        $output = '<div class="swiper-wrapper">';
        $count = min(count($pc_images_group), count($sp_images_group));

        for ($i = 0; $i < $count; $i++) {
            $pc_img_id = $pc_images_group['mv-pc-img' . ($i + 1)]; // 画像ID取得
            $sp_img_id = $sp_images_group['mv-sp-img' . ($i + 1)]; // 画像ID取得

            $pc_img_url = wp_get_attachment_image_url($pc_img_id, 'full'); // 画像URL取得
            $sp_img_url = wp_get_attachment_image_url($sp_img_id, 'full'); // 画像URL取得

            if ($pc_img_url && $sp_img_url) {
                $output .= '<div class="swiper-slide">';
                $output .= '<div class="swiper-slide__img">';
                $output .= '<picture>';
                $output .= '<source srcset="' . esc_url($pc_img_url) . '" media="(min-width:765px)" />';
                $output .= '<source srcset="' . esc_url($sp_img_url) . '" media="(max-width:764px)" />';
                $output .= '<img src="' . esc_url($pc_img_url) . '" alt="スライダー画像" />';
                $output .= '</picture>';
                $output .= '</div>';
                $output .= '</div>';
            }
        }

        $output .= '</div>'; // .swiper-wrapper
        return $output;
    }

    return ''; // 画像がない場合は空文字を返す
}
add_shortcode('slider_images', 'display_slider_images');


// gallaryモーダル
function enqueue_gallery_modal_script() {
    wp_enqueue_script('gallery-modal', get_template_directory_uri() . '/js/gallery-modal.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_gallery_modal_script');

// カスタム投稿設定
add_filter('get_previous_post_where', 'custom_previous_post_where');
add_filter('get_next_post_where', 'custom_next_post_where');

function custom_previous_post_where($where) {
    if (get_post_type() == 'custom_post_type') {
        $where = str_replace("post_type = 'post'", "post_type = 'custom_post_type'", $where);
    }
    return $where;
}

function custom_next_post_where($where) {
    if (get_post_type() == 'custom_post_type') {
        $where = str_replace("post_type = 'post'", "post_type = 'custom_post_type'", $where);
    }
    return $where;
}

// contact
// ショートコードを登録してキャンペーンのタイトルを取得
function render_campaign_title_select() {
    // カスタム投稿タイプ 'campaign' の投稿を取得
    $campaign_posts = get_posts(array(
        'post_type' => 'campaign',  // カスタム投稿タイプ 'campaign'
        'posts_per_page' => -1,     // すべての投稿を取得
        'post_status' => 'publish'  // 公開済みの投稿のみ
    ));

    // セレクトボックスのHTMLを生成
    $output = '<select name="plan" class="form__select">';
    $output .= '<option value="">キャンペーン内容を選択</option>';  // プレースホルダーオプション

    // 各キャンペーン投稿のタイトルをオプションとして追加
    foreach ($campaign_posts as $post) {
        $output .= '<option value="' . esc_attr($post->post_title) . '">' . esc_html($post->post_title) . '</option>';
    }

    $output .= '</select>';

    return $output;
}

// ショートコードを登録
add_shortcode('campaign_title_select', 'render_campaign_title_select');

// Contact Form 7のフォームにショートコードを挿入
function wpcf7_add_campaign_title_select($form) {
    // Contact Form 7のフォーム内にショートコードの代わりにセレクトボックスを挿入
    $form = preg_replace_callback('/\[campaign_title_select\]/', function($matches) {
        return render_campaign_title_select();
    }, $form);

    return $form;
}

add_filter('wpcf7_form_elements', 'wpcf7_add_campaign_title_select');


// 投稿ページ投稿数指定
function change_posts_per_page($query)
{
    if (is_admin() || !$query->is_main_query())
        return;

    if ($query->is_post_type_archive('voice')) {
        $query->set('posts_per_page', '8');
    }

    if ($query->is_post_type_archive('campaign')) {
        $query->set('posts_per_page', '4');
    }
}
add_action('pre_get_posts', 'change_posts_per_page');

function remove_pagenavi_css() {
    wp_deregister_style('wp-pagenavi');
}
add_action('wp_print_styles', 'remove_pagenavi_css', 100);

add_theme_support('post-thumbnails');






// サイドバーblog
function set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function track_post_views ($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    set_post_views($post_id);
}
add_action('wp_head', 'track_post_views');

function get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
// mv
// SCFで登録されたスワイパー画像を取得するカスタム関数
function get_swiper_images() {
    $images = [
        'pc' => [],
        'sp' => []
    ];
    if (function_exists('scf_get')) {
        $pc_images = scf_get('swiper-parts.pc-img');
        $sp_images = scf_get('swiper-parts.sp-img');

        if ($pc_images && is_array($pc_images)) {
            foreach ($pc_images as $image) {
                $images['pc'][] = $image['url']; // pc-imgのURLを格納
            }
        }
        if ($sp_images && is_array($sp_images)) {
            foreach ($sp_images as $image) {
                $images['sp'][] = $image['url']; // sp-imgのURLを格納
            }
        }
    }
    return $images;
}




// アイコン
function change_post_menu_label() {
    global $menu;
    global $submenu;
    
    // サイドバーメニューの「投稿」を「ブログ」に変更
    $menu[5][0] = 'ブログ';
    
    // 投稿リストの「投稿」を「ブログ」に変更
    $submenu['edit.php'][5][0] = 'ブログ';
}
add_action('admin_menu', 'change_post_menu_label');
function custom_admin_styles() {
    echo '<style>
        #adminmenu .menu-icon-post div.wp-menu-image:before {
            content: "\f120"; /* アイコンコード */
            color: #000000; /* アイコンの色 */
        }
        #adminmenu li.menu-top.menu-icon-post:hover a.wp-menu-link {
            background: #cd5c5c; /* ホバー時の背景色 */
        }
    </style>';
}
add_action('admin_head', 'custom_admin_styles');
function custom_admin_sidebar_style() {
    echo '<style>
        #adminmenu {
            background-color:#c71585; /* サイドバーの背景色 */
        }
        #adminmenu .wp-menu-name {
            color:#e6e6fa; /* メニュー項目の文字色 */
        }
        #adminmenu a.wp-menu-link:hover {
            background-color:#808080; /* ホバー時の背景色 */
        }
    </style>';
}
add_action('admin_head', 'custom_admin_sidebar_style');

function add_featured_image_column_to_posts($columns) {
    $columns['featured_image'] = __('Featured Image');
    return $columns;
}
add_filter('manage_posts_columns', 'add_featured_image_column_to_posts');
 
function show_featured_image_column_in_posts($column_name, $post_id) {
    if ('featured_image' === $column_name) {
        $post_featured_image = get_the_post_thumbnail($post_id, 'thumbnail');
        if ($post_featured_image) {
            echo $post_featured_image;
        }
    }
}
add_action('manage_posts_custom_column', 'show_featured_image_column_in_posts', 10, 2);