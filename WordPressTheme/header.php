<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="robots" content="noindex" />
    <!-- ファビコン -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/common/favicon.ico" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Gotu&family=Noto+Sans+JP&family=Noto+Serif+JP&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
    <!-- css -->
    <?php wp_head(); ?>
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script>
      // ページ遷移フラグのチェック（チラつき防止のため最速で実行）
      if (sessionStorage.getItem('is-transitioning')) {
        document.write('<style id="transition-blocking-style">.page-transition { transform: translateY(0) !important; }</style>');
      }
    </script>
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
    <!-- ページ遷移アニメーション用波 -->
    <div class="page-transition">
      <div class="page-transition__wave-wrap">
        <!-- 第1波（前面：ティール） -->
        <svg class="page-transition__wave page-transition__wave--1" viewBox="0 0 2880 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
          <g class="wave-group">
            <path d="M0,60 C200,10 400,100 600,50 C800,0 1000,90 1200,40 C1300,15 1380,55 1440,50 L1440,100 L0,100 Z"/>
            <path d="M1440,60 C1640,10 1840,100 2040,50 C2240,0 2440,90 2640,40 C2740,15 2820,55 2880,50 L2880,100 L1440,100 Z"/>
          </g>
        </svg>
        <!-- 第2波（背面：明るい水色） -->
        <svg class="page-transition__wave page-transition__wave--2" viewBox="0 0 2880 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
          <g class="wave-group">
            <path d="M0,30 C180,90 420,0 660,60 C900,120 1100,20 1320,70 C1380,90 1420,60 1440,50 L1440,100 L0,100 Z"/>
            <path d="M1440,30 C1620,90 1860,0 2100,60 C2340,120 2540,20 2760,70 C2820,90 2860,60 2880,50 L2880,100 L1440,100 Z"/>
          </g>
        </svg>
      </div>

      <!-- 本体（海の青グラデーション） -->
      <div class="page-transition__body"></div>
    </div>


    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">
                <?php if (!is_front_page()) : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
                    <?php endif; ?>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/header-logo.svg?v=1.1" alt="ヘッダーロゴ" />
                    <?php if (!is_front_page()) : ?>
                </a>
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
                                        <a href="" data-target="license" class="drawer-menu__link">ライセンス講習</a>
                                    </li>
                                    <li class="drawer-menu__item">
                                        <a href="" data-target="experience-diving" class="drawer-menu__link">体験ダイビング</a>
                                    </li>
                                    <li class="drawer-menu__item">
                                        <a href="" data-target="fun-diving" class="drawer-menu__link">ファンダイビング</a>
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
                                <ul class="drawer-menu__items">
                                    <li class="drawer-menu__item">
                                        <a href="<?php echo $sitemap; ?>" class="drawer-menu__link-top">サイトマップ</a>
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