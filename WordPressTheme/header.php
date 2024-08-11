<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="robots" content="noindex" />
    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">
                <a href="index.html" class="logo-link">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/header-logo.svg" alt="ヘッダーロゴ" />
                </a>
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
                                    <li class="dorawer-menu__item"><a
                                            href="<?php echo esc_url( home_url( '/' ) ); ?>campaign"
                                            class="drawer-menu__link-top">キャンペーン</a></li>
                                    <li class="dorawer-menu__item"><a href="error.html"
                                            class="drawer-menu__link">ライセンス取得</a></li>
                                    <li class="dorawer-menu__item"><a href="#" class="drawer-menu__link">貸切体験ダイビング</a>
                                    </li>
                                    <li class="dorawer-menu__item"><a href="#" class="drawer-menu__link">ナイトダイビング</a>
                                    </li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="dorawer-menu__item"><a href="page-aboutus.php"
                                            class="drawer-menu__link-top">私たちについて</a></li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="dorawer-menu__item"><a href="page-information.html"
                                            class="drawer-menu__link-top">ダイビング情報</a></li>
                                    <li class="dorawer-menu__item"><a href="#" class="drawer-menu__link">ライセンス講習</a>
                                    </li>
                                    <li class="dorawer-menu__item"><a href="#" class="drawer-menu__link">体験ダイビング</a>
                                    </li>
                                    <li class="dorawer-menu__item"><a href="#" class="drawer-menu__link">ファンダイビング</a>
                                    </li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="dorawer-menu__item"><a href="page-blog.html"
                                            class="drawer-menu__link-top">ブログ</a></li>
                                </ul>
                            </div>
                            <div class="drawer-menu__body">
                                <ul class="drawer-menu__items">
                                    <li class="dorawer-menu__item"><a href="page-voice.html"
                                            class="drawer-menu__link-top">お客様の声</a></li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="dorawer-menu__item"><a href="page-price.html"
                                            class="drawer-menu__link-top">料金一覧</a></li>
                                    <li class="dorawer-menu__item"><a href="#" class="drawer-menu__link">ライセンス講習</a>
                                    </li>
                                    <li class="dorawer-menu__item"><a href="#" class="drawer-menu__link">体験ダイビング</a>
                                    </li>
                                    <li class="dorawer-menu__item"><a href="#" class="drawer-menu__link">ファンダイビング</a>
                                    </li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="dorawer-menu__item"><a href="page-faq.html"
                                            class="drawer-menu__link-top">よくある質問</a></li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="dorawer-menu__item">
                                        <a href="privacy.html" class="drawer-menu__link-top">プライバシー<br />ポリシ</a>
                                    </li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="dorawer-menu__item"><a href="terms.html"
                                            class="drawer-menu__link-top">利用規約</a></li>
                                </ul>
                                <ul class="drawer-menu__items">
                                    <li class="dorawer-menu__item"><a href="page-contact.html"
                                            class="drawer-menu__link-top">お問い合わせ</a></li>
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
                            <a href="page-campaign.html" class="header__link">Campaign<span>キャンペーン</span></a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo esc_url(home_url('/page-aboutus.php/')); ?>" class="header__link">About
                                us <span>私たちについて</span></a>
                        </li>
                        <li class="header__item">
                            <a href="page-information.html" class="header__link">Information<span>ダイビング情報</span></a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo esc_url(home_url('/home.php/')); ?>"
                                class="header__link">Blog<span>ブログ</span></a>
                        </li>
                        <li class="header__item">
                            <a href="page-voice.html" class="header__link">Voice<span>お客様の声</span></a>
                        </li>
                        <li class="header__item">
                            <a href="page-price.html" class="header__link">Price<span>料金一覧</span></a>
                        </li>
                        <li class="header__item">
                            <a href="page-faq.html" class="header__link">FAQ<span>よくある質問</span></a>
                        </li>
                        <li class="header__item">
                            <a href="page-contact.html" class="header__link">Contact<span>お問合せ</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>