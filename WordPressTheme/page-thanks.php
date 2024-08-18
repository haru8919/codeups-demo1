<?php get_header(); ?>
<!-- common-mv -->
<section id="page-thanks" class="common-mv">
    <div class="common-mv__inner">
        <div class="common-mv__img">
            <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-contact_pc.jpg"
                    media="(min-width:1025px)" />
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/page-contact_sp.jpg"
                    alt="綺麗な砂浜の様子" />
            </picture>
            <div class="common-mv__box">
                <h1 class="common-mv__title">Contact</h1>
            </div>
        </div>
    </div>
</section>
<?php get_template_part("parts/breadcrumb"); ?>
<section id="page-thanks" class="page-thanks top-page-thanks">
    <div class="page-thanks__inner inner">
        <div class="page-thanks__outer">
            <div class="page-thanks__title-box">
                <p class="page-thanks__title">お問い合わせ内容を送信完了しました。</p>
            </div>
            <div class="page-thanks__text-box">
                <p class="page-thanks__text">
                    このたびは、お問い合わせ頂き<br class="u-mobile" />
                    誠にありがとうございます。<br class="u-mobile" /><br class="u-desktop" />
                    お送り頂きました内容を確認の上、<br class="u-mobile" />
                    3営業日以内に折り返しご連絡させて頂きます。<br class="u-mobile" /><br class="u-desktop" />
                    また、ご記入頂いたメールアドレスへ、<br class="u-mobile" />
                    自動返信の確認メールをお送りしております。
                </p>
            </div>
        </div>
    </div>
</section>
</main>
<button id="topButton" class="top-button">
    <img src="<?php echo get_template_directory_uri(); ?>
/assets/images/common/top-back.svg" alt="Page Top" class="top-button__icon" />
</button>
<?php get_footer(); ?>