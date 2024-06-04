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
  console.log("ページが読み込まれました");

  // ページ読み込み時にタイトルを表示
  $(".mv__title-wrap").css("color", "$green");
  // 2秒後に1枚目の画像をフェードイン
  setTimeout(() => {
    const firstImageSections = document.querySelectorAll(".img-part");
    firstImageSections.forEach((section, index) => {
      setTimeout(() => {
        section.style.bottom = "0";
        section.style.opacity = "1";
      }, index * 300); // 0.3秒の遅延を設定
    });
    console.log("1枚目の画像をフェードイン");

    // フェードインが完了する3秒後にタイトルの色を変更し、Swiperを初期化
    setTimeout(() => {
      const mvTitleWrap = document.querySelector(".mv__title-wrap");
      mvTitleWrap.style.color = "white";
      console.log("タイトルの色を白に変更");

      // Swiperの初期化
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
        on: {
          init: function () {
            // MV部分を非表示にする
            document.querySelector(".mv").style.zIndex = "-1"; // MV部分を背面に移動
            console.log("MV部分を非表示にしました");
          },
        },
      });
      console.log("Swiperが初期化されました");
    }, 2000); // フェードインアニメーションが終わった後にSwiperを初期化
  }, 2000); // ページ読み込み後2秒でフェードイン開始
});

$(function () {
  const campaignSwiper = new Swiper(".js-campaign-swiper", {
    loop: true,
    slidesPerView: "auto",
    spaceBetween: 18,
    centeredSlides: false,
    speed: 8000,

    navigation: {
      nextEl: ".campaign__next",
      prevEl: ".campaign__prev",
    },
    autoplay: {
      delay: 0,
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
$(function () {
  $(".category__item").click(function () {
    $(".category__item.click").removeClass("click"); // すでにクリックされた要素のclickクラスを削除
    $(this).toggleClass("click"); // クリックされた要素にclickクラスを追加または削除
  });
});
// page-navigation__itemクリック
$(function () {
  $(".page-nav__item, .page-nav__item-prev, .page-nav__item-next").click(function () {
    $(".page-nav__item.click, .page-nav__item-prev.click, .page-nav__item-next.click").removeClass("click");
    $(this).toggleClass("click");

    if ($(this).hasClass("page-nav__prev-clicked")) {
      $(".page-nav__next-clicked").removeClass("page-nav__next-clicked");
    }

    if ($(this).hasClass("page-nav__next-clicked")) {
      $(".page-nav__prev-clicked").removeClass("page-nav__prev-clicked");
    }
  });

  $(".page-nav__prev").click(function () {
    $(".page-nav__next-clicked").removeClass("page-nav__next-clicked");
    $(this).toggleClass("page-nav__prev-clicked");
  });

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
  const $links = $(".page-information__category-link");
  const $wrappers = $(".page-information__wrpper");

  // 最後に表示された記事を localStorage から取得して表示する
  const lastActiveId = localStorage.getItem("activePage");
  if (lastActiveId) {
    $("#" + lastActiveId).addClass("active");
  } else {
    // デフォルトで表示する記事がある場合はここで設定
    $wrappers.first().addClass("active"); // 例えば最初の記事を表示
  }

  $links.on("click", function (event) {
    event.preventDefault(); // デフォルトのリンク動作をキャンセル
    const targetId = $(this).data("target"); // クリックされたリンクの data-target 属性値を取得

    $wrappers.removeClass("active"); // すべての wrapper 要素から active クラスを削除
    $("#" + targetId).addClass("active"); // 対応する wrapper 要素に active クラスを追加

    // 選択された記事のIDを localStorage に保存する
    localStorage.setItem("activePage", targetId);
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const links = document.querySelectorAll(".page-information__category-link");

  links.forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault(); // デフォルトのクリック動作をキャンセル

      // すべてのリンクからクリックされたリンク以外のクラスを削除
      links.forEach((otherLink) => {
        if (otherLink !== link) {
          otherLink.classList.remove("clicked");
        }
      });

      // クリックされたリンクにクラスを追加
      link.classList.add("clicked");
    });
  });
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
