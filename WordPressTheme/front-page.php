<?php
// URL変数の設定
$campaign = esc_url(home_url('/campaign/'));
$aboutus = esc_url(home_url('/aboutus/'));
$information = esc_url(home_url('/information/'));
$blog = esc_url(home_url('/blog/'));
$voice = esc_url(home_url('/voice/'));
$price = esc_url(home_url('/price/'));
$faq = esc_url(home_url('/faq/'));
$contact = esc_url(home_url('/contact/'));
?>
<?php get_header(); ?>

<!-- メインビュー -->
<div class="mv">
    <div class="mv__inner">
        <div class="mv__white-background">
            <div class="mv__title-wrap mv__title-wrap--green">
                <h2 class="mv__title">DIVING</h2>
                <p class="mv__title-sub">into&nbsp;the&nbsp;ocean</p>
            </div>
            <div class="slide-in"></div>
        </div>
        <div class="mv__slider swiper js-mv-swiper">
            <div class="swiper-wrapper">
                <?php
                // SCFから画像を取得
                $pc_images = SCF::get('pc-img'); // PC用画像
                $sp_images = SCF::get('sp-img'); // スマホ用画像

                // PC用画像スライドの出力
                foreach ($pc_images as $pc_image) {
                    $pc_img_url = wp_get_attachment_image_url($pc_image, 'full');
                    echo '<div class="swiper-slide">';
                    echo '<div class="swiper-slide__img">';
                    echo '<picture>';
                    echo '<source srcset="' . esc_url($pc_img_url) . '" media="(min-width:765px)" />';
                    echo '<img src="' . esc_url($pc_img_url) . '" alt="スライダー画像" />';
                    echo '</picture>';
                    echo '</div>';
                    echo '</div>';
                }

                // スマホ用画像スライドの出力
                foreach ($sp_images as $sp_image) {
                    $sp_img_url = wp_get_attachment_image_url($sp_image, 'full');
                    echo '<div class="swiper-slide">';
                    echo '<div class="swiper-slide__img">';
                    echo '<picture>';
                    echo '<source srcset="' . esc_url($sp_img_url) . '" media="(max-width:764px)" />';
                    echo '<img src="' . esc_url($sp_img_url) . '" alt="スライダー画像" />';
                    echo '</picture>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
            <div class="mv__title-wrap">
                <h2 class="mv__title">DIVING</h2>
                <p class="mv__title-sub">into&nbsp;the&nbsp;ocean</p>
            </div>
        </div>
    </div>
</div>



<!-- campaign -->
<section id="campaign" class="campaign top-campaign">
    <div class="campaign__inner inner">
        <div class="campaign__title-wrap">
            <div class="section-title">
                <p class="section-title__main">Campaign</p>
                <h2 class="section-title__sub">キャンペーン</h2>
            </div>
        </div>
        <div class="campaign__wrap u-desktop">
            <div class="campaign__next swiper-button-next"></div>
            <div class="campaign__prev swiper-button-prev"></div>
        </div>
        <div class="campaign__cards-wrap">
            <div class="campaign__cards js-campaign-swiper">
                <div class="campaign__cards-wrapper swiper-wrapper">
                    <div class="campaign__card campaign-card swiper-slide">
                        <div class="campaign-card__imgs">
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-cd1.jpg"
                                alt="色とりどりの魚の群れの様子" class="campaign-card__img" />
                        </div>
                        <div class="campaign-card__contents">
                            <div class="campaign-card__box">
                                <div class="campaign-card__tag">
                                    <p class="campaign-card__category">ライセンス講習</p>
                                </div>
                                <p class="campaign-card__description">ライセンス取得</p>
                            </div>
                            <div class="campaign-card__container">
                                <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                                <div class="campaign-card__price-wrap">
                                    <div class="campaign-card__price-out">¥56,000</div>
                                    <div class="campaign-card__price-in">¥46,000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="campaign__card campaign-card swiper-slide">
                        <div class="campaign-card__imgs">
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-cd2.jpg"
                                alt="透明な海に浮かぶ船の様子" class="campaign-card__img" />
                        </div>
                        <div class="campaign-card__contents">
                            <div class="campaign-card__box">
                                <div class="campaign-card__tag">
                                    <p class="campaign-card__category">体験ダイビング</p>
                                </div>
                                <p class="campaign-card__description">貸切体験ダイビング</p>
                            </div>
                            <div class="campaign-card__container">
                                <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                                <div class="campaign-card__price-wrap">
                                    <div class="campaign-card__price-out">¥24,000</div>
                                    <div class="campaign-card__price-in">¥18,000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="campaign__card campaign-card swiper-slide">
                        <div class="campaign-card__imgs">
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-cd3.jpg"
                                alt="深海のクラゲの様子" class="campaign-card__img" />
                        </div>
                        <div class="campaign-card__contents">
                            <div class="campaign-card__box">
                                <div class="campaign-card__tag">
                                    <p class="campaign-card__category">体験ダイビング</p>
                                </div>
                                <p class="campaign-card__description">ナイトダイビング</p>
                            </div>
                            <div class="campaign-card__container">
                                <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                                <div class="campaign-card__price-wrap">
                                    <div class="campaign-card__price-out">¥10,000</div>
                                    <div class="campaign-card__price-in">¥8,000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="campaign__card campaign-card swiper-slide">
                        <div class="campaign-card__imgs">
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-cd4.jpg"
                                alt="海面に顔お出すダイバーたちの様子" class="campaign-card__img" />
                        </div>
                        <div class="campaign-card__contents">
                            <div class="campaign-card__box">
                                <div class="campaign-card__tag">
                                    <p class="campaign-card__category">ファンダイビング</p>
                                </div>
                                <p class="campaign-card__description">貸切ファンダイビング</p>
                            </div>
                            <div class="campaign-card__container">
                                <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                                <div class="campaign-card__price-wrap">
                                    <div class="campaign-card__price-out">¥20,000</div>
                                    <div class="campaign-card__price-in">¥16,000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="campaign__card campaign-card swiper-slide">
                        <div class="campaign-card__imgs">
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-cd4.jpg"
                                alt="海面に顔お出すダイバーたちの様子" class="campaign-card__img" />
                        </div>
                        <div class="campaign-card__contents">
                            <div class="campaign-card__box">
                                <div class="campaign-card__tag">
                                    <p class="campaign-card__category">ファンダイビング</p>
                                </div>
                                <p class="campaign-card__description">貸切ファンダイビング</p>
                            </div>
                            <div class="campaign-card__container">
                                <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                                <div class="campaign-card__price-wrap">
                                    <div class="campaign-card__price-out">¥20,000</div>
                                    <div class="campaign-card__price-in">¥16,000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="campaign__contact">
            <a href="<?php echo $campaign; ?>" class="btn">
                <span>View more</span>
            </a>
        </div>
    </div>
</section>
<!-- about us -->
<section id="about" class="about top-about">
    <div class="about__inner inner">
        <div class="about__title-wrap">
            <div class="section-title">
                <p class="section-title__main">About us</p>
                <h2 class="section-title__sub">私たちについて</h2>
            </div>
        </div>
        <div class="about__container">
            <div class="about__visual-wrap">
                <div class="about__imgs-left">
                    <picture>
                        <source
                            srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/aboutUs-left.jpg"
                            media="(max-width:765px)" />
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutUs-left-pc.jpg"
                            alt="沖縄建築の屋根にシーサーが載っている様子" class="about__img-left" />
                    </picture>
                </div>
                <div class="about__imgs-right">
                    <picture>
                        <source
                            srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/aboutUs-right.jpg"
                            media="(max-width:765px)" />
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutUs-right-pc.jpg"
                            alt="黄色い熱帯魚が泳ぐ様子" class="about__img-right" />
                    </picture>
                </div>
            </div>
            <div class="about__content">
                <div class="about__first">
                    <h3 class="about__content-title">
                        Dive into<br />
                        the Ocean
                    </h3>
                </div>
                <div class="about__second">
                    <p class="about__content-text">
                        ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                        ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                    </p>
                    <div class="about__content-box">
                        <a href="<?php echo $aboutus; ?>" class="btn"><span>View more</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- information -->
<section id="information" class="information top-information">
    <div class="information__inner inner">
        <div class="information__title-wrap">
            <div class="section-title">
                <p class="section-title__main">Information</p>
                <h2 class="section-title__sub">ダイビング情報</h2>
            </div>
        </div>
        <div class="information__container">
            <div class="information__visual-wrap colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information1.jpg" alt=""
                    class="information__img" />
            </div>
            <div class="information__content">
                <h3 class="information__content-title">ライセンス講習</h3>
                <p class="information__content-text">
                    当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br />
                    正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
                </p>
                <div class="information__btn-wrap">
                    <a href="<?php echo $information; ?>" class="btn">
                        <span>View more</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog -->
<section id="blog" class="blog">
    <div class="blog__inner inner">
        <div class="blog__title-wrap">
            <div class="section-title">
                <p class="section-title__main section-title__main--white">Blog</p>
                <h2 class="section-title__sub section-title__sub--white">ブログ</h2>
            </div>
        </div>
        <div class="blog__cards blog-cards">
            <a class="blog-cards__item blog-card">
                <div class="blog-card__img-wrap">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-card1.jpg" alt="赤い珊瑚が海を漂う様子"
                        class="blog-card__img" />
                </div>
                <div class="blog-card__body">
                    <time class="blog-card__date" datetime="2023-11-17">2023.11/17</time>
                    <p class="blog-card__title">ライセンス取得</p>
                    <p class="blog-card__text">
                        ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                        ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                    </p>
                </div>
            </a>
            <a class="blog-cards__item blog-card">
                <div class="blog-card__img-wrap">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-card2.jpg" alt="海亀が泳ぐ様子"
                        class="blog-card__img" />
                </div>
                <div class="blog-card__body">
                    <time class="blog-card__date" datetime="2023-11-17">2023.11/17</time>
                    <p class="blog-card__title">ウミガメと泳ぐ</p>
                    <p class="blog-card__text">
                        ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                        ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                    </p>
                </div>
            </a>
            <a class="blog-cards__item blog-card">
                <div class="blog-card__img-wrap">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-card3.jpg"
                        alt="クマノミがイソギンチャクに隠れている様子" class="blog-card__img" />
                </div>
                <div class="blog-card__body">
                    <time class="blog-card__date" datetime="2023-11-17">2023.11/17</time>
                    <p class="blog-card__title">カクレクマノミ</p>
                    <p class="blog-card__text">
                        ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                        ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                    </p>
                </div>
            </a>
        </div>
        <div class="blog__btn-wrap">
            <a href="<?php echo $blog; ?>" class="btn">
                <span>View more</span>
            </a>
        </div>
    </div>
    <div class="blog__visual-wrap u-desktop">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-visual.pc.jpg" alt="綺麗な水面の様子"
            class="blog__visual" />
    </div>
</section>
<!-- voice -->
<section id="voice" class="voice top-voice">
    <div class="voice__inner inner">
        <div class="voice__title-wrap">
            <div class="section-title">
                <p class="section-title__main">Voice</p>
                <h2 class="section-title__sub">お客様の声</h2>
            </div>
        </div>
        <div class="voice__cards voice-cards">
            <div class="voice-cards__item voice-card">
                <div class="voice-card__container">
                    <div class="voice-card__imgs colorbox">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice-sp1.jpg"
                            alt="麦わら帽子を被った成人女性が笑顔でいる様子" class="voice-card__img" />
                    </div>
                    <div class="voice-card__content">
                        <div class="voice-card__box">
                            <div class="voice-card__detail">
                                <p class="voice-card__item">20代(女性)</p>
                                <div class="voice-card__category">
                                    <div class="voice-card__category-text">ライセンス講習</div>
                                </div>
                            </div>
                            <p class="voice-card__lead">ここにタイトルが入ります。ここにタイトル</p>
                        </div>
                    </div>
                </div>
                <p class="voice-card__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入りま<br />す。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                    ここにテキストが入ります。ここにテキストが入ります。
                </p>
            </div>
            <div class="voice-cards__item voice-card">
                <div class="voice-card__container">
                    <div class="voice-card__imgs colorbox">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice-sp2.jpg"
                            alt="麦わら帽子を被った成人女性が笑顔でいる様子" class="voice-card__img" />
                    </div>
                    <div class="voice-card__content">
                        <div class="voice-card__box">
                            <div class="voice-card__detail">
                                <p class="voice-card__item">20代(男性)</p>
                                <div class="voice-card__category">
                                    <div class="voice-card__category-text">ファンダイビング</div>
                                </div>
                            </div>
                            <p class="voice-card__lead">ここにタイトルが入ります。ここにタイトル</p>
                        </div>
                    </div>
                </div>
                <p class="voice-card__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入りま<br />す。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                    ここにテキストが入ります。ここにテキストが入ります。
                </p>
            </div>
        </div>
        <div class="voice__btn-wrap">
            <a href="<?php echo $voice; ?>" class="btn">
                <span>View more</span>
            </a>
        </div>
    </div>
</section>
<!-- price -->
<section id="price" class="price top-price">
    <div class="price__inner inner">
        <div class="price__title-wrap">
            <div class="section-title">
                <p class="section-title__main">Price</p>
                <h2 class="section-title__sub">料金一覧</h2>
            </div>
        </div>
        <div class="price__container">
            <div class="price__img-wrap colorbox">
                <picture>
                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-sp.jpg"
                        media="(max-width:765px)" />
                    <img class="price__img" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-pc.jpg"
                        alt="海亀が泳ぐ様子" />
                </picture>
            </div>
            <div class="price__content">
                <?php
                // SCFのグループフィールドデータを取得
                $price_groups = SCF::get('price-genre');

                if ($price_groups) :
                    foreach ($price_groups as $price_group) :
                        $category = esc_html($price_group['category']); // カテゴリー
                        $product_1 = esc_html($price_group['product_1']); // 商品名1
                        $price_1 = filter_var($price_group['price_1'], FILTER_SANITIZE_NUMBER_INT); // 値段1
                        $product_2 = esc_html($price_group['product_2']); // 商品名2
                        $price_2 = filter_var($price_group['price_2'], FILTER_SANITIZE_NUMBER_INT); // 値段2
                        $product_3 = esc_html($price_group['product_3']); // 商品名3
                        $price_3 = filter_var($price_group['price_3'], FILTER_SANITIZE_NUMBER_INT); // 値段3
                        $product_4 = esc_html($price_group['product_4']); // 商品名4
                        $price_4 = filter_var($price_group['price_4'], FILTER_SANITIZE_NUMBER_INT); // 値段4
                ?>

                <div class="price__box">
                    <h3 class="price__lead"><?php echo $category; ?></h3>
                    <div class="price__menu">
                        <?php if (!empty($product_1) && !empty($price_1)) : ?>
                        <p class="price__name"><?php echo $product_1; ?></p>
                        <p class="price__cost">&yen;<?php echo number_format($price_1); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="price__menu">
                        <?php if (!empty($product_2) && !empty($price_2)) : ?>
                        <p class="price__name"><?php echo $product_2; ?></p>
                        <p class="price__cost">&yen;<?php echo number_format($price_2); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="price__menu">
                        <?php if (!empty($product_3) && !empty($price_3)) : ?>
                        <p class="price__name"><?php echo $product_3; ?></p>
                        <p class="price__cost">&yen;<?php echo number_format($price_3); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="price__menu">
                        <?php if (!empty($product_4) && !empty($price_4)) : ?>
                        <p class="price__name"><?php echo $product_4; ?></p>
                        <p class="price__cost">&yen;<?php echo number_format($price_4); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
        <div class="price__btn-wrap">
            <a href="<?php echo $price; ?>" class="btn">
                <span>View more</span>
            </a>
        </div>
    </div>
    <div class="price__visual-left u-desktop">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-pc.left.svg" alt="6匹の魚が泳いでる絵"
            class="price__visual-img" />
    </div>
</section>


<button id="topButton" class="top-button">
    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
        class="top-button__icon" />
</button>
</main>
<!-- <footer> -->
<?php get_footer(); ?>
</body>

</html>