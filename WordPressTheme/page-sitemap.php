<?php get_header(); ?>
<!-- common-mv -->
<section id="#" class="common-mv">
    <div class="common-mv__inner">
        <div class="common-mv__img">
            <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/sitemap_mv.pc.jpg"
                    media="(min-width:1025px)" />
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/sitemap_mv.sp.jpg"
                    alt="ダイバーが海中で詰まっている様子" />
            </picture>
            <div class="common-mv__box">
                <h1 class="common-mv__title">Site MAP</h1>
            </div>
        </div>
    </div>
</section>
<?php get_template_part("parts/breadcrumb"); ?>
<section id="sitemap" class="sitemap top-sitemap">
    <div class="sitemap__inner inner">
        <div class="sitemap__outer">
            <div class="sitemap__menu footer-menu">
                <div class="footer-menu__wrapper footer-menu__wrapper--black">
                    <div class="footer-menu__body footer-menu__body--left">
                        <div class="footer-menu__box-pc footer-menu__box-pc--black">
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="page-campaign.html"
                                        class="footer-menu__link-top footer-menu__link-top--black">キャンペーン</a></li>
                                <li class="footer-menu__item"><a href="#"
                                        class="footer-menu__link footer-menu__link--black">ライセンス取得</a></li>
                                <li class="footer-menu__item"><a href="#"
                                        class="footer-menu__link footer-menu__link--black">貸切体験ダイビング</a></li>
                                <li class="footer-menu__item"><a href="#"
                                        class="footer-menu__link footer-menu__link--black">ナイトダイビング</a></li>
                            </ul>
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="page-about.html"
                                        class="footer-menu__link-top footer-menu__link-top--black">私たちについて</a></li>
                            </ul>
                        </div>
                        <div class="footer-menu__box-pc footer-menu__box-pc--black">
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="page-information.html"
                                        class="footer-menu__link-top footer-menu__link-top--black">ダイビング情報</a></li>
                                <div class="footer-menu__item"><a href="#"
                                        class="footer-menu__link footer-menu__link--black">ライセンス講習</a></div>
                                <div class="footer-menu__item"><a href="#"
                                        class="footer-menu__link footer-menu__link--black">体験ダイビング</a></div>
                                <div class="footer-menu__item"><a href="#"
                                        class="footer-menu__link footer-menu__link--black">ファンダイビング</a></div>
                            </ul>
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="page-blog.html"
                                        class="footer-menu__link-top footer-menu__link-top--black">ブログ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-menu__body footer-menu__body--black">
                        <div class="footer-menu__box-pc">
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="page-voice.html"
                                        class="footer-menu__link-top footer-menu__link-top--black">お客様の声</a></li>
                            </ul>
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="page-price.html"
                                        class="footer-menu__link-top footer-menu__link-top--black">料金一覧</a></li>
                                <li class="footer-menu__item"><a href="#"
                                        class="footer-menu__link footer-menu__link--black">ライセンス講習</a></li>
                                <li class="footer-menu__item"><a href="#"
                                        class="footer-menu__link footer-menu__link--black">体験ダイビング</a></li>
                                <li class="footer-menu__item"><a href="#"
                                        class="footer-menu__link footer-menu__link--black">ファンダイビング</a></li>
                            </ul>
                        </div>
                        <div class="footer-menu__box-pc footer-menu__box-pc--black">
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="page-faq.html"
                                        class="footer-menu__link-top footer-menu__link-top--black">よくある質問</a></li>
                            </ul>
                            <ul class="drawer-menu__items">
                                <li class="footer-menu__item">
                                    <a href="policy.html"
                                        class="footer-menu__link-top footer-menu__link-top--black">プライバシー<br
                                            class="u-mobile" />ポリシー</a>
                                </li>
                            </ul>
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="terms.html"
                                        class="footer-menu__link-top footer-menu__link-top--black">利用規約</a></li>
                            </ul>
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="page-contact.html"
                                        class="footer-menu__link-top footer-menu__link-top--black">お問い合わせ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>