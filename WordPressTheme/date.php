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
                    <!-- 投稿があるかどうかをチェック -->
                    <?php while (have_posts()) : the_post(); ?>
                    <!-- 各投稿をループ処理 -->
                    <a href="<?php the_permalink(); ?>" class="blog-cards__item blog-card">
                        <!-- 各ブログカードのリンク -->
                        <div class="blog-card__img-wrap">
                            <!-- 投稿にサムネイル画像があるかをチェック -->
                            <?php if (has_post_thumbnail()) : ?>
                            <!-- サムネイル画像があれば、それを表示 -->
                            <?php the_post_thumbnail('full', ['class' => 'blog-card__img', 'alt' => get_the_title()]); ?>
                            <?php else : ?>
                            <!-- サムネイル画像がない場合は、代わりにデフォルトの画像を表示 -->
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.jpg"
                                alt="NOimage" class="blog-card__img" />
                            <?php endif; ?>
                        </div>
                        <div class="blog-card__body">
                            <!-- ブログカードの内容 -->
                            <time class="blog-card__date" datetime="<?php the_time('Y.m/d'); ?>">
                                <?php the_time('Y.m/d'); ?>
                            </time>
                            <!-- 投稿の日付を表示 -->
                            <p class="blog-card__title"><?php the_title(); ?></p>
                            <!-- 投稿のタイトルを表示 -->
                            <p class="blog-card__text"><?php the_excerpt(); ?></p>
                            <!-- 投稿の抜粋（概要）を表示 -->
                        </div>
                    </a>
                    <?php endwhile; ?>
                    <!-- 投稿がある場合のループ処理終了 -->
                    <?php else: ?>
                    <!-- 投稿がない場合のメッセージ -->
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