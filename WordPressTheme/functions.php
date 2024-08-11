<?php
function add_custom_scripts() {
    // Google Fontsの追加
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Gotu&family=Noto+Sans+JP&family=Noto+Serif+JP&display=swap', false );
    wp_enqueue_style( 'google-fonts-lato', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', false );

    // SwiperのCSSの追加
    wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', false );

    // テーマのCSSの追加
    wp_enqueue_style( 'theme-styles', get_theme_file_uri('assets/css/style.css'), array(), '1.0.0', 'all' );

    // jQueryの追加
    wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js', array(), '3.7.0', true );

    // SwiperのJSの追加
    wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), '11.0.0', true );

    // テーマのJSの追加
    wp_enqueue_script( 'theme-scripts', get_theme_file_uri('assets/js/script.js'), array('jquery', 'swiper'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'add_custom_scripts' );

// crossorigin属性を持つタグに対する対応
function add_rel_preconnect( $html, $handle, $href, $media ) {
    if ( 'google-fonts' === $handle || 'google-fonts-lato' === $handle || 'swiper' === $handle ) {
        $html = <<<EOT
<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
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




// 投稿ページ投稿数指定
function change_posts_per_page($query)
{
    if (is_admin() || !$query->is_main_query())
        return;

    if ($query->is_post_type_archive('voice')) {
        $query->set('posts_per_page', '6');
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





// アイコン
function change_post_menu_label() {
    global $menu;
    global $submenu;
    
    // サイドバーメニューの「投稿」を「ブログ」に変更
    $menu[5][0] = 'ブログ';
    
    // 投稿リストの「投稿」を「ブログ」に変更
    $submenu['edit.php'][5][0] = 'ブログ';
    $submenu['edit.php'][10][0] = '新規追加';
    $submenu['edit.php'][16][0] = 'カテゴリ';
    $submenu['edit.php'][20][0] = 'タグ';
}
add_action('admin_menu', 'change_post_menu_label');
function custom_admin_styles() {
    echo '<style>
        #adminmenu .menu-icon-post div.wp-menu-image:before {
            content: "\f120"; /* アイコンコード */
            color: #8b0000; /* アイコンの色 */
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
            background-color:#5f9ea0; /* サイドバーの背景色 */
        }
        #adminmenu .wp-menu-name {
            color:#f0e68c; /* メニュー項目の文字色 */
        }
        #adminmenu a.wp-menu-link:hover {
            background-color: #9acd32; /* ホバー時の背景色 */
        }
    </style>';
}
add_action('admin_head', 'custom_admin_sidebar_style');