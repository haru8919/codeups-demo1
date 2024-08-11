     <?php get_header(); ?>
     <!-- common-mv -->
     <section id="#" class="common-mv">
         <div class="common-mv__inner">
             <div class="common-mv__img">
                 <picture><?php echo get_template_directory_uri(); ?>
                     <source
                         srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/co-campaign-pc.jpg"
                         media="(min-width:1025px)" />
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/co-campaign.jpg"
                         alt="黄色い魚が二匹で泳いでいる様子" />
                 </picture>
                 <div class="common-mv__box">
                     <h1 class="common-mv__title">Campaign</h1>
                 </div>
             </div>
         </div>
     </section>
     <?php get_template_part("parts/breadcrumb"); ?>
     <div class="page-campaign top-page-campaign">
         <div class="page-campaign__inner inner">
             <div class="page-campaign__wrapper">
                 <div class="page-campaign__category-wrap">
                     <div class="category">
                         <ul class="category__items">
                             <li class="category__item active"><a
                                     href="<?php echo get_post_type_archive_link('campaign'); ?>"
                                     class="category__link<?php echo !isset($_GET['term']) ? 'isActive' : ''; ?>">ALL</a>
                             </li>
                             <li class="category__item"><a href="?term=license-course_category"
                                     class="category__link<?php echo (isset($_GET['term']) && $_GET['term'] == 'license-course_category') ? 'isActive' : ''; ?>">ライセンス講習</a>
                             </li>
                             <li class="category__item"><a href="?term=fan-diving_category"
                                     class="category__link<?php echo (isset($_GET['term']) && $_GET['term'] == 'fan-diving_category') ? 'isActive' : ''; ?>">ファンダイビング</a>
                             </li>
                             <li class="category__item"><a href="?term=experience-diving_category"
                                     class="category__link<?php echo (isset($_GET['term']) && $_GET['term'] == 'experience-diving_category') ? 'isActive' : ''; ?>">体験ダイビング</a>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <div class="page-campaign__wrap">
                     <div class="page-campaign__cards campaign-cards">
                         <div class="page-campaign__cards__item campaign-card">
                             <div class="campaign-card__imgs">
                                 <img src="./assets/images/common/campaign-cd1.jpg" alt="色とりどりの魚の群れの様子"
                                     class="campaign-card__img" />
                             </div>
                             <div class="campaign-card__contents campaign-card__contents--big">
                                 <div class="campaign-card__box">
                                     <div class="campaign-card__tag">
                                         <p class="campaign-card__category">ライセンス講習</p>
                                     </div>
                                     <p class="campaign-card__description campaign-card__description--big">ライセンス取得</p>
                                 </div>
                                 <div class="campaign-card__container">
                                     <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                                     <div class="campaign-card__price-wrap">
                                         <div class="campaign-card__price-out">¥56,000</div>
                                         <div class="campaign-card__price-in">¥46,000</div>
                                     </div>
                                 </div>
                                 <div class="page-campaign__pc-wrap u-desktop">
                                     <div class="page-campaign__pc-body">
                                         <p class="page-campaign__pc-text">
                                             ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                                             ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                                         </p>
                                         <div class="page-campaign__pc-box">
                                             <time class="page-campaign__pc-date"
                                                 datetime="2023/6/1-9/30">2023/6/1-9/30</time>
                                             <p class="page-campaign__pc-contact">ご予約・お問い合わせはコチラ</p>
                                         </div>
                                     </div>
                                     <div class="page-campaign__btn-wrap">
                                         <a href="page-contact.html" class="btn">
                                             <span>Contact us</span>
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="page-campaign__cards__item campaign-card">
                             <div class="campaign-card__imgs">
                                 <img src="./assets/images/common/campaign-cd2.jpg" alt="透明な海に浮かぶ船の様子"
                                     class="campaign-card__img" />
                             </div>
                             <div class="campaign-card__contents campaign-card__contents--big">
                                 <div class="campaign-card__box">
                                     <div class="campaign-card__tag">
                                         <p class="campaign-card__category">体験ダイビング</p>
                                     </div>
                                     <p class="campaign-card__description campaign-card__description--big">貸切体験ダイビング</p>
                                 </div>
                                 <div class="campaign-card__container">
                                     <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                                     <div class="campaign-card__price-wrap">
                                         <div class="campaign-card__price-out">¥24,000</div>
                                         <div class="campaign-card__price-in">¥18,000</div>
                                     </div>
                                 </div>
                                 <div class="page-campaign__pc-wrap u-desktop">
                                     <div class="page-campaign__pc-body">
                                         <p class="page-campaign__pc-text">
                                             ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                                             ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                                         </p>
                                         <div class="page-campaign__pc-box">
                                             <time class="page-campaign__pc-date"
                                                 datetime="2023/6/1-9/30">2023/6/1-9/30</time>
                                             <p class="page-campaign__pc-contact">ご予約・お問い合わせはコチラ</p>
                                         </div>
                                     </div>
                                     <div class="page-campaign__btn-wrap">
                                         <a href="page-contact.html" class="btn">
                                             <span>Contact us</span>
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="page-campaign__cards__item campaign-card">
                             <div class="campaign-card__imgs">
                                 <img src="./assets/images/common/campaign-cd3.jpg" alt="深海のクラゲの様子"
                                     class="campaign-card__img" />
                             </div>
                             <div class="campaign-card__contents campaign-card__contents--big">
                                 <div class="campaign-card__box">
                                     <div class="campaign-card__tag">
                                         <p class="campaign-card__category">体験ダイビング</p>
                                     </div>
                                     <p class="campaign-card__description campaign-card__description--big">ナイトダイビング</p>
                                 </div>
                                 <div class="campaign-card__container">
                                     <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                                     <div class="campaign-card__price-wrap">
                                         <div class="campaign-card__price-out">¥10,000</div>
                                         <div class="campaign-card__price-in">¥8,000</div>
                                     </div>
                                 </div>
                                 <div class="page-campaign__pc-wrap u-desktop">
                                     <div class="page-campaign__pc-body">
                                         <p class="page-campaign__pc-text">
                                             ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                                             ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                                         </p>
                                         <div class="page-campaign__pc-box">
                                             <time class="page-campaign__pc-date"
                                                 datetime="2023/6/1-9/30">2023/6/1-9/30</time>
                                             <p class="page-campaign__pc-contact">ご予約・お問い合わせはコチラ</p>
                                         </div>
                                     </div>
                                     <div class="page-campaign__btn-wrap">
                                         <a href="page-contact.html" class="btn">
                                             <span>Contact us</span>
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="page-campaign__cards__item campaign-card">
                             <div class="campaign-card__imgs">
                                 <img src="./assets/images/common/campaign-cd4.jpg" alt="海面に顔お出すダイバーたちの様子"
                                     class="campaign-card__img" />
                             </div>
                             <div class="campaign-card__contents campaign-card__contents--big">
                                 <div class="campaign-card__box">
                                     <div class="campaign-card__tag">
                                         <p class="campaign-card__category">ファンダイビング</p>
                                     </div>
                                     <p class="campaign-card__description campaign-card__description--big">貸切ファンダイビング
                                     </p>
                                 </div>
                                 <div class="campaign-card__container">
                                     <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                                     <div class="campaign-card__price-wrap">
                                         <div class="campaign-card__price-out">¥20,000</div>
                                         <div class="campaign-card__price-in">¥16,000</div>
                                     </div>
                                 </div>
                                 <div class="page-campaign__pc-wrap u-desktop">
                                     <div class="page-campaign__pc-body">
                                         <p class="page-campaign__pc-text">
                                             ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                                             ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                                         </p>
                                         <div class="page-campaign__pc-box">
                                             <time class="page-campaign__pc-date"
                                                 datetime="2023/6/1-9/30">2023/6/1-9/30</time>
                                             <p class="page-campaign__pc-contact">ご予約・お問い合わせはコチラ</p>
                                         </div>
                                     </div>
                                     <div class="page-campaign__btn-wrap">
                                         <a href="page-contact.html" class="btn">
                                             <span>Contact us</span>
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="page-campaign__nav page-nav">
                     <nav aria-label="page-nav">
                         <ul class="page-nav__items">
                             <li class="page-nav__item-prev">
                                 <a class="page-nav__prev" href="#"><span></span></a>
                             </li>
                             <li class="page-nav__item active"><a class="page-nav__link" href="#">1</a></li>
                             <li class="page-nav__item"><a class="page-nav__link" href="#">2</a></li>
                             <li class="page-nav__item"><a class="page-nav__link" href="#">3</a></li>
                             <li class="page-nav__item"><a class="page-nav__link" href="#">4</a></li>
                             <li class="page-nav__item u-desktop"><a class="page-nav__link" href="#">5</a></li>
                             <li class="page-nav__item u-desktop"><a class="page-nav__link" href="#">6</a></li>
                             <li class="page-nav__item-next">
                                 <a class="page-nav__next" href="#"><span></span></a>
                             </li>
                         </ul>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
     <?php get_footer(); ?>