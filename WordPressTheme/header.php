<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="robots" content="noindex" />
    <?php wp_head(); ?>
</head>

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
$privacypolicy = esc_url( home_url('/privacypolicy/'));
$terms = esc_url( home_url('/terms/'));
$sitemap = esc_url( home_url('/sitemap/'));
?>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">
                <?php if (!is_front_page()) : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/header-logo.svg" alt="ヘッダーロゴ" />
                </a>
                <?php else : ?>
                <span class="logo-link">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/header-logo.svg" alt="ヘッダーロゴ" />
                </span>
                <?php endif; ?>
            </h1>
            <div class="header__hamburger hamburger js-hamburger u-mobile">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="header__drawer-menu drawer-menu js-drawer u-mobile">
                <div class="drawer-menu__top">
                    <div class="drawer-menu__inner inner">
                        <div class="drawer-menu__wrapper">
                            <div class="drawer-menu__body">
                                <ul class="drawer-menu__items">
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $campaign; ?>" class="drawer-menu__link-top">キャンペーン</a>
                                    </li>
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo add_query_arg('slug', 'ライセンス講習', get_post_type_archive_link('campaign')); ?>"
                                            class="drawer-menu__link">ライセンス取得</a>
                                    </li>
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo add_query_arg('slug', '貸切体験ダイビング', get_post_type_archive_link('campaign')); ?>"
                                            class="drawer-menu__link">貸切体験ダイビング</a>
                                    </li>
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo add_query_arg('slug', 'ナイトダイビング', get_post_type_archive_link('campaign')); ?>"
                                            class="drawer-menu__link">ナイトダイビング</a>
                                    </li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $aboutus; ?>" class="drawer-menu__link-top">私たちについて</a>
                                    </li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $information; ?>" class="drawer-menu__link-top">ダイビング情報</a>
                                    </li>
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $information; ?>?tab=license"
                                            class="drawer-menu__link">ライセンス講習</a>
                                    </li>
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $information; ?>?tab=experience-diving"
                                            class="drawer-menu__link">体験ダイビング</a>
                                    </li>
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $information; ?>?tab=fun-diving"
                                            class="drawer-menu__link">ファンダイビング</a>
                                    </li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $blog; ?>" class="drawer-menu__link-top">ブログ</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="drawer-menu__body">
                                <ul class="drawer-menu__items">
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $voice; ?>" class="drawer-menu__link-top">お客様の声</a>
                                    </li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $price; ?>" class="drawer-menu__link-top">料金一覧</a>
                                    </li>
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $price; ?>" class="drawer-menu__link">ライセンス講習</a>
                                    </li>
                                    <li class="drawer-menu__item">
                                        <a href<?php echo $price; ?>" class="drawer-menu__link">体験ダイビング</a>
                                    </li>
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $price; ?>" class="drawer-menu__link">ファンダイビング</a>
                                    </li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $faq; ?>" class="drawer-menu__link-top">よくある質問</a>
                                    </li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $privacypolicy; ?>"
                                            class="drawer-menu__link-top">プライバシー<br />ポリシー</a>
                                    </li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $terms; ?>" class="drawer-menu__link-top">利用規約</a>
                                    </li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $contact; ?>" class="drawer-menu__link-top">お問い合わせ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__wrapper u-desktop">
                <nav class="header__nav">
                    <ul class="header__items">
                        <li class="header__item">
                            <a href="<?php echo $campaign; ?>" class="header__link">Campaign<span>キャンペーン</span></a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo $aboutus; ?>" class="header__link">About us <span>私たちについて</span></a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo $information; ?>"
                                class="header__link">Information<span>ダイビング情報</span></a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo $blog; ?>" class="header__link">Blog<span>ブログ</span></a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo $voice; ?>" class="header__link">Voice<span>お客様の声</span></a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo $price; ?>" class="header__link">Price<span>料金一覧</span></a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo $faq; ?>" class="header__link">FAQ<span>よくある質問</span></a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo $contact; ?>" class="header__link">Contact<span>お問合せ</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>