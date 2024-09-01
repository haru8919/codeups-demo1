<?php
/*
Template Name: Page Price
*/
get_header(); ?>
<!-- common-mv -->
<?php get_template_part('parts/mv');

get_common_mv(
    '/assets/images/common/price-mv_pc.jpg',   // PC用画像のパス
    '/assets/images/common/price-mv_sp.jpg',   // スマホ用画像のパス
    'ダイバーが海中で詰まっている様子',        // 画像の代替テキスト
    'Price'                                    // タイトル
);

?>

<?php get_template_part("parts/breadcrumb"); ?>
<section class="page-price top-page-price">
    <div class="page-price__inner inner">
        <div class="page-price__wrap">

            <?php
            // SCFのグループフィールドデータを取得
            $price_groups = SCF::get('price-genre');

            // 価格グループデータが存在する場合
            if ($price_groups) :
                foreach ($price_groups as $price_group) :
                    $category = esc_html($price_group['category']); // カテゴリー
                    $product_1 = esc_html($price_group['product_1']); // 商品名1
                    $price_1 = filter_var($price_group['price_1'], FILTER_SANITIZE_NUMBER_INT); // 値段1
                    $product_2 = esc_html($price_group['product_2']); // 商品名2
                    $price_2 = filter_var($price_group['price_2'], FILTER_SANITIZE_NUMBER_INT); // 値段2
                    $product_3 = esc_html($price_group['product_3']); // 商品名3
                    $price_3 = filter_var($price_group['price_3'], FILTER_SANITIZE_NUMBER_INT); // 値段3
                    $product_4 = esc_html($price_group['product_4']); // 商品名4
                    $price_4 = filter_var($price_group['price_4'], FILTER_SANITIZE_NUMBER_INT); // 値段4

                    // 商品と価格の情報が1つでも設定されているかを確認
                    if (!empty($product_1) && !empty($price_1) || !empty($product_2) && !empty($price_2) || !empty($product_3) && !empty($price_3) || !empty($product_4) && !empty($price_4)) :
            ?>

            <div class="page-price__outer">
                <table class="page-price__table">
                    <thead>
                        <div class="page-price__box">
                            <div class="page-price__icons">
                                <!-- アイコン画像を表示 -->
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/price-kujira.svg"
                                    alt="クジラアイコン" class="page-price__icon" />
                            </div>
                            <h3 class="page-price__table-title">
                                <!-- カテゴリー名を表示 -->
                                <span><?php echo $category; ?></span>
                            </h3>
                        </div>
                    </thead>
                    <tbody>
                        <?php if (!empty($product_1) && !empty($price_1)) : ?>
                        <tr class="page-price__course">
                            <th class="page-price__name"><?php echo $product_1; ?></th>
                            <td class="page-price__figure">¥<?php echo number_format($price_1); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if (!empty($product_2) && !empty($price_2)) : ?>
                        <tr class="page-price__course">
                            <th class="page-price__name"><?php echo $product_2; ?></th>
                            <td class="page-price__figure">¥<?php echo number_format($price_2); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if (!empty($product_3) && !empty($price_3)) : ?>
                        <tr class="page-price__course">
                            <th class="page-price__name"><?php echo $product_3; ?></th>
                            <td class="page-price__figure">¥<?php echo number_format($price_3); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if (!empty($product_4) && !empty($price_4)) : ?>
                        <tr class="page-price__course">
                            <th class="page-price__name"><?php echo $product_4; ?></th>
                            <td class="page-price__figure">¥<?php echo number_format($price_4); ?></td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php
                    endif; // 商品と価格が1つでも設定されているかの条件終了
                endforeach; // 各価格グループのループ終了
            endif; // 価格グループデータが存在する場合
            ?>

        </div>
    </div>
</section>

<button id="topButton" class="top-button">
    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-back.svg" alt="Page Top"
        class="top-button__icon" />
</button>
<?php get_footer(); ?>