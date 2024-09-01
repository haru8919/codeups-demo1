<?php
/**
 * Template Name: Privacy Policy
 */
get_header();
?>
<!-- common-mv -->
<?php get_template_part('parts/mv');

get_common_mv(
    '/assets/images/common/privacy_mv.pc.jpg', // PC用画像のパス
    '/assets/images/common/privacy_mv.sp.jpg', // スマホ用画像のパス
    '珊瑚に集まる熱帯魚の様子',               // 画像の代替テキスト
    'Privacy Policy'                         // タイトル
);

?>

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