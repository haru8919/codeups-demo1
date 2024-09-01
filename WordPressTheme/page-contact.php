<?php get_header(); ?>
<!-- common-mv -->
<?php get_template_part('parts/mv');

get_common_mv(
    '/assets/images/common/page-contact_pc.jpg',  // PC用画像のパス
    '/assets/images/common/page-contact_sp.jpg',  // スマホ用画像のパス
    '綺麗な砂浜の様子',                          // 画像の代替テキスト
    'Contact'                                    // タイトル
);

?>

<?php get_template_part("parts/breadcrumb"); ?>
<section id="page-contact" class="page-contact top-page-main-contact">
    <div class="page-contact__inner inner">
        <div class="page-contact__outer">
            <div class="page-contact__form form">
                <?php
                // ショートコードを使用してフォームを表示
                echo do_shortcode('[contact-form-7 id="f2e0fe8" title="お問い合わせ"]');
                ?>
            </div>
        </div>
    </div>
    </div>
</section>
</main>
<button id="topButton" class="top-button">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
        class="top-button__icon" />
</button>
<?php get_footer(); ?>