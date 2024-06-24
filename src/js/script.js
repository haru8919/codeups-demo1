jQuery(function ($) {
  $(".js-hamburger, .js-drawer").on("click", function () {
    $(".js-hamburger").toggleClass("is-active");
    $(".js-drawer").toggleClass("is-open");

    // ドロワーメニューが開いている間は本文のスクロールを無効にする
    if ($(".js-drawer").hasClass("is-open")) {
      $("body").css("overflow", "hidden");
    } else {
      $("body").css("overflow", "");
    }
  });
});

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
          const mvSwiper = new Swiper(".js-mv-swiper", {
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
        }, 800); // スライダー表示の遅延
      }, 3000); // スライドインの遅延
    }, 3000); // 初期の遅延
  });
});

$(function () {
  const campaignSwiper = new Swiper(".js-campaign-swiper", {
    loop: true,
    slidesPerView: "auto",
    spaceBetween: 18,
    centeredSlides: false,
    speed: 5000,

    navigation: {
      nextEl: ".campaign__next",
      prevEl: ".campaign__prev",
    },
    autoplay: {
      // 自動再生
      delay: 600, // 1秒後に次のスライド
      disableOnInteraction: false,
    },
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
          color.delay(200).animate({ width: "100%" }, speed, function () {
            image.css("opacity", "1"); // 画像を表示
            color.css({ left: "0", right: "auto" }); // .color 要素の位置を調整
            color.animate({ width: "0" }, speed); // アニメーションを逆にして非表示にする
          });
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

// categoryクリック
// ページ読み込み時の初期設定
$(function () {
  // 一つ目のcategory__itemにclickクラスを追加
  $(".category__item:first-child").addClass("click");
});
$(function () {
  $(".category__item").click(function () {
    $(".category__item.click").removeClass("click"); // すでにクリックされた要素のclickクラスを削除
    $(this).toggleClass("click"); // クリックされた要素にclickクラスを追加または削除
  });
});

// page-navigation__itemクリック
$(function () {
  // ページ読み込み時の初期設定
  $(".page-nav__item:nth-of-type(2)").addClass("click");

  // クリックイベント
  $(".page-nav__item, .page-nav__item-prev, .page-nav__item-next").click(function () {
    $(".page-nav__item.click, .page-nav__item-prev.click, .page-nav__item-next.click").removeClass("click"); // すでにクリックされた要素のclickクラスを削除
    $(this).toggleClass("click"); // クリックされた要素にclickクラスを追加または削除

    // クリックされた要素が「前へ」の場合
    if ($(this).hasClass("page-nav__prev")) {
      $(".page-nav__next-clicked").removeClass("page-nav__next-clicked");
    }

    // クリックされた要素が「次へ」の場合
    if ($(this).hasClass("page-nav__next")) {
      $(".page-nav__prev-clicked").removeClass("page-nav__prev-clicked");
    }
  });

  // 「前へ」クリック時の処理
  $(".page-nav__prev").click(function () {
    $(".page-nav__next-clicked").removeClass("page-nav__next-clicked");
    $(this).toggleClass("page-nav__prev-clicked");
  });

  // 「次へ」クリック時の処理
  $(".page-nav__next").click(function () {
    $(".page-nav__prev-clicked").removeClass("page-nav__prev-clicked");
    $(this).toggleClass("page-nav__next-clicked");
  });
});

//画像のモーダル
$(document).ready(function () {
  $(".gallery__img").click(function () {
    var imgSrc = $(this).find("img").attr("src");
    $(".gallery__modal-content").html('<img src="' + imgSrc + '" alt="Modal Image">');
    $(".gallery__modal").fadeIn();
    $("body").css("overflow", "hidden"); // モーダルが表示されたときにスクロールを無効化
  });

  $(".gallery__modal").click(function (event) {
    if (!$(event.target).closest(".gallery__modal-content").length) {
      $(".gallery__modal").fadeOut();
      $("body").css("overflow", ""); // モーダルが閉じられたときにスクロールを有効化
    }
  });
});

// informationクリック記事呼び出し
$(document).ready(function () {
  const $items = $(".page-information__category-item");
  const $links = $(".page-information__category-link");
  const $wrappers = $(".page-information__wrpper");

  // 最後に表示された記事を localStorage から取得して表示する
  const lastActiveId = localStorage.getItem("activePage");
  if (lastActiveId) {
    $("#" + lastActiveId).addClass("active");
    $("#" + lastActiveId)
      .parent()
      .addClass("clicked"); // クリックされたカテゴリー項目に.clickedクラスを追加
    $("#" + lastActiveId)
      .children(".page-information__category-link")
      .addClass("clicked"); // クリックされたリンクに.clickedクラスを追加
  } else {
    // デフォルトで表示する記事がある場合はここで設定
    $wrappers.first().addClass("active"); // 例えば最初の記事を表示
    $items.first().addClass("clicked"); // 最初のカテゴリー項目に.clickedクラスを追加
    $links.first().addClass("clicked"); // 最初のリンクに.clickedクラスを追加
  }

  $items.on("click", function (event) {
    event.preventDefault(); // デフォルトのクリック動作をキャンセル

    const targetId = $(this).children(".page-information__category-link").data("target"); // クリックされたリンクの data-target 属性値を取得

    $wrappers.removeClass("active"); // すべての wrapper 要素から active クラスを削除
    $("#" + targetId).addClass("active"); // 対応する wrapper 要素に active クラスを追加

    // すべてのカテゴリー項目から.clickedクラスを削除
    $items.removeClass("clicked");
    // クリックされたカテゴリー項目に.clickedクラスを追加
    $(this).addClass("clicked");
    // それに対応するリンクにも.clickedクラスを追加
    $(this).children(".page-information__category-link").addClass("clicked");

    // 選択された記事のIDを localStorage に保存する
    localStorage.setItem("activePage", targetId);
  });

  $links.on("click", function (event) {
    event.preventDefault(); // デフォルトのリンク動作をキャンセル

    const targetId = $(this).data("target"); // クリックされたリンクの data-target 属性値を取得

    $wrappers.removeClass("active"); // すべての wrapper 要素から active クラスを削除
    $("#" + targetId).addClass("active"); // 対応する wrapper 要素に active クラスを追加

    // すべてのリンクから.clickedクラスを削除
    $links.removeClass("clicked");
    // クリックされたリンクに.clickedクラスを追加
    $(this).addClass("clicked");

    // 選択された記事のIDを localStorage に保存する
    localStorage.setItem("activePage", targetId);
  });
});
$(document).ready(function () {
  // 最初の.page-information__category-item要素をクリックする
  $(".page-information__category-item:first-child .page-information__category-link").click();
});

// sidebarアコーディオン
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
  // $(".js-faq-accordion__item:first-child .js-faq-accordion__content").css("display", "block");
  $(".js-faq-accordion__item:first-child .js-faq-accordion__title").addClass("is-open");
  $(".js-faq-accordion__title").on("click", function () {
    $(this).toggleClass("is-open");
    $(this).next().slideToggle(400);
  });
});

// // contactのSend
// // 「同意する」のチェックボックスを取得
// const agreeCheckbox = document.getElementById("agree");
// // 送信ボタンを取得
// const submitBtn = document.getElementById("submit-btn");

// // チェックボックスをクリックした時
// agreeCheckbox.addEventListener("click", () => {
//   // チェックされている場合
//   if (agreeCheckbox.checked === true) {
//     submitBtn.disabled = false; // disabledを外す
//   }
//   // チェックされていない場合
//   else {
//     submitBtn.disabled = true; // disabledを付与
//   }
// });
