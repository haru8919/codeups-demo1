<?php get_header(); ?>
<!-- common-mv -->
<section id="page-contact" class="common-mv">
    <div class="common-mv__inner">
        <div class="common-mv__img">
            <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-contact_pc.jpg"
                    media="(min-width:1025px)" />
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-contact_sp.jpg"
                    alt="綺麗な砂浜の様子" />
            </picture>
            <div class="common-mv__box">
                <h1 class="common-mv__title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>
<?php get_template_part("parts/breadcrumb"); ?>
<section id="page-contact" class="page-contact top-page-main-contact">
    <div class="page-contact__inner inner">
        <div class="page-contact__outer">
            <div class="page-contact__form form">
                <?php
                // ショートコードを使用してフォームを表示
                echo do_shortcode('[contact-form-7 id="328996d" title="お問い合わせ"]');
                ?>
            </div>
        </div>
    </div>
    </div>
</section>
</main>
<button id="topButton" class="top-button">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
        class="top-button__icon" />
</button>
<?php get_footer(); ?>