<?php get_header(); ?>

<?php get_template_part('parts/mv');

get_common_mv(
    '/assets/images/common/page-info.pc.jpg',  // PC用画像のパス
    '/assets/images/common/page-info.sp.jpg',  // スマホ用画像のパス
    '一匹のシーサーが佇む様子',                // 画像の代替テキスト
    'Information'                              // タイトル
);

?>

<?php get_template_part("parts/breadcrumb"); ?>
<section class="page-information top-page-information">
    <div class="page-information__inner inner">
        <div class="page-information__category-wrap">
            <div class="page-information__category">
                <ul class="page-information__category-items">
                    <li class="page-information__category-item">
                        <a href="javascript:void(0);" class="page-information__category-link"
                            data-target="license">ライセンス<br class="u-mobile" />講習</a>
                    </li>
                    <li class="page-information__category-item">
                        <a href="javascript:void(0);" class="page-information__category-link"
                            data-target="fun-diving">ファン<br class="u-mobile" />ダイビング</a>
                    </li>
                    <li class="page-information__category-item">
                        <a href="javascript:void(0);" class="page-information__category-link"
                            data-target="experience-diving">体験<br class="u-mobile" />ダイビング</a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="license" class="page-information__wrpper">
            <div class="page-information__box">
                <h2 class="page-information__title">ライセンス講習</h2>
                <p class="page-information__text">
                    泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
                </p>
            </div>
            <div class="page-information__imgs">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-info_license.jpg"
                    alt="5人のダイバーが泳いでいる様子" class="page-information__img" />
            </div>
        </div>

        <div id="fun-diving" class="page-information__wrpper">
            <div class="page-information__box">
                <h2 class="page-information__title">ファンダイビング</h2>
                <p class="page-information__text">
                    ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
            </div>
            <div class="page-information__imgs">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-info_fundiving.jpg"
                    alt="5人のダイバーが泳いでいる様子" class="page-information__img" />
            </div>
        </div>

        <div id="experience-diving" class="page-information__wrpper">
            <div class="page-information__box">
                <h2 class="page-information__title">体験ダイビング</h2>
                <p class="page-information__text">
                    ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
            </div>
            <div class="page-information__imgs">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-info_fundiving.jpg"
                    alt="5人のダイバーが泳いでいる様子" class="page-information__img" />
            </div>
        </div>
    </div>
</section>
<button id="topButton" class="top-button">
    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
        class="top-button__icon" />
</button>
<?php get_footer(); ?>