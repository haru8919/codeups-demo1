<?php get_header(); ?>
<!-- common-mv -->
<?php get_template_part('parts/mv');

get_common_mv(
    '/assets/images/common/page-faq_mv-pc.jpg',  // PC用画像のパス
    '/assets/images/common/page-faq_mv-sp.jpg',  // スマホ用画像のパス
    '綺麗な砂浜の様子',                          // 画像の代替テキスト
    'FAQ'                                        // タイトル
);

?>

<?php get_template_part("parts/breadcrumb"); ?>
<section id="page-faq" class="page-faq top-page-faq">
    <div class="page-faq__inner inner">
        <div class="page-faq__accordion faq-accordion js-faq-accordion">
            <?php
            // SCFのfaq-genreのデータを取得
            $faq_genre = SCF::get('faq-genre');
            // もしデータが存在する場合表示を開始する
            if ($faq_genre):
            // 質問と回答を$faq変数に格納してループ処理
            foreach ($faq_genre as $faq):
            // questionとanswerが両方存在する場合に表示
            if (!empty($faq['question']) && !empty($faq['answer'])):
            ?>
            <div class="faq-accordion__container">
                <div class="faq-accordion__item js-faq-accordion__item">
                    <!-- アコーディオンのタイトル（質問）を表示 -->
                    <button class="faq-accordion__title js-faq-accordion__title">
                        <p class="faq-accordion__title-text">
                            <?php
                            // 質問
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
            <?php
                    endif; // questionとanswerのチェックを終了
                endforeach; // ループを終了
            endif; // if文を終了
            ?>
        </div>
    </div>
</section>
<button id="topButton" class="top-button">
    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
        class="top-button__icon" />
</button>
<?php get_footer(); ?>