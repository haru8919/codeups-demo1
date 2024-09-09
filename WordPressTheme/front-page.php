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
?>
<?php get_header(); ?>

<!-- メインビュー -->
<section class="mv">
    <div class="mv__inner">
        <div class="mv__white-background">
            <div class="mv__title-wrap mv__title-wrap--green">
                <h2 class="mv__title">DIVING</h2>
                <p class="mv__title-sub">into the ocean</p>
            </div>
            <div class="slide-in"></div>
        </div>
        <div class="mv__slider swiper js-mv-swiper">
            <div class="swiper-wrapper">
                <?php
                // ACFのデータを取得
                $pc_images = get_field('mv-pc');
                $sp_images = get_field('mv-sp');
                $alt_texts = get_field('mv-alt'); // mv-altグループフィールドの取得

                // サブフィールド名のリスト
                $pc_image_fields = array('mv-pc-img1', 'mv-pc-img2', 'mv-pc-img3', 'mv-pc-img4');
                $sp_image_fields = array('mv-sp-img1', 'mv-sp-img2', 'mv-sp-img3', 'mv-sp-img4');
                $alt_fields = array('mv-alt1', 'mv-alt2', 'mv-alt3', 'mv-alt4'); // altテキスト用フィールド名リスト

                // PC用とSP用の画像フィールドの数に合わせてループを回す
                $count = min(count($pc_image_fields), count($sp_image_fields), count($alt_fields));
                for ($i = 0; $i < $count; $i++) {
                    $pc_image = $pc_images[$pc_image_fields[$i]];
                    $sp_image = $sp_images[$sp_image_fields[$i]];
                    $alt_text = $alt_texts[$alt_fields[$i]]; // altテキストを取得

                    // 画像のURLにスキームを補完する
                    $pc_img_url = esc_url($pc_image);
                    $sp_img_url = esc_url($sp_image);
                    // altテキストのエスケープ
                    $alt_attr = esc_attr($alt_text);

                    // URLが空の場合はスキップ
                    if (empty($pc_img_url) || empty($sp_img_url)) {
                        continue;
                    }
                ?>
                <div class="swiper-slide">
                    <div class="swiper-slide__img">
                        <picture>
                            <!-- PC用画像 -->
                            <source srcset="<?php echo $pc_img_url; ?>" media="(min-width:765px)" />
                            <!-- スマホ用画像 -->
                            <source srcset="<?php echo $sp_img_url; ?>" media="(max-width:764px)" />
                            <!-- alt属性を反映 -->
                            <img src="<?php echo $pc_img_url; ?>" alt="<?php echo $alt_attr; ?>" />
                        </picture>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="mv__title-wrap">
                <h2 class="mv__title">DIVING</h2>
                <p class="mv__title-sub">into&nbsp;the&nbsp;ocean</p>
            </div>
        </div>
    </div>
</section>

<!-- campaign -->
<section id="campaign" class="campaign top-campaign">
    <div class="campaign__inner inner">
        <div class="campaign__title-wrap">
            <div class="section-title">
                <p class="section-title__main">Campaign</p>
                <h2 class="section-title__sub">キャンペーン</h2>
            </div>
        </div>
        <div class="campaign__wrap u-desktop">
            <div class="campaign__next swiper-button-next"></div>
            <div class="campaign__prev swiper-button-prev"></div>
        </div>
        <div class="campaign__cards-wrap">
            <div class="campaign__cards js-campaign-swiper">
                <div class="campaign__cards-wrapper swiper-wrapper">
                    <?php
                    // カスタム投稿タイプ「campaign」から最新の記事を5件取得
                    $campaign_args = array(
                        'post_type' => 'campaign', // カスタム投稿タイプ 'campaign'
                        'posts_per_page' => 5,     // 表示する記事数を5件に設定
                    );
                    $campaign_query = new WP_Query($campaign_args);

                    // 記事が存在する場合に表示
                    if ($campaign_query->have_posts()) :
                        while ($campaign_query->have_posts()) : $campaign_query->the_post(); 
                            // タクソノミー「campaign_category」のタームを取得
                            $terms = get_the_terms(get_the_ID(), 'campaign_category');
                            $term_names = array();
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    $term_names[] = esc_html($term->name); // タームの名前を取得
                                }
                                $category_list = implode(', ', $term_names); // ターム名をカンマ区切りで連結
                            } else {
                                $category_list = 'カテゴリなし'; // タームがない場合のデフォルトメッセージ
                            }
                    ?>
                    <div class="campaign__card campaign-card swiper-slide">
                        <div class="campaign-card__imgs">
                            <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('full', ['class' => 'campaign-card__img', 'alt' => get_the_title()]); ?>
                            <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg"
                                alt="No Image" class="campaign-card__img" />
                            <?php endif; ?>
                        </div>
                        <div class="campaign-card__contents">
                            <div class="campaign-card__box">
                                <div class="campaign-card__tag">
                                    <p class="campaign-card__category"><?php echo $category_list; ?></p>
                                    <!-- タクソノミーのタームを表示 -->
                                </div>
                                <p class="campaign-card__description"><?php the_title(); ?></p>
                            </div>
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
                                        <?php 
                                        // グループフィールド 'discount' から before_discount を取得
                                        $discount_group = get_field('discount');
                                        if ($discount_group && $discount_group['before_discount']): 
                                            echo esc_html($discount_group['before_discount']); 
                                        else: 
                                        ?>
                                        割引情報が取得できません。
                                        <?php endif; ?>
                                    </div>
                                    <div class="campaign-card__price-in">
                                        <?php 
                                        // グループフィールド 'discount' から after_discount を取得
                                        if ($discount_group && $discount_group['after_discount']): 
                                            echo esc_html($discount_group['after_discount']); 
                                        else: 
                                        ?>
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
                        echo '<p>まだキャンペーン情報がありません</p>';
                    endif;

                    // クエリループが終了した後、グローバルな投稿データをリセット
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <div class="campaign__contact">
            <a href="<?php echo get_post_type_archive_link('campaign'); ?>" class="btn">
                <span>View more</span>
            </a>
        </div>
    </div>
</section>
<!-- about us -->
<section id="about" class="about top-about">
    <div class="about__inner inner">
        <div class="about__title-wrap">
            <div class="section-title">
                <p class="section-title__main">About us</p>
                <h2 class="section-title__sub">私たちについて</h2>
            </div>
        </div>
        <div class="about__container">
            <div class="about__visual-wrap">
                <div class="about__imgs-left">
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutUs-left.jpg"
                            media="(max-width:765px)" />
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutUs-left-pc.jpg"
                            alt="沖縄建築の屋根にシーサーが載っている様子" class="about__img-left" />
                    </picture>
                </div>
                <div class="about__imgs-right">
                    <picture>
                        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutUs-right.jpg"
                            media="(max-width:765px)" />
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutUs-right-pc.jpg"
                            alt="黄色い熱帯魚が泳ぐ様子" class="about__img-right" />
                    </picture>
                </div>
            </div>
            <div class="about__content">
                <div class="about__first">
                    <h3 class="about__content-title">
                        Dive into<br />
                        the Ocean
                    </h3>
                </div>
                <div class="about__second">
                    <p class="about__content-text">
                        ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />
                        ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                    </p>
                    <div class="about__content-box">
                        <a href="<?php echo $aboutus; ?>" class="btn"><span>View more</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- information -->
<section id="information" class="information top-information">
    <div class="information__inner inner">
        <div class="information__title-wrap">
            <div class="section-title">
                <p class="section-title__main">Information</p>
                <h2 class="section-title__sub">ダイビング情報</h2>
            </div>
        </div>
        <div class="information__container">
            <div class="information__visual-wrap colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information1.jpg" alt=""
                    class="information__img" />
            </div>
            <div class="information__content">
                <h3 class="information__content-title">ライセンス講習</h3>
                <p class="information__content-text">
                    当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br />
                    正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
                </p>
                <div class="information__btn-wrap">
                    <a href="<?php echo $information; ?>" class="btn">
                        <span>View more</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog -->
<section id="blog" class="blog">
    <div class="blog__inner inner">
        <div class="blog__title-wrap">
            <div class="section-title">
                <p class="section-title__main section-title__main--white">Blog</p>
                <h2 class="section-title__sub section-title__sub--white">ブログ</h2>
            </div>
        </div>
        <div class="blog__cards blog-cards">
            <?php
            // カスタムクエリの設定
            $args = array(
                'post_type' => 'post',  // 投稿タイプ
                'posts_per_page' => 3,  // 表示する投稿数
            );
            // クエリを実行
            $query = new WP_Query($args);
            // 投稿があるかチェック
            if ($query->have_posts()) :
                // 投稿ループ
                while ($query->have_posts()) : $query->the_post(); ?>
            <a class="blog-cards__item blog-card" href="<?php the_permalink(); ?>">
                <div class="blog-card__img-wrap">
                    <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium', ['class' => 'blog-card__img', 'alt' => get_the_title()]); ?>
                    <?php else : ?>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/default-blog-card.jpg"
                        alt="<?php the_title(); ?>" class="blog-card__img" />
                    <?php endif; ?>
                </div>
                <div class="blog-card__body">
                    <time class="blog-card__date"
                        datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('Y.m/d'); ?></time>
                    <p class="blog-card__title"><?php the_title(); ?></p>
                    <p class="blog-card__text">
                        <?php echo wp_trim_words(get_the_excerpt(), 100, '...'); ?>
                    </p>
                </div>
            </a>
            <?php endwhile;
                // クエリリセット
                wp_reset_postdata();
            else : ?>
            <p>記事が見つかりません。</p>
            <?php endif; ?>
        </div>
        <div class="blog__btn-wrap">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn">
                <span>View more</span>
            </a>
        </div>
    </div>
    <div class="blog__visual-wrap u-desktop">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-visual.pc.jpg" alt="綺麗な水面の様子"
            class="blog__visual" />
    </div>
</section>
<!-- voice -->
<section id="voice" class="voice top-voice">
    <div class="voice__inner inner">
        <div class="voice__title-wrap">
            <div class="section-title">
                <p class="section-title__main">Voice</p>
                <h2 class="section-title__sub">お客様の声</h2>
            </div>
        </div>
        <div class="voice__cards voice-cards">
            <?php
            // サブループ用のカスタムクエリ
            $args = array(
                'post_type' => 'voice', // カスタム投稿タイプ 'voice'
                'posts_per_page' => 2, // 表示する投稿数を2に設定
            );
            $voice_query = new WP_Query($args); // 新しい WP_Query オブジェクトを作成

            // サブループの開始
            if ($voice_query->have_posts()) :
                while ($voice_query->have_posts()) : $voice_query->the_post();
                    ?>
            <div class="voice-cards__item voice-card">
                <div class="voice-card__container">
                    <div class="voice-card__imgs colorbox">
                        <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', ['class' => 'voice-card__img', 'alt' => get_the_title()]); ?>
                        <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg"
                            alt="NO image" class="voice-card__img" />
                        <?php endif; ?>
                    </div>
                    <div class="voice-card__content">
                        <div class="voice-card__box">
                            <div class="voice-card__detail">
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
                    <?php echo esc_html(get_field('guests-comment')); ?>
                </p>
            </div>
            <?php
                endwhile;
                wp_reset_postdata(); // グローバルな投稿データをリセット
            else : ?>
            <p>まだお客様の声がありません。</p>
            <?php endif; ?>
        </div>
        <div class="voice__btn-wrap">
            <a href="<?php echo get_post_type_archive_link('voice'); ?>" class="btn">
                <span>View more</span>
            </a>
        </div>
    </div>
</section>

<!-- price -->
<section id="price" class="price top-price">
    <div class="price__inner inner">
        <div class="price__title-wrap">
            <div class="section-title">
                <p class="section-title__main">Price</p>
                <h2 class="section-title__sub">料金一覧</h2>
            </div>
        </div>
        <div class="price__container">
            <div class="price__img-wrap colorbox">
                <picture>
                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-sp.jpg"
                        media="(max-width:765px)" />
                    <img class="price__img" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-pc.jpg"
                        alt="海亀が泳ぐ様子" />
                </picture>
            </div>
            <div class="price__content">
                <?php
                // SCFのグループフィールドデータを取得
                $price_groups = SCF::get('price-genre');

                if ($price_groups) :
                    foreach ($price_groups as $price_group) :
                        $category = esc_html($price_group['category']); // カテゴリー
                        $product_1 = esc_html($price_group['product_1']); // 商品名1
                        $price_1 = filter_var($price_group['price_1'], FILTER_SANITIZE_NUMBER_INT); // 値段1
                        $product_2 = esc_html($price_group['product_2']); // 商品名2
                        $price_2 = filter_var($price_group['price_2'], FILTER_SANITIZE_NUMBER_INT); // 値段2
                        $product_3 = esc_html($price_group['product_3']); // 商品名3
                        $price_3 = filter_var($price_group['price_3'], FILTER_SANITIZE_NUMBER_INT); // 値段3
                        $product_4 = esc_html($price_group['product_4']); // 商品名4
                        $price_4 = filter_var($price_group['price_4'], FILTER_SANITIZE_NUMBER_INT); // 値段4
                ?>

                <div class="price__box">
                    <h3 class="price__lead"><?php echo $category; ?></h3>
                    <div class="price__menu">
                        <?php if (!empty($product_1) && !empty($price_1)) : ?>
                        <p class="price__name"><?php echo $product_1; ?></p>
                        <p class="price__cost">&yen;<?php echo number_format($price_1); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="price__menu">
                        <?php if (!empty($product_2) && !empty($price_2)) : ?>
                        <p class="price__name"><?php echo $product_2; ?></p>
                        <p class="price__cost">&yen;<?php echo number_format($price_2); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="price__menu">
                        <?php if (!empty($product_3) && !empty($price_3)) : ?>
                        <p class="price__name"><?php echo $product_3; ?></p>
                        <p class="price__cost">&yen;<?php echo number_format($price_3); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="price__menu">
                        <?php if (!empty($product_4) && !empty($price_4)) : ?>
                        <p class="price__name"><?php echo $product_4; ?></p>
                        <p class="price__cost">&yen;<?php echo number_format($price_4); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
        <div class="price__btn-wrap">
            <a href="<?php echo $price; ?>" class="btn">
                <span>View more</span>
            </a>
        </div>
    </div>
    <div class="price__visual-left u-desktop">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-pc.left.svg" alt="6匹の魚が泳いでる絵"
            class="price__visual-img" />
    </div>
</section>


<button id="topButton" class="top-button">
    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
        class="top-button__icon" />
</button>
</main>
<!-- <footer> -->
<?php get_footer(); ?>
</body>

</html>