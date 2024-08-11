<div class="page-blog__sidebar sidebar">
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
        $popular_args = array(
          'post_type' => 'post',
          'posts_per_page' => 3,
          'meta_key' => 'post_views_count',
          'orderby' => 'meta_value_num',
          'order' => 'DESC',
        );
        $popular_query = new WP_Query($popular_args);
        if ($popular_query->have_posts()) :
          while ($popular_query->have_posts()) : $popular_query->the_post();
        ?>
                <a href="<?php the_permalink(); ?>" class="article-cards__items article-card">
                    <div class="article-card__imgs">
                        <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('class' => 'article-card__img')); ?>
                        <?php endif; ?>
                    </div>
                    <div class="article-card__body">
                        <time class="article-card__date"
                            datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m/d'); ?></time>
                        <p class="article-card__title"><?php the_title(); ?></p>
                    </div>
                </a>
                <?php
          endwhile;
        endif;
        wp_reset_postdata();
        ?>
            </div>
        </div>
        <!-- 口コミ -->
        <div class="sidebar__review top-sidebar-review">
            <div class="sidebar__review-title sidebar-title">
                <div class="sidebar-title__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-blog_icon.png"
                        alt="クジラのアイコン" />
                </div>
                <h3 class="sidebar-title__main">口コミ</h3>
            </div>
            <div class="sidebar__review-area review-area">
                <div class="review-area__imgs">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/review-area.jpg" alt=""
                        class="review-area__img" />
                </div>
                <div class="review-area__box">
                    <p class="review-area__age">30代(カップル)</p>
                    <h3 class="review-area__title">ここにタイトルが入ります。ここにタイトル</h3>
                </div>
                <div class="review-area__contact">
                    <a href="campaign.html" class="btn">
                        <span>View more</span>
                    </a>
                </div>
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
                <div class="campaign-cards__items campaign-card">
                    <div class="campaign-card__imgs">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/campaign-cd1.jpg"
                            alt="色とりどりの魚の群れの様子" class="campaign-card__img" />
                    </div>
                    <div class="campaign-card__contents campaign-card__contents--side">
                        <div class="campaign-card__box campaign-card__box--side">
                            <p class="campaign-card__description">ライセンス取得</p>
                        </div>
                        <div class="campaign-card__container campaign-card__container--side">
                            <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                            <div class="campaign-card__price-wrap">
                                <div class="campaign-card__price-out campaign-card__price-out--side">¥56,000</div>
                                <div class="campaign-card__price-in campaign-card__price-in--side">¥46,000</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="campaign-cards__items campaign-card">
                    <div class="campaign-card__imgs">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/campaign-cd2.jpg"
                            alt="透明な海に浮かぶ船の様子" class="campaign-card__img" />
                    </div>
                    <div class="campaign-card__contents campaign-card__contents--side">
                        <div class="campaign-card__box campaign-card__box--side">
                            <p class="campaign-card__description">貸切体験ダイビング</p>
                        </div>
                        <div class="campaign-card__container campaign-card__container--side">
                            <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                            <div class="campaign-card__price-wrap">
                                <div class="campaign-card__price-out campaign-card__price-out--side">¥24,000</div>
                                <div class="campaign-card__price-in campaign-card__price-in--side">¥18,000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar__campaign-contact">
                <a href="campaign.html" class="btn">
                    <span>View more</span>
                </a>
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
                        <div class="accordion__item js-accordion__item">
                            <div class="accordion__title js-accordion__title">
                                <p class="accordion__title-text">2023</p>
                            </div>
                            <div class="accordion__content js-accordion__content">
                                <div class="accordion__container">
                                    <a href="" class="accordion__text">3月</a>
                                </div>
                                <div class="accordion__container">
                                    <a href="" class="accordion__text">2月</a>
                                </div>
                                <div class="accordion__container">
                                    <a href="" class="accordion__text">1月</a>
                                </div>
                            </div>
                        </div>
                        <div class="accordion__item js-accordion__item">
                            <div class="accordion__title js-accordion__title">
                                <p class="accordion__title-text">2022</p>
                            </div>
                            <div class="accordion__content js-accordion__content">
                                <a href="" class="accordion__text">3月</a>
                            </div>
                            <div class="accordion__content js-accordion__content">
                                <a href="" class="accordion__text">2月</a>
                            </div>
                            <div class="accordion__content js-accordion__content">
                                <a href="" class="accordion__text">1月</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>