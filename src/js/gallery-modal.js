(function ($) {
  // 画像のモーダル
  document.addEventListener("DOMContentLoaded", function () {
    // モーダル要素が存在するかチェック
    var modal = document.querySelector(".gallery__modal");
    if (!modal) return; // モーダルが存在しない場合はスクリプトを終了

    var galleryImages = document.querySelectorAll(".gallery-items__img-link");
    var modalImage = document.querySelector(".gallery__modal-img");

    // モーダル画像要素が存在するかチェック
    if (!modalImage) return; // モーダル画像要素が存在しない場合はスクリプトを終了

    galleryImages.forEach(function (image) {
      // 各画像リンクが存在するかチェック
      if (!image) return; // 画像リンクが存在しない場合は次のループへ

      image.addEventListener("click", function () {
        var src = this.src;
        modalImage.src = src;
        modal.style.display = "block";
        setTimeout(function () {
          modal.classList.add("show");
        }, 10);
        document.body.classList.add("modal-open");
      });
    });

    modal.addEventListener("click", function () {
      modal.classList.remove("show");
      modal.addEventListener("transitionend", function handleTransitionEnd() {
        modal.style.display = "none";
        modal.removeEventListener("transitionend", handleTransitionEnd);
      });
      document.body.classList.remove("modal-open");
    });
  });
})(jQuery);
