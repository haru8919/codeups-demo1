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

<?php if (!is_404() && !is_page('contact')) : ?>
<section id="contact" class="contact top-page-about-contact">
    <div class="contact__inner inner">
        <div class="contact__wrap">
            <div class="contact__top">
                <div class="contact__logo-wrap">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/contact-logo.svg"
                        alt="コンタクトロゴ" class="contact__logo" />
                </div>
                <div class="contact__body">
                    <address class="contact__box">
                        <p class="contact__address">沖縄県那覇市1-1</p>
                        <p class="contact__telephone"><a href="tel:0120-000-0000">TEL:0120-000-0000</a></p>
                        <p class="contact__hours">営業時間:8:30-19:00</p>
                        <p class="contact__holiday">定休日:毎週火曜日</p>
                    </address>
                    <div class="contact__map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2419.5689719937795!2d127.6761103222558!3d26.21363574868127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e5699dc73d0d2b%3A0x2b90003fdd1094a2!2z44CSOTAwLTAwMTUg5rKW57iE55yM6YKj6KaH5biC5LmF6IyC5Zyw77yR5LiB55uu77yR!5e0!3m2!1sja!2sjp!4v1707787802965!5m2!1sja!2sjp"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="contact__under">
                <div class="contact__title-wrap">
                    <div class="section-title">
                        <p class="section-title__main section-title__main--large">Contact</p>
                        <h2 class="section-title__sub section-title__sub--contact">お問い合わせ</h2>
                    </div>
                    <h2 class="contact__title-sub">ご予約・お問い合わせはコチラ</h2>
                </div>
                <div class="contact__btn-wrap">
                    <a href="<?php echo $contact;?>" class="btn">
                        <span>Contact us</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (is_404()) : ?>
<footer class="footer top-error-footer">
    <?php else : ?>
    <footer class="footer top-footer">
        <?php endif; ?>
        <div class="footer__inner inner">
            <div class="footer__top">
                <div class="footer__top-wrap">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/footer-logo.svg" alt="フッターロゴ"
                        class="footer__logo" />
                    <div class="footer__top-box">
                        <!-- Facebookのリンク   window.opener へのアクセスを防ぎます-->
                        <a href="https://www.facebook.com/your-facebook-page" target="_blank" rel="noopener noreferrer">

                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/facebook-logo.svg"
                                alt="Facebookアイコン" class="footer__icon-facebook" />
                        </a>
                        <!-- Instagramのリンク -->
                        <a href="https://www.instagram.com/your-instagram-profile" target="_blank"
                            rel="noopener noreferrer">
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Instagram-logo.svg"
                                alt="Instagramアイコン" class="footer__icon-instagram" />
                        </a>
                    </div>

                </div>
            </div>
            <div class="footer__outer footer-menu">
                <div class="footer-menu__wrapper">
                    <div class="footer-menu__body footer-menu__body--left">
                        <div class="footer-menu__box-pc">
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="<?php echo $campaign; ?>"
                                        class="footer-menu__link-top">キャンペーン</a></li>
                                <li class="footer-menu__item"><a
                                        href="<?php echo add_query_arg('term', 'ライセンス講習', get_post_type_archive_link('campaign')); ?>"
                                        class="footer-menu__link">ライセンス取得</a>
                                </li>
                                <li class="footer-menu__item"><a
                                        href="<?php echo add_query_arg('term', '貸切ダイビング', get_post_type_archive_link('campaign')); ?>"
                                        class="footer-menu__link">貸切体験ダイビング</a>
                                </li>
                                <li class="footer-menu__item"><a
                                        href="<?php echo add_query_arg('term', 'ナイトダイビング', get_post_type_archive_link('campaign')); ?>"
                                        class="footer-menu__link">ナイトダイビング</a>
                                </li>
                            </ul>
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="<?php echo $aboutus; ?>"
                                        class="footer-menu__link-top">私たちについて</a></li>
                            </ul>
                        </div>
                        <div class="footer-menu__box-pc">
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item">
                                    <a href="<?php echo $information; ?>" class="footer-menu__link-top">ダイビング情報</a>
                                </li>
                                <li class="footer-menu__item">
                                    <a href="<?php echo $information; ?>?tab=license"
                                        class="footer-menu__link">ライセンス講習</a>
                                </li>
                                <li class="footer-menu__item">
                                    <a href="<?php echo $information; ?>?tab=experience-diving"
                                        class="footer-menu__link">体験ダイビング</a>
                                </li>
                                <li class="footer-menu__item">
                                    <a href="<?php echo $information; ?>?tab=fun-diving"
                                        class="footer-menu__link">ファンダイビング</a>
                                </li>
                            </ul>

                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="<?php echo $blog; ?>"
                                        class="footer-menu__link-top">ブログ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-menu__body">
                        <div class="footer-menu__box-pc">
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="<?php echo $voice; ?>"
                                        class="footer-menu__link-top">お客様の声</a></li>
                            </ul>
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="<?php echo $price; ?>"
                                        class="footer-menu__link-top">料金一覧</a></li>
                                <li class="footer-menu__item"><a href="<?php echo $price; ?>"
                                        class="footer-menu__link">ライセンス講習</a></li>
                                <li class="footer-menu__item"><a href="<?php echo $price; ?>"
                                        class="footer-menu__link">体験ダイビング</a></li>
                                <li class="footer-menu__item"><a href="<?php echo $price; ?>"
                                        class="footer-menu__link">ファンダイビング</a></li>
                            </ul>
                        </div>
                        <div class="footer-menu__box-pc footer__box-pc--special">
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="<?php echo $faq; ?>"
                                        class="footer-menu__link-top">よくある質問</a></li>
                            </ul>
                            <ul class="drawer-menu__items">
                                <li class="footer-menu__item"><a href="<?php echo $privacypolicy; ?>"
                                        class="footer-menu__link-top">プライバシーポリシー</a></li>
                            </ul>
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="<?php echo $terms; ?>"
                                        class="footer-menu__link-top">利用規約</a>
                                </li>
                            </ul>
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="<?php echo $contact; ?>"
                                        class="footer-menu__link-top">お問い合わせ</a></li>
                            </ul>
                            <ul class="footer-menu__items">
                                <li class="footer-menu__item"><a href="<?php echo $sitemap; ?>"
                                        class="footer-menu__link-top">サイトマップ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__under-box">
                <small
                    class="footer__copyright">Copyright&nbsp;&copy;&nbsp;2021-2023&nbsp;CodeUps&nbsp;LLC.&nbsp;All&nbsp;Rights&nbsp;Reserved</small>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    </body>

    </html>