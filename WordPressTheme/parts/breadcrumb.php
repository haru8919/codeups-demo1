<?php if (function_exists('bcn_display')) { ?>
<div class="breadcrumb top-breadcrumb ">
    <div class="breadcrumb__inner">
        <div class="breadcrumb__box">
            <ul class="breadcrumb__items<?php if (is_404()) echo ' breadcrumb__item--white'; ?>">
                <?php bcn_display(); ?>
            </ul>
        </div>
    </div>
</div>
<?php } ?>