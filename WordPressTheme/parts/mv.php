<?php
// parts/mv.php
/**
 * 共通MVセクションを出力する関数
 *
 * @param string $pc_image_url PC用の画像パス
 * @param string $sp_image_url スマホ用の画像パス
 * @param string $alt_text 画像の代替テキスト
 * @param string $title MVのタイトル
 */
function get_common_mv($image_pc, $image_sp, $alt_text, $title) {
    ?>
<section id="#" class="common-mv">
    <div class="common-mv__inner">
        <div class="common-mv__img">
            <picture>
                <source srcset="<?php echo esc_url(get_template_directory_uri() . $image_pc); ?>"
                    media="(min-width:768px)" />
                <img src="<?php echo esc_url(get_template_directory_uri() . $image_sp); ?>"
                    alt="<?php echo esc_attr($alt_text); ?>" />
            </picture>
            <div class="common-mv__box">
                <h1 class="common-mv__title"><?php echo esc_html($title); ?></h1>
            </div>
        </div>
    </div>
</section>
<?php
}