"use strict";

// 全てのjQueryコードを即時関数 (IIFE) でラップ
(function ($) {
  jQuery(document).ready(function ($) {
    $(".hamburger").on("click", function () {
      $(this).toggleClass("is-active");
      $(".drawer-menu").toggleClass("is-open");
    });
  });
  // mvSwiper
  // mvSwiper
  $(function () {
    // ページ読み込み時のアニメーション
    setTimeout(function () {
      $(".mv__white-background").addClass("visible");
      setTimeout(function () {
        $(".slide-in").addClass("active"); // 画像を表示する
        setTimeout(function () {
          $(".slide-in").addClass("fade-out"); // スライドインをフェードアウトする
          $(".mv__white-background").addClass("fade-out"); // 白い背景もフェードアウトする
          setTimeout(function () {
            $(".mv__slider").addClass("visible"); // スライダーをフェードインする
            var mvSwiper = new Swiper(".js-mv-swiper", {
              loop: true,
              effect: "fade",
              speed: 10000,
              allowTouchMove: false,
              autoplay: {
                delay: 0,
              },
              fadeEffect: {
                crossFade: true,
              },
            });
          }, 300); // スライダー表示の遅延
        }, 2500); // スライドインの遅延
      }, 2500); // 初期の遅延
    });
  });

  $(function () {
    var campaignSwiper = new Swiper(".js-campaign-swiper", {
      loop: true,
      slidesPerView: "auto",
      spaceBetween: 18,
      centeredSlides: false,
      speed: 300,
      navigation: {
        nextEl: ".campaign__next",
        prevEl: ".campaign__prev",
      },
      // autoplay: {
      //   // 自動再生
      //   delay: 1500,
      //   disableOnInteraction: false,
      // },
      breakpoints: {
        765: {
          spaceBetween: 40,
        },
      },
    });
    campaignSwiper.on("autoplayStop", function () {
      campaignSwiper.navigation.update();
    });
  });

  // imgアニメーション
  $(document).ready(function () {
    var boxes = $(".colorbox"); // colorbox クラスを持つ全ての要素を取得し、それらを boxes 変数に格納する。
    var speed = 700;
    boxes.each(function () {
      //boxes 変数に格納された要素それぞれに対して、指定された関数を実行する。
      var box = $(this);
      var color = $("<div class='color'></div>").appendTo(box); // 各 .colorbox に <div class="color"></div> を追加
      var image = box.find("img");
      var counter = 0;
      image.css("opacity", "0"); // 画像を初めは非表示にする
      color.css("width", "0"); // .color 要素を初期状態で非表示にする

      $(window).on("scroll", function () {
        //ウィンドウのスクロールイベントに対して指定された関数を実行する。
        var windowHeight = $(window).height();
        var scrollTop = $(window).scrollTop();
        var boxOffset = box.offset().top;
        var boxHeight = box.height();

        // スクロール位置が .colorbox 要素の位置付近にあるかをチェック
        if (scrollTop + windowHeight > boxOffset && scrollTop < boxOffset + boxHeight) {
          if (counter == 0) {
            // アニメーションの開始
            color.delay(200).animate(
              {
                width: "100%",
              },
              speed,
              function () {
                image.css("opacity", "1"); // 画像を表示
                color.css({
                  left: "0",
                  right: "auto",
                }); // .color 要素の位置を調整
                color.animate(
                  {
                    width: "0",
                  },
                  speed
                ); // アニメーションを逆にして非表示にする
              }
            );

            counter = 1;
          }
        }
      });
    });
  });

  // トップバックbtn
  document.addEventListener("DOMContentLoaded", function () {
    var topButton = document.getElementById("topButton");
    var footer = document.querySelector("footer");
    window.addEventListener("scroll", function () {
      var scrollY = window.scrollY || window.pageYOffset; // クロスブラウザ対応
      var footerTop = footer.getBoundingClientRect().top + window.scrollY;
      var windowHeight = window.innerHeight;
      if (scrollY > 200 && scrollY + windowHeight < footerTop) {
        // ページが一定量以上スクロールされ、かつフッターが画面内に表示されていない場合
        topButton.classList.add("active"); // ボタンにactiveクラスを追加して表示する
      } else {
        topButton.classList.remove("active"); // そうでなければボタンを非表示にする
      }
    });

    topButton.addEventListener("click", function () {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });
  });

  // informationクリック記事呼び出し
  $(document).ready(function () {
    var $footerLinks = $(".footer-menu__link");
    var $categoryLinks = $(".page-information__category-link");
    function handleClick(event, targetId) {
      event.preventDefault();

      // すべてのリンクから.clickedクラスを削除
      $footerLinks.removeClass("clicked");
      $categoryLinks.removeClass("clicked");

      // すべてのwrpperから.activeクラスを削除
      $(".page-information__wrpper").removeClass("active");

      // クリックされたリンクに.clickedクラスを追加
      $(".footer-menu__link[data-target='" + targetId + "']").addClass("clicked");
      $(".page-information__category-link[data-target='" + targetId + "']").addClass("clicked");

      // 対応するwrpperに.activeクラスを追加
      $("#" + targetId).addClass("active");

      // URLにクエリパラメータを追加してpage-information.phpに遷移
      window.location.href = myScriptData.pageInformationUrl + "?tab=" + targetId;
    }
    $footerLinks.each(function () {
      var targetId = $(this).data("target");
      if (targetId) {
        $(this).on("click", function (event) {
          handleClick(event, targetId);
        });
      }
    });
    $categoryLinks.each(function () {
      var targetId = $(this).data("target");
      if (targetId) {
        $(this).on("click", function (event) {
          handleClick(event, targetId);
        });
      }
    });
    var urlParams = new URLSearchParams(window.location.search);
    var lastActiveId = urlParams.get("tab");
    if (lastActiveId) {
      $("#" + lastActiveId).addClass("active");
      $(".footer-menu__link[data-target='" + lastActiveId + "']").addClass("clicked");
      $(".page-information__category-link[data-target='" + lastActiveId + "']").addClass("clicked");
    } else {
      $(".page-information__wrpper").first().addClass("active");
      $(".footer-menu__link").first().addClass("clicked");
      $(".page-information__category-link").first().addClass("clicked");
    }
  });

  // sidebarアコーディ
  $(function () {
    // 初期状態で全てのコンテンツを非表示にする
    $(".js-accordion__content").hide();

    // アコーディオンタイトルをクリックしたときのイベント
    $(".js-accordion__title").on("click", function () {
      var $accordionItem = $(this).closest(".js-accordion__item");

      // クリックされたタイトルの次のすべてのコンテンツをトグル
      $accordionItem.find(".js-accordion__content").slideToggle(300);

      // アイテム全体のタイトルのis-openクラスをトグル
      $(this).toggleClass("is-open");

      // アコーディオンタイトルテキストのis-openクラスをトグル
      $(this).find(".accordion__title-text").toggleClass("is-open");
    });

    // アコーディオンテキストをクリックしたときのイベント
    $(".js-accordion__content").on("click", ".accordion__text", function () {
      $(this).toggleClass("is-open");
    });
  });
  $(document).ready(function () {
    // 最初の .accordion__title-text 要素をクリックする
    $(".accordion__title-text").first().click();
  });

  // faqアコーディオン
  $(function () {
    // ページが読み込まれた時にこの関数が実行される
    $(".js-faq-accordion__title").on("click", function () {
      // アコーディオンのタイトルがクリックされた時にこの関数が実行される
      $(this).toggleClass("is-active");
      // クリックされたタイトルに'is-close'クラスを追加または削除する
      $(this).next().slideToggle(300);
      // クリックされたタイトルの次の要素（通常はアコーディオンの内容）を300ミリ秒かけて表示/非表示にする
    });
  });
})(jQuery);
