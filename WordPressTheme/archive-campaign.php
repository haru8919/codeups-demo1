    <?php get_header(); ?>
    <!-- common-mv -->
    <?php get_template_part('parts/mv');

    // MVを表示する
    get_common_mv(
        '/assets/images/common/co-campaign-pc.jpg', // PC用画像のパス
        '/assets/images/common/co-campaign.jpg',    // スマホ用画像のパス
        '黄色い魚が二匹で泳いでいる様子',            // 画像の代替テキスト
        'Campaign'                                  // タイトル
    );

?>

    <?php get_template_part("parts/breadcrumb"); ?>
    <div class="page-campaign top-page-campaign">
        <div class="page-campaign__inner inner">
            <div class="page-campaign__wrapper">
                <div class="page-campaign__category-wrap">
                    <div class="category">
                        <ul class="category__items">
                            <!-- ALL リンク -->
                            <li class="category__item <?php if (!is_tax('campaign_category')) echo 'active'; ?>">
                                <a href="<?php echo get_post_type_archive_link('campaign'); ?>"
                                    class="category__link">ALL</a>
                            </li>
                            <?php
                            // タクソノミー 'campaign_category' のタームを取得
                            $terms = get_terms(array(
                                'taxonomy' => 'campaign_category',
                                'hide_empty' => false,
                            ));
                            // タームが存在する場合はリストアイテムとして表示
                            if (!empty($terms) && !is_wp_error($terms)) :
                                foreach ($terms as $term) :
                                    // 現在のタームがアクティブな場合、active クラスを追加
                                    $active_class = (is_tax('campaign_category', $term->slug)) ? 'active' : '';
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
                <div class="page-campaign__wrap">
                    <div class="page-campaign__cards campaign-cards">
                        <?php if (have_posts()): ?>
                        <?php while (have_posts()) : the_post(); ?>
                        <div class="page-campaign__cards__item campaign-card">
                            <div class="campaign-card__imgs">
                                <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', ['class' => 'campaign-card__img', 'alt' => get_the_title() ]); ?>
                                <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg"
                                    alt="NOimage" class="campaign-card__img" />
                                <?php endif; ?>
                            </div>
                            <div class="campaign-card__contents campaign-card__contents--big">
                                <div class="campaign-card__box">
                                    <div class="campaign-card__tag">
                                        <p class="campaign-card__category">
                                            <?php
                                            // 現在の記事に関連付けられたタクソノミータームを取得
                                            $terms = get_the_terms(get_the_ID(), 'campaign_category');
                                            // タームが存在し、エラーでない場合に表示
                                            if (!empty($terms) && !is_wp_error($terms)):
                                                // ターム名を表示
                                                echo esc_html($terms[0]->name);
                                            else:
                                                echo 'カテゴリー情報が取得できません。';
                                            endif;
                                            ?>
                                        </p>
                                    </div>
                                    <p class="campaign-card__description campaign-card__description--big">
                                        <?php the_title();?>
                                    </p>
                                </div>
                                <?php
                                // グループフィールド 'discount' から before_discount と after_discount を取得
                                $discount_group = get_field('discount');

                                if ($discount_group) {
                                    $before_discount = $discount_group['before_discount'];
                                    $after_discount = $discount_group['after_discount'];

                                    // 割引情報と割引後価格が両方設定されている場合のみ表示
                                    if ($before_discount && $after_discount):
                                ?>
                                <div class="campaign-card__container">
                                    <p class="campaign-card__text">
                                        <?php
                                    // ACFの 'plan' フィールドからテキストを取得
                                    $plan_text = get_field('plan');
                                    // フィールドが設定されている場合に表示
                                    if ($plan_text) {
                                        echo esc_html($plan_text);
                                    } else {
                                        // フィールドが設定されていない場合のデフォルトテキスト（必要であれば）
                                        echo 'プランが指定されていません。';
                                    }
                                    ?>
                                    </p>
                                    <div class="campaign-card__price-wrap">
                                        <div class="campaign-card__price-out">
                                            <?php echo esc_html($before_discount); ?>
                                        </div>
                                        <div class="campaign-card__price-in">
                                            <?php echo esc_html($after_discount); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    else:
                                        // 割引情報が取得できない場合のメッセージ
                                        echo '割引情報が取得できません。';
                                    endif;
                                } else {
                                    // 割引情報のグループフィールドが取得できない場合のメッセージ
                                    echo '割引情報が取得できません。';
                                }
                                ?>
                                <div class="page-campaign__pc-wrap u-desktop">
                                    <div class="page-campaign__pc-body">
                                        <p class="page-campaign__pc-text">
                                            <?php if (get_field('category')): ?>
                                            <?php echo esc_html(get_field('detail')); ?>
                                            <?php else: ?>
                                            詳細情報が取得できません。
                                            <?php endif; ?>
                                        </p>
                                        <div class="page-campaign__pc-box">
                                            <p class="page-campaign__pc-date">
                                                <?php
                                                    // グループフィールド 'date' から開始日時と終了日時を取得
                                                    $date_group = get_field('date'); // 'date' グループフィールド全体を取得
                                                    $start_date = $date_group['start_date']; // 'start_date' サブフィールドを取得
                                                    $end_date = $date_group['end_date']; // 'end_date' サブフィールドを取得
                                                    // 日付が存在する場合は表示
                                                    if ($start_date && $end_date):
                                                        // 日付の形式を変更して表示
                                                        $start_date_formatted = date('Y/n/j', strtotime($start_date)); // 開始日を "Y/n/j" フォーマットに変換
                                                        $end_date_formatted = date('n/j', strtotime($end_date)); // 終了日を "n/j" フォーマットに変換
                                                    ?>
                                                <?php echo esc_html($start_date_formatted); ?>-<?php echo esc_html($end_date_formatted); ?>
                                                <?php else: ?>
                                                日付情報が取得できません。
                                                <?php endif; ?>
                                            </p>
                                            <p class="page-campaign__pc-contact">ご予約・お問い合わせはコチラ</p>
                                        </div>
                                    </div>
                                    <div class="page-campaign__btn-wrap">
                                        <a href="<?php echo esc_url(home_url('contact')); ?>" class="btn">
                                            <span>Contact us</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <p>まだ記事がありません</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="page-campaign__nav page-nav">
                    <?php wp_pagenavi(); ?>
                </div>
            </div>
            <button id="topButton" class="top-button">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
                    class="top-button__icon" />
            </button>
        </div>
        <?php get_footer(); ?>