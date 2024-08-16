<?php get_header(); ?>
<!-- common-mv -->
<section id="#" class="common-mv">
    <div class="common-mv__inner">
        <div class="common-mv__img">
            <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-faq_mv-pc.jpg"
                    media="(min-width:1025px)" />
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-faq_mv-sp.jpg"
                    alt="綺麗な砂浜の様子" />
            </picture>
            <div class="common-mv__box">
                <h1 class="common-mv__title">FAQ</h1>
            </div>
        </div>
    </div>
</section>
<?php get_template_part("parts/breadcrumb"); ?>
<section id="page-faq" class="page-faq top-page-faq">
    <div class="page-faq__inner inner">
        <div class="page-faq__accordion faq-accordion js-faq-accordion">

            <?php
            // SCFの 'faq-genre' のデータを取得
            $faq_genre = SCF::get('faq-genre');

            // もしデータが存在する場合、表示を開始する
            if ($faq_genre):
                // 各質問と回答を $faq 変数に格納してループ処理
                foreach ($faq_genre as $faq): ?>
            <div class="faq-accordion__container">
                <div class="faq-accordion__item js-faq-accordion__item">
                    <!-- アコーディオンのタイトル（質問）を表示 -->
                    <button class="faq-accordion__title js-faq-accordion__title">
                        <p class="faq-accordion__title-text">
                            <?php
                                    // 質問を出力
                                    echo esc_html($faq['question']);
                                    ?>
                        </p>
                    </button>
                    <!-- アコーディオンのコンテンツ（回答）を表示 -->
                    <div class="faq-accordion__content js-faq-accordion__content">
                        <p class="faq-accordion__text">
                            <?php
                                    // 回答をエスケープして出力し、改行を <br> に変換
                                    echo nl2br(esc_html($faq['answer']));
                                    ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach;
            endif; // ここで 'if' ブロック終了 ?>

        </div>
    </div>
</section>
<button id="topButton" class="top-button">
    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
        class="top-button__icon" />
</button>
<?php get_footer(); ?>