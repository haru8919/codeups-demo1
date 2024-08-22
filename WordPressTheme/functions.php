<?php
function add_custom_scripts() {
    
    // Google Fontsの追加
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css2?family=Gotu&family=Noto+Sans+JP&family=Noto+Serif+JP&display=swap', false );
    wp_enqueue_style( 'google-fonts-lato', '//fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', false );

    // SwiperのCSSの追加
    wp_enqueue_style( 'swiper', '//cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', false );

    // テーマのCSSの追加
    wp_enqueue_style( 'theme-styles', get_theme_file_uri('assets/css/style.css'), array(), '1.0.0', 'all' );

    // jQueryの追加
    wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js', array(), '3.7.0', true );

    // SwiperのJSの追加
    wp_enqueue_script( 'swiper', '//cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), '11.0.0', true );

    // テーマのJSの追加
    wp_enqueue_script( 'theme-scripts', get_theme_file_uri('assets/js/script.js'), array('jquery', 'swiper'), '1.0.0', true );

// gallery-modal.jsの追加
wp_enqueue_script( 'gallery-modal', get_theme_file_uri('assets/js/gallery-modal.js'), array('jquery'), '1.0.0', true );


}

add_action( 'wp_enqueue_scripts', 'add_custom_scripts' );

// crossorigin属性を持つタグに対する対応
function add_rel_preconnect( $html, $handle, $href, $media ) {
    if ( 'google-fonts' === $handle || 'google-fonts-lato' === $handle || 'swiper' === $handle ) {
        $html = <<<EOT
<link rel='preconnect' href='//fonts.googleapis.com'>
<link rel='preconnect' href='//fonts.gstatic.com' crossorigin>
$html
EOT;
    }
    return $html;
}

add_filter( 'style_loader_tag', 'add_rel_preconnect', 10, 4 );

// swiper
function add_custom_fields() {
    add_menu_page('Slider Images', 'Slider Images', 'manage_options', 'slider-images', 'slider_images_page');
    add_action('admin_init', 'register_slider_images');
}

function register_slider_images() {
    for ($i = 1; $i <= 4; $i++) {
        register_setting('slider-images-group', 'slider_image_pc_' . $i);
        register_setting('slider-images-group', 'slider_image_mobile_' . $i);
        register_setting('slider-images-group', 'slider_image_alt_' . $i);
    }
}

function slider_images_page() {
    ?>
<div class="wrap">
    <h1>Slider Images</h1>
    <form method="post" action="options.php">
        <?php settings_fields('slider-images-group'); ?>
        <?php do_settings_sections('slider-images-group'); ?>
        <?php for ($i = 1; $i <= 4; $i++) : ?>
        <h2>Slide <?php echo $i; ?></h2>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">PC Image URL</th>
                <td><input type="text" name="slider_image_pc_<?php echo $i; ?>"
                        value="<?php echo esc_attr(get_option('slider_image_pc_' . $i)); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Mobile Image URL</th>
                <td><input type="text" name="slider_image_mobile_<?php echo $i; ?>"
                        value="<?php echo esc_attr(get_option('slider_image_mobile_' . $i)); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Alt Text</th>
                <td><input type="text" name="slider_image_alt_<?php echo $i; ?>"
                        value="<?php echo esc_attr(get_option('slider_image_alt_' . $i)); ?>" /></td>
            </tr>
        </table>
        <?php endfor; ?>
        <?php submit_button(); ?>
    </form>
</div>
<?php
}

add_action('admin_menu', 'add_custom_fields');

// gallaryモーダル
function enqueue_gallery_modal_script() {
    wp_enqueue_script('gallery-modal', get_template_directory_uri() . '/assets/js/gallery-modal', array('jquery'), null, true);
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

// contact キャンペーンタイトル取得
function render_campaign_select_field() {
    $args = array(
        'post_type' => 'campaign',
        'posts_per_page' => -1,
    );
    $campaigns = get_posts($args);

    $output = '<select name="plan" class="form__select">';
    $output .= '<option value="">キャンペーン内容を選択</option>';

    foreach ($campaigns as $campaign) {
        $output .= '<option value="' . esc_attr($campaign->post_title) . '">' . esc_html($campaign->post_title) . '</option>';
    }

    $output .= '</select>';

    return $output;
}
add_shortcode('campaign_select_field', 'render_campaign_select_field');




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


// information
function get_page_information_url() {
    return get_permalink(get_page_by_path('page-information')); // 'page-information' はスラッグ名
}

// スクリプトの読み込み
function my_enqueue_scripts() {
    // スクリプトの読み込み
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
    
    // スクリプトにデータをローカライズ
    wp_localize_script('script', 'myScriptData', array(
        'pageInformationUrl' => get_page_information_url(),
    ));
}

add_action('wp_enqueue_scripts', 'my_enqueue_scripts');



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