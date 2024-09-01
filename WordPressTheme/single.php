<?php get_header(); ?>

<?php get_template_part('parts/mv');

get_common_mv(
    '/assets/images/common/page-blog_pc.jpg',  // PC用画像のパス
    '/assets/images/common/page-blog_sp.jpg',  // スマホ用画像のパス
    '魚群が泳ぐ様子',                          // 画像の代替テキスト
    'Blog'                                    // タイトル
);

?>
<?php get_template_part("parts/breadcrumb"); ?>
<section id="blog-single" class="blog-single top-blog-single">
    <div class="blog-single__inner inner">
        <div class="blog-single__outer">
            <div class="blog-single__wrap">
                <?php if (have_posts()): ?>
                <?php while (have_posts()) : the_post(); ?>
                <div class="blog-single__body">
                    <div class="blog-single__box">
                        <time class="blog-single__date"
                            datetime="<?php the_time('y.m/d')?>"><?php the_time('y.m/d')?></time>
                        <h2 class="blog-single__title"><?php the_title(); ?></h2>
                        <div class="blog-single__imgs">
                            <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'full', ['class' => 'blog-single__img', 'alt' => get_the_title() ] ); ?>
                            <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg"
                                alt="NOimage" class="blog-single__img" />
                            <?php endif; ?>
                        </div>
                        <div class="blog-single__content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="blog-single__nav page-nav">
                        <nav aria-label="page-nav">
                            <ul class="page-nav__items">
                                <?php if (get_previous_post()) : ?>
                                <li class="page-nav__item-prev">
                                    <a class="page-nav__prev"
                                        href="<?php echo get_permalink(get_previous_post()); ?>"><span></span></a>
                                    <?php endif; ?>
                                </li>
                                <?php if (get_next_post()) : ?>
                                <li class="page-nav__item-next blog-single__nav--single">
                                    <a class="page-nav__next"
                                        href="<?php echo get_permalink(get_next_post()); ?>"><span></span></a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php else: ?>
                <p>まだ記事がありません</p>
                <?php endif; ?>
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
<?php get_footer(); // フッターを取得 ?>