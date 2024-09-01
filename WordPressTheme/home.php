<?php get_header(); ?>
<!-- common-mv -->
<?php get_template_part('parts/mv');

get_common_mv(
    '/assets/images/common/page-blog_pc.jpg',  // PC用画像のパス
    '/assets/images/common/page-blog_sp.jpg',  // スマホ用画像のパス
    '魚群が泳ぐ様子',                          // 画像の代替テキスト
    'Blog'                                    // タイトル
);

?>

<?php get_template_part("parts/breadcrumb"); ?>
<section class="page-blog top-page-blog">
    <div class="page-blog__inner inner">
        <div class="page-blog__wrapper">
            <div class="page-blog__main">
                <div class="page-blog__cards blog-cards blog-cards--2col">
                    <?php if (have_posts()): ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="blog-cards__item blog-card">
                        <div class="blog-card__img-wrap">
                            <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'full', ['class' => 'blog-card__img', 'alt' => get_the_title() ] ); ?>
                            <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg"
                                alt="NOimage" class="blog-card__img" />
                            <?php endif; ?>
                        </div>
                        <div class="blog-card__body">
                            <time class="blog-card__date"
                                datetime="<?php the_time('Y.m/d'); ?>"><?php the_time('Y.m/d'); ?></time>
                            <p class="blog-card__title"><?php the_title(); ?></p>
                            <p class="blog-card__text">
                                <?php the_excerpt(); ?>
                            </p>
                        </div>
                    </a>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <p>まだ記事がありません</p>
                    <?php endif; ?>
                </div>
                <div class="page-campaign__nav page-nav">
                    <?php wp_pagenavi(); ?>
                </div>
            </div>
            <div class="page-blog__sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>
<button id="topButton" class="top-button">
    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
        class="top-button__icon" />
</button>
<?php get_footer(); ?>