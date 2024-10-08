<?php get_header(); ?>
<!-- common-mv -->
<?php get_template_part('parts/mv');


get_common_mv(
    '/assets/images/common/voice_mv-pc.jpg', // PC用画像のパス
    '/assets/images/common/voice_mv-sp.jpg', // スマホ用画像のパス
    'ダイバーが海中で詰まっている様子',      // 画像の代替テキスト
    'Voice'                                  // タイトル
);

?>

<?php get_template_part("parts/breadcrumb"); ?>
<section id="page-voice" class="page-voice top-page-voice">
    <div class="page-voice__inner inner">
        <div class="page-voice__wrapper">
            <div class="page-voice__category-wrap">
                <div class="category">
                    <ul class="category__items">
                        <!-- ALL リンク -->
                        <li class="category__item <?php if (!is_tax('voice_category')) echo 'active'; ?>">
                            <a href="<?php echo get_post_type_archive_link('voice'); ?>" class="category__link">ALL</a>
                        </li>
                        <?php
                                    // タクソノミー 'campaign_category' のタームを取得
                                $terms = get_terms(array(
                                    'taxonomy' => 'voice_category',
                                    'hide_empty' => false,
                                ));
                                // タームが存在する場合はリストアイテムとして表示
                                if (!empty($terms) && !is_wp_error($terms)) :
                                    foreach ($terms as $term) :
                                        // 現在のタームがアクティブな場合、active クラスを追加
                                        $active_class = (is_tax('voice_category', $term->slug)) ? 'active' : '';
                                ?>
                        <li class="category__item <?php echo $active_class; ?>">
                            <a href="<?php echo get_term_link($term); ?>" class="category__link">
                                <?php echo esc_html($term->name); ?>
                            </a>
                        </li>
                        <?php
                                endforeach;
                            endif;
                            ?>
                    </ul>
                </div>
            </div>
            <div class="page-voice__contents">
                <div class="page-voice__cards page-voice-cards">
                    <?php if (have_posts()): ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <div class="page-voice-cards__item voice-card">
                        <div class="voice-card__container">
                            <div class="voice-card__imgs colorbox">
                                <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', ['class' => 'voice-card__img', 'alt' => get_the_title() ]); ?>
                                <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg"
                                    alt="NOimage" class="voice-card__img" />
                                <?php endif; ?>
                            </div>
                            <div class="voice-card__content">
                                <div class="voice-card__box">
                                    <div class="voice-card__detail">
                                        <p class="voice-card__item">
                                        <p class="voice-card__item">
                                            <?php
                                                // グループフィールド 'demographic' から guests-age と guests-sex を取得
                                                $demographic_group = get_field('demographic'); // 'demographic' グループフィールド全体を取得
                                                $guests_age = $demographic_group['guests-age']; // 'guests-age' サブフィールドを取得
                                                $guests_sex = $demographic_group['guests-sex']; // 'guests-sex' サブフィールドを取得
                                                // 年齢情報が存在する場合は表示
                                                if ($guests_age):
                                                    echo esc_html($guests_age);
                                                else:
                                                    echo '年齢情報が取得できません。';
                                                endif;
                                                // 性別情報が存在する場合は表示
                                                if ($guests_sex):
                                                    echo ' ' . esc_html($guests_sex);
                                                else:
                                                    echo ' 性別情報が取得できません。';
                                                endif;
                                            ?>
                                        </p>
                                        </p>
                                        <div class="voice-card__category">
                                            <div class="voice-card__category-text">
                                                <?php
                                            // 現在の記事に関連付けられたタクソノミータームを取得
                                            $terms = get_the_terms(get_the_ID(), 'voice_category');
                                            // タームが存在し、エラーでない場合に表示
                                            if (!empty($terms) && !is_wp_error($terms)):
                                                // ターム名を表示
                                                echo esc_html($terms[0]->name);
                                            else:
                                                echo 'カテゴリー情報が取得できません。';
                                            endif;
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="voice-card__lead"><?php the_title(); ?></p>
                                </div>
                            </div>
                        </div>
                        <p class="voice-card__text">
                            <?php if (get_field('guests-comment')): ?>
                            <?php echo esc_html(get_field('guests-comment')); ?>
                            <?php else: ?>
                            詳細情報が取得できません。
                            <?php endif; ?>
                        </p>
                    </div>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <p>まだ記事がありません</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="page-voice__nav page-nav">
            <?php wp_pagenavi(); ?>
        </div>
    </div>
</section>
<button id="topButton" class="top-button">
    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
        class="top-button__icon" />
</button>

<?php get_footer(); ?>