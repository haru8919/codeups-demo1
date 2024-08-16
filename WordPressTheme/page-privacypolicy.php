<?php
/**
 * Template Name: Privacy Policy
 */
get_header();
?>
<!-- common-mv -->
<section id="#" class="common-mv">
    <div class="common-mv__inner">
        <div class="common-mv__img">
            <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/privacy_mv.pc.jpg"
                    media="(min-width:1025px)" />
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/privacy_mv.sp.jpg"
                    alt="珊瑚に集まる熱帯魚の様子" />
            </picture>
            <div class="common-mv__box">
                <h1 class="common-mv__title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>
<?php get_template_part("parts/breadcrumb"); ?>
<?php if(have_posts()): ?>
<?php while(have_posts()):the_post(); ?>
<?php the_content();?>
<?php endwhile;?>
<?php endif;?>
<button id="topButton" class="top-button">
    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
        class="top-button__icon" />
</button>
<?php get_footer(); ?>