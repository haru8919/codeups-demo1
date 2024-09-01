<?php get_header(); ?>
<!-- common-mv -->
<section id="#" class="common-mv">
    <div class="common-mv__inner">
        <div class="common-mv__img">
            <picture><?php echo get_template_directory_uri(); ?>
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/co-campaign-pc.jpg"
                    media="(min-width:1025px)" />
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/co-campaign.jpg"
                    alt="黄色い魚が二匹で泳いでいる様子" />
            </picture>
            <div class="common-mv__box">
                <h1 class="common-mv__title">Campaign</h1>
            </div>
        </div>
    </div>
</section>
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
                            <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'full', ['class' => 'campaign-card__img', 'alt' => get_the_title() ] ); ?>
                            <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg"
                                alt="NOimage" class="campaign-card__img" />
                            <?php endif; ?>
                        </div>
                        <div class="campaign-card__contents campaign-card__contents--big">
                            <div class="campaign-card__box">
                                <div class="campaign-card__tag">
                                    <p class="campaign-card__category">
                                        <?php echo esc_html(get_field('category')); ?>
                                    </p>
                                </div>
                                <p class="campaign-card__description campaign-card__description--big">
                                    <?php the_title();?></p>
                            </div>
                            <div class="campaign-card__container">
                                <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                                <div class="campaign-card__price-wrap">
                                    <div class="campaign-card__price-out">
                                        <?php echo esc_html(get_field('discount')); ?>
                                    </div>
                                    <div class="campaign-card__price-in">
                                        <?php echo esc_html(get_field('after-discount')); ?></div>
                                </div>
                            </div>
                            <div class="page-campaign__pc-wrap u-desktop">
                                <div class="page-campaign__pc-body">
                                    <p class="page-campaign__pc-text">
                                        <?php echo esc_html(get_field('detail')); ?></p>
                                    <div class="page-campaign__pc-box">
                                        <p class="page-campaign__pc-date">
                                            <?php echo esc_html(get_field('date')); ?></p>
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
    </div>
</div>
<button id="topButton" class="top-button">
    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
        class="top-button__icon" />
</button>


<?php get_footer(); ?>