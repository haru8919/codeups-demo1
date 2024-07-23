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
        }, 300); // スライダー表示の遅延
      }, 2500); // スライドインの遅延
    }, 2500); // 初期の遅延
  });
});

$(function () {
  const campaignSwiper = new Swiper(".js-campaign-swiper", {
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
// $(document).ready(function () {
//   $(".category__item").on("click", function () {
//     // すべてのアイテムからactiveクラスを削除
//     $(".category__item").removeClass("active");
//     // クリックされたアイテムにactiveクラスを追加
//     $(this).addClass("active");
//   });
// });

// page-navigation__itemクリック
// $(function () {
//   // ページ読み込み時の初期設定
//   $(".page-nav__item:nth-of-type(2)").addClass("click");

//   // クリックイベント
//   $(".page-nav__item, .page-nav__item-prev, .page-nav__item-next").click(function () {
//     $(".page-nav__item.click, .page-nav__item-prev.click, .page-nav__item-next.click").removeClass("click"); // すでにクリックされた要素のclickクラスを削除
//     $(this).toggleClass("click"); // クリックされた要素にclickクラスを追加または削除

//     // クリックされた要素が「前へ」の場合
//     if ($(this).hasClass("page-nav__prev")) {
//       $(".page-nav__next-clicked").removeClass("page-nav__next-clicked");
//     }

//     // クリックされた要素が「次へ」の場合
//     if ($(this).hasClass("page-nav__next")) {
//       $(".page-nav__prev-clicked").removeClass("page-nav__prev-clicked");
//     }
//   });

//   // 「前へ」クリック時の処理
//   $(".page-nav__prev").click(function () {
//     $(".page-nav__next-clicked").removeClass("page-nav__next-clicked");
//     $(this).toggleClass("page-nav__prev-clicked");
//   });

//   // 「次へ」クリック時の処理
//   $(".page-nav__next").click(function () {
//     $(".page-nav__prev-clicked").removeClass("page-nav__prev-clicked");
//     $(this).toggleClass("page-nav__next-clicked");
//   });
// });

//画像のモーダル
document.addEventListener("DOMContentLoaded", function () {
  // すべてのギャラリー画像を取得
  const galleryImages = document.querySelectorAll(".gallery-items__img-link");
  // モーダル要素を取得
  const modal = document.querySelector(".gallery__modal");
  const modalImage = document.querySelector(".gallery__modal-img");

  // 画像をクリックしたときのイベントリスナーを追加
  galleryImages.forEach((image) => {
    image.addEventListener("click", function () {
      // クリックされた画像のソースを取得
      const src = this.src;
      // モーダル画像のソースを設定
      modalImage.src = src;
      // モーダルを表示
      modal.style.display = "block";
      // 0.1秒後にフェードイン効果を適用するクラスを追加
      setTimeout(() => {
        modal.classList.add("show");
      }, 10);
      // bodyにクラスを追加してスクロールを無効にする
      document.body.classList.add("modal-open");
    });
  });

  // モーダルを閉じるためのイベントリスナーを追加
  modal.addEventListener("click", function () {
    // フェードアウト効果を適用するためにクラスを削除
    modal.classList.remove("show");
    // トランジション終了後にモーダルを非表示にする
    modal.addEventListener("transitionend", function handleTransitionEnd() {
      modal.style.display = "none";
      // イベントリスナーの削除
      modal.removeEventListener("transitionend", handleTransitionEnd);
    });
    // bodyからクラスを削除してスクロールを有効にする
    document.body.classList.remove("modal-open");
  });
});

// informationクリック記事呼び出し
$(document).ready(function () {
  const $footerLinks = $(".footer-menu__link");
  const $categoryLinks = $(".page-information__category-link");

  // クリックイベントを処理する関数
  function handleClick(event, targetId) {
    event.preventDefault();

    // URLにクエリパラメータを追加してpage-information.htmlに遷移
    window.location.href = `page-information.html?tab=${targetId}`;
  }

  // Footerメニューリンクのクリックイベントを設定
  $footerLinks.each(function () {
    const targetId = $(this).data("target");
    if (targetId) {
      $(this).on("click", function (event) {
        handleClick(event, targetId);
      });
    }
  });

  // カテゴリーリンクのクリックイベントを設定
  $categoryLinks.each(function () {
    const targetId = $(this).data("target");
    if (targetId) {
      $(this).on("click", function (event) {
        handleClick(event, targetId);
      });
    }
  });

  // 最後に表示された記事をURLのクエリパラメータから取得して表示する
  const urlParams = new URLSearchParams(window.location.search);
  const lastActiveId = urlParams.get("tab");

  if (lastActiveId) {
    $(`#${lastActiveId}`).addClass("active");
    $(`.footer-menu__link[data-target='${lastActiveId}']`).addClass("clicked");
    $(`.page-information__category-link[data-target='${lastActiveId}']`).addClass("clicked");
  } else {
    // デフォルトで表示する記事がある場合はここで設定
    $(".page-information__wrpper").first().addClass("active"); // 例えば最初の記事を表示
    $(".footer-menu__link").first().addClass("clicked"); // 最初のフッターリンクに.clickedクラスを追加
    $(".page-information__category-link").first().addClass("clicked"); // 最初のカテゴリーリンクに.clickedクラスを追加
  }
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
  // ページが読み込まれた時にこの関数が実行される
  $(".js-faq-accordion__title").on("click", function () {
    // アコーディオンのタイトルがクリックされた時にこの関数が実行される
    $(this).toggleClass("is-active");
    // クリックされたタイトルに'is-close'クラスを追加または削除する
    $(this).next().slideToggle(300);
    // クリックされたタイトルの次の要素（通常はアコーディオンの内容）を300ミリ秒かけて表示/非表示にする
  });
});

contactのSenddocument.addEventListener("DOMContentLoaded", function () {
  var checkbox = document.getElementById("agree");
  var checkboxTxt = document.querySelector(".form__checkbox-txt");

  checkbox.addEventListener("change", function () {
    if (checkbox.checked) {
      checkboxTxt.classList.add("checked");
    } else {
      checkboxTxt.classList.remove("checked");
    }
  });
});

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
