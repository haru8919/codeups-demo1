    <?php get_header(); ?>
    <!-- common-mv -->
    <section id="#" class="common-mv">
        <div class="common-mv__inner">
            <div class="common-mv__img">
                <picture>
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/co-aboutus-pc.jpg"
                        media="(min-width:1025px)" />
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/co-aboutus-sp.jpg"
                        alt="一匹のシーサーが佇む様子" />
                </picture>
                <div class="common-mv__box">
                    <h1 class="common-mv__title">About us</h1>
                </div>
            </div>
        </div>
    </section>
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
            // SCFから繰り返しフィールドのデータを取得
            $gallery_images = SCF::get('gallery_images');
            if (!empty($gallery_images)) :
                foreach ($gallery_images as $image_data) :
                    $image_url = wp_get_attachment_image_src($image_data['image'], 'full')[0];
                    $image_alt = esc_attr($image_data['caption']);
            ?>
                <div class="gallery-items__img">
                    <img src="<?php echo esc_url($image_url); ?>" class="gallery-items__img-link" data-group="gallery"
                        alt="<?php echo $image_alt; ?>" />
                </div>
                <?php
                endforeach;
            endif;
            ?>
            </div>
            <div class="gallery__modal">
                <div class="gallery__modal-content">
                    <img src="" alt="Modal Image" class="gallery__modal-img" />
                </div>
            </div>
        </div>
    </section>


    <?php get_footer(); ?>