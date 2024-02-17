//アコーディオンメニュー
jQuery(function ($) {
  $('.js-accordion-title').on('click', function () {
    // クリックでコンテンツを開閉
    $(this).closest('#header').find('.accordion-content').slideToggle(200);
    // 矢印の向きを変更
    $(this).toggleClass('open', 200);
  }).closest('#header').find('.accordion-content').hide();
});
