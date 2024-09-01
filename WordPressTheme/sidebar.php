<aside class="sidebar">
    <div class="sidebar__inner">
        <!-- 人気記事 -->
        <div class="sidebar__article">
            <div class="sidebar__article-title sidebar-title">
                <div class="sidebar-title__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-blog_icon.png"
                        alt="クジラのアイコン" />
                </div>
                <h3 class="sidebar-title__main">人気記事</h3>
            </div>
            <div class="sidebar__article-cards article-cards">
                <?php
                    // 人気記事を取得するためのクエリパラメータを定義
                    $popular_posts_args = array(
                        'post_type' => 'post',
                        'meta_key' => 'post_views_count', // 閲覧数のメタデータキー
                        'orderby' => 'meta_value_num',    // メタデータを数値順に並び替え
                        'posts_per_page' => 3             // 取得する記事数を3件に設定
                    );
                    // クエリを実行して人気記事を取得
                    $popular_posts_query = new WP_Query($popular_posts_args);
                    // 記事が存在する場合にループを開始
                    if ($popular_posts_query->have_posts()) :
                        while ($popular_posts_query->have_posts()) : $popular_posts_query->the_post();
                    ?>
                <a href="<?php the_permalink(); ?>" class="article-cards__items article-card">
                    <div class="article-card__imgs">
                        <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('full', ['class' => 'article-card__img']); ?>
                        <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg"
                            class="article-card__img" alt="No Image">
                        <?php endif; ?>
                    </div>
                    <div class="article-card__body">
                        <time class="article-card__date"
                            datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                        <p class="article-card__title"><?php the_title(); ?></p>
                    </div>
                </a>
                <?php
                    endwhile;
                else:
                    echo '<p>まだ記事がありません</p>';
                endif;
                // 投稿データをリセット
                wp_reset_postdata();
                ?>
            </div>
        </div> <!-- 口コミ -->
        <div class="sidebar__review top-sidebar-review">
            <div class="sidebar__review-title sidebar-title">
                <div class="sidebar-title__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-blog_icon.png"
                        alt="クジラのアイコン" />
                </div>
                <h3 class="sidebar-title__main">口コミ</h3>
            </div>
            <div class="sidebar__review-area review-area">
                <?php
                    // voice投稿タイプから最新の記事を1件取得
                    $voice_args = array(
                        'post_type' => 'voice', // カスタム投稿タイプ 'voice'
                        'posts_per_page' => 1,  // 表示する記事は1件
                    );
                    $voice_query = new WP_Query($voice_args);
                    // 記事が存在する場合に表示
                    if ($voice_query->have_posts()) :
                        while ($voice_query->have_posts()) : $voice_query->the_post(); 
                ?>
                <div class="review-area__imgs">
                    <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full', ['class' => 'review-area__img']); ?>
                    <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg"
                        alt="No Image" class="review-area__img" />
                    <?php endif; ?>
                </div>
                <div class="review-area__box">
                    <p class="review-area__age">
                        <?php echo get_field('guests-age'); ?>
                        <?php echo get_field('guests-sex'); ?>
                    </p>
                    <h3 class="review-area__title"><?php the_title(); ?></h3>
                </div>
                <div class="review-area__contact">
                    <a href="<?php echo get_post_type_archive_link('voice'); ?>" class="btn">
                        <span>View more</span>
                    </a>
                </div>
                <?php
                    // 投稿がある場合のループ処理
                    endwhile;
                else :
                    // 投稿がない場合に表示するメッセージ
                    echo '<p>まだ記事がありません</p>';
                endif;
                    // クエリループが終了した後、グローバルな投稿データをリセット
                    // 他のループやテンプレートタグが正常に動作するようにします
                    wp_reset_postdata();
                ?>
            </div>
        </div>

        <!-- キャンペーン -->
        <div class="sidebar__campaign top-sidebar-campaign">
            <div class="sidebar__campaign-title sidebar-title">
                <div class="sidebar-title__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-blog_icon.png"
                        alt="クジラのアイコン" />
                </div>
                <h3 class="sidebar-title__main">キャンペーン</h3>
            </div>
            <div class="sidebar__campaign-cards">
                <?php
                // campaign投稿タイプから最新の記事を2件取得
                $campaign_args = array(
                    'post_type' => 'campaign', // カスタム投稿タイプ 'campaign'
                    'posts_per_page' => 2,     // 表示する記事数を2件に設定
                );
                $campaign_query = new WP_Query($campaign_args);

                // 記事が存在する場合に表示
                if ($campaign_query->have_posts()) :
                    while ($campaign_query->have_posts()) : $campaign_query->the_post(); 
                ?>
                <div class="campaign-card">
                    <div class="campaign-card__imgs">
                        <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', ['class' => 'campaign-card__img']); ?>
                        <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg"
                            alt="No Image" class="campaign-card__img" />
                        <?php endif; ?>
                    </div>
                    <div class="campaign-card__contents campaign-card__contents--side">
                        <div class="campaign-card__box campaign-card__box--side">
                            <p class="campaign-card__description"><?php the_title(); ?></p>
                        </div>
                        <div class="campaign-card__container campaign-card__container--side">
                            <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                            <div class="campaign-card__price-wrap">
                                <div class="campaign-card__price-out campaign-card__price-out--side">
                                    <?php if (get_field('discount')): ?>
                                    <?php echo esc_html(get_field('discount')); ?>
                                    <?php else: ?>
                                    割引情報が取得できません。
                                    <?php endif; ?>
                                </div>
                                <div class="campaign-card__price-in campaign-card__price-in--side">
                                    <?php if (get_field('after-discount')): ?>
                                    <?php echo esc_html(get_field('after-discount')); ?>
                                    <?php else: ?>
                                    割引後価格情報が取得できません。
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
        else :
            // 投稿がない場合に表示するメッセージ
            echo '<p>まだ記事がありません</p>';
        endif;

        // クエリループが終了した後、グローバルな投稿データをリセット
        wp_reset_postdata();
        ?>
            </div>
            <div class="sidebar__campaign-contact">
                <a href="<?php echo get_post_type_archive_link('campaign'); ?>" class="btn">
                    <span>View more</span>
                </a>
            </div>
        </div>
        <div class="sidebar__archive top-blog-single-archive">
            <div class="sidebar__campaign-title sidebar-title">
                <div class="sidebar-title__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-blog_icon.png"
                        alt="クジラのアイコン" />
                </div>
                <h3 class="sidebar-title__main">アーカイブ</h3>
            </div>
            <div class="sidebar__archive-accordion accordion js-accordion">
                <div class="accordion__wrapper">
                    <?php
                    // すべての投稿の年を取得するためのクエリ
                    $years = get_posts(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'numberposts' => -1,
                        'fields' => 'ids'
                    ));
                    // 取得した投稿 ID から年を抽出して重複を排除
                    $unique_years = array();
                    foreach ($years as $post_id) {
                        $year = get_the_date('Y', $post_id);
                        $unique_years[$year] = true;
                    }
                    $unique_years = array_keys($unique_years);

                    // 各年ごとにループしてアコーディオンを生成
                    foreach ($unique_years as $year) :
                    // 年ごとにその年の月を取得するためのクエリ
                    $months = get_posts(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'year' => $year,
                        'fields' => 'ids',
                        'numberposts' => -1
                    ));
                    // 取得した投稿 ID から月を抽出して重複を排除
                    $unique_months = array();
                    foreach ($months as $post_id) {
                        $month = get_the_date('m', $post_id);
                        $unique_months[$month] = true;
                    }
                    $unique_months = array_keys($unique_months);
                    ?>
                    <div class="accordion__item js-accordion__item">
                        <div class="accordion__title js-accordion__title">
                            <p class="accordion__title-text"><?php echo esc_html($year); ?></p>
                        </div>
                        <div class="accordion__content js-accordion__content">
                            <?php foreach ($unique_months as $month) : ?>
                            <div class="accordion__container">
                                <a href="<?php echo esc_url(get_month_link($year, $month)); ?>" class="accordion__text">
                                    <?php echo date_i18n('F', mktime(0, 0, 0, $month, 1)); ?>
                                </a>
                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</aside>