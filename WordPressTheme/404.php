<?php get_header(); ?>
<main>
    <section id="error" class="error">
        <?php get_template_part("parts/breadcrumb"); ?>
        <div class="error__inner inner">
            <div class="error__outer">
                <div class="error__title-wrap">
                    <h3 class="error__title">404</h3>
                </div>
                <div class="error__text-wrap">
                    <div class="error__text">
                        申し訳ありません。<br />
                        お探しのページが見つかりません。
                    </div>
                </div>
                <div class="error__btn-wrap">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--white">
                        <span>Page TOP</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <button id="topButton" class="top-button">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
            class="top-button__icon" />
    </button>
</main>
<?php get_footer(); ?>