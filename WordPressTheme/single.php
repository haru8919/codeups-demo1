<?php get_header(); ?>

<body <?php body_class('single-page'); ?>>

    <section id="#" class="common-mv">
        <div class="common-mv__inner">
            <div class="common-mv__img">
                <picture>
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-blog_pc.jpg"
                        media="(min-width:1025px)" />
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-blog_sp.jpg"
                        alt="魚群が泳ぐ様子" />
                </picture>
                <div class="common-mv__box">
                    <h1 class="common-mv__title">Blog</h1>
                </div>
            </div>
        </div>
    </section>
    <?php get_template_part("parts/breadcrumb"); ?>
    <section id="blog-single" class="blog-single top-blog-single">
        <div class="blog-single__inner inner">
            <div class="blog-single__outer">
                <div class="blog-single__wrap">
                    <div class="blog-single__body">
                        <div class="blog-single__box">
                            <!-- 投稿の日付を表示 -->
                            <time class="blog-single__date"
                                datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('Y.m/d'); ?></time>
                            <!-- 投稿のタイトルを表示 -->
                            <h2 class="blog-single__title"><?php the_title(); ?></h2>
                            <!-- 投稿のサムネイル画像を表示 -->
                            <div class="blog-single__imgs">
                                <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', array('class' => 'blog-single__img')); ?>
                                <?php endif; ?>
                            </div>
                            <!-- 投稿のコンテンツを表示 -->
                            <div class="blog-single__content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="blog-single__nav page-nav">
                            <nav aria-label="page-nav">
                                <ul class="page-nav__items">
                                    <li class="page-nav__prev page-nav__item">
                                        <?php
                                        // 前の記事へのリンク
                                        $prev_link = get_previous_post_link('%link', '&larr;前の記事へ');
                                        if (!empty($prev_link)) {
                                            echo str_replace('<a href=', '<a class="wp-pagenavi previouspostslink" href=', $prev_link);
                                        }
                                        ?>
                                    </li>
                                    <li class="page-nav__next page-nav__item">
                                        <?php
                                       // 次の記事へのリンク
                                        $next_link = get_next_post_link('%link', '次の記事へ&rarr;');
                                        if (!empty($next_link)) {
                                            echo str_replace('<a href=', '<a class="wp-pagenavi nextpostslink" href=', $next_link);
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- サイドバーの取得 -->
                <?php get_sidebar(); // サイドバーを取得 ?>
            </div>
        </div>
    </section>
    <?php get_footer(); // フッターを取得 ?>