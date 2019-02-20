
$(function() {

  // メッセージの宣言
  const MSG_COMMENT_YEAR ='良いぞ。。。';
  const MSG_COMMENT_YATTA ='その調子だ。';
  const MSG_COMMENT_MATTE ='もうそろそろいいんじゃぁないか？'
  const MSG_COMMENT_MAX ='100文字以内って言ったよなぁぁぁぁぁ？？？？？？';
  // テキストエリアにて、文字を入力をするごとにカウントを増やしていく処理を実施
  $('#count-text').keyup(function() {
    // 入力値の文字列長を取得
    var count = $(this).val().length;
    // 文字列長を画面に出力
    $('.show-count-text').text(count);

    // 親要素のDOMを取得
    var form_g = $(this).closest('.form-group');

    // 文字数チェック
    if (count > 100) {
      form_g.removeClass('has-success').addClass('has-error');
      form_g.find('.help-block').text(MSG_COMMENT_MAX);
    } else if(count > 80 && count <= 100) {
      form_g.removeClass('has-error').addClass('has-success');
      form_g.find('.help-block').text(MSG_COMMENT_MATTE);
    } else if(count > 60 && count <= 80) {
      form_g.removeClass('has-error').addClass('has-success');
      form_g.find('.help-block').text(MSG_COMMENT_YATTA);
    } else {
      form_g.removeClass('hass-error').addClass('has-success');
      form_g.find('.help-block').text(MSG_COMMENT_YEAR);
    }
  });
});
