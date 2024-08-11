<?php get_header(); ?>
<main>
    <?php get_template_part("parts/breadcrumb"); ?>
    <section id="error" class="error">
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
</main>
<?php get_footer(); ?>