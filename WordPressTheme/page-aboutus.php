<?php get_header(); ?>

<!-- common-mv -->
<?php get_template_part('parts/mv');

get_common_mv(
    '/assets/images/common/co-aboutus-pc.jpg',  // PC用画像のパス
    '/assets/images/common/co-aboutus-sp.jpg',  // スマホ用画像のパス
    '一匹のシーサーが佇む様子',                // 画像の代替テキスト
    'About us'                                 // タイトル
);

?>

<?php get_template_part("parts/breadcrumb"); ?>

<section class="page-about top-page-about">
    <div class="page-about__inner inner">
        <div class="page-about__wrap">
            <div class="page-about__container">
                <div class="page-about__visual-wrap">
                    <div class="page-about__imgs-left u-desktop">
                        <picture>
                            <source
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/aboutUs-left.jpg"
                                media="(max-width:765px)" />
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/aboutUs-left-pc.jpg"
                                alt="沖縄建築の屋根にシーサーが載っている様子" class="page-about__img-left" />
                        </picture>
                    </div>
                    <div class="page-about__imgs-right">
                        <picture>
                            <source
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/aboutUs-right.jpg"
                                media="(max-width:765px)" />
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/aboutUs-right-pc.jpg"
                                alt="黄色い熱帯魚が泳ぐ様子" class="page-about__img-right" />
                        </picture>
                    </div>
                </div>
                <div class="page-about__content">
                    <div class="page-about__first">
                        <h3 class="page-about__content-title">
                            Dive into<br />
                            the Ocean
                        </h3>
                    </div>
                    <div class="page-about__second">
                        <p class="page-about__content-text">
                            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
// SCFから繰り返しフィールドのデータを取得
$gallery_images = SCF::get('gallery_images');

if (!empty($gallery_images)) : // 画像がある場合のみセクション全体を表示
    // 画像が存在するか確認
    $has_images = false;
    foreach ($gallery_images as $image_data) {
        $image_id = $image_data['image'];
        if (wp_get_attachment_image_src($image_id, 'full')) {
            $has_images = true;
            break;
        }
    }

    if ($has_images) : // 画像が存在する場合のみ以下の内容を表示
?>
<section class="gallery top-gallery">
    <div class="gallery__inner inner">
        <div class="gallery__title-wrap">
            <div class="section-title">
                <p class="section-title__main">Gallery</p>
                <h2 class="section-title__sub">フォト</h2>
            </div>
        </div>
        <div class="gallery__imgs gallery-items">
            <?php
                foreach ($gallery_images as $image_data) :
                    $image_id = $image_data['image'];
                    $image_src = wp_get_attachment_image_src($image_id, 'full');
                    // 画像があるかチェック
                    if ($image_src) {
                        $image_url = $image_src[0]; // URLを取得
                        $image_alt = isset($image_data['caption']) ? esc_attr($image_data['caption']) : '画像の説明がありません';
                ?>
            <div class="gallery-items__img">
                <img src="<?php echo esc_url($image_url); ?>" class="gallery-items__img-link" data-group="gallery"
                    alt="<?php echo esc_attr($image_alt); ?>" />
            </div>
            <?php
                    }
                endforeach;
                ?>
        </div>
        <div class="gallery__modal">
            <div class="gallery__modal-content">
                <img src="" alt="Modal Image" class="gallery__modal-img" />
            </div>
        </div>
    </div>
</section>
<?php
    endif;
endif;
?>
<button id="topButton" class="top-button">
    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
        class="top-button__icon" />
</button>
<?php get_footer(); ?>