//画像のモーダル
document.addEventListener("DOMContentLoaded", function () {
  // すべてのギャラリー画像を取得
  var galleryImages = document.querySelectorAll(".gallery-items__img-link");
  // モーダル要素を取得
  var modal = document.querySelector(".gallery__modal");
  var modalImage = document.querySelector(".gallery__modal-img");

  // 画像をクリックしたときのイベントリスナーを追加
  galleryImages.forEach(function (image) {
    image.addEventListener("click", function () {
      // クリックされた画像のソースを取得
      var src = this.src;
      // モーダル画像のソースを設定
      modalImage.src = src;
      // モーダルを表示
      modal.style.display = "block";
      // 0.1秒後にフェードイン効果を適用するクラスを追加
      setTimeout(function () {
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
