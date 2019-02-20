<?php
 
error_reporting(E_ALL); //全てのエラーを報告する
ini_set('display_errors', 'On'); //画面にエラーを表示させるか
 
// 1.ファイルが送信されていた場合
if (!empty($_FILES)) {
 
// A.フォームから送られたファイルを受信
  $file = $_FILES['image'];
 
// B.メッセージ表示用と画像表示用の変数を用意
  $msg = '';
  $img_path = '';
 
// C.画像アップロードプログラム（外部のphpファイル）を読み込む
  include('upload.php');
 
}
 
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>画像アップローダー</title>
  </head>
  <body>

    <header>
      <div  class="site-width">
        <h1><a href="../index.html">Image Uploader</a></h1>
        <nav id="top-nav">
          <ul>
            <li><a href="../../にゃんこ®︎もっちのお部屋/index.html">にゃんこ®︎もっちのお部屋</a></li>
            <li><a href="../index.html">TOP</a></li>
            <!-- <li><a href="signup.php">SIGN UP</a></li>  -->
          </ul>
        </nav>
      </div>
    </header>

    <p id="img-msg"><?php if (!empty($msg)) echo $msg; ?></p>
    <div id='login-form'>
 
        <h1>画像アップロード</h1> 
        <form method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="アップロード">
        </form>
    
    <?php if (!empty($img_path)) { ?>
        <div class="img_area">
            <p>アップロードした画像</p>
            <img src="<?php echo $img_path; ?>">
        </div>
    <?php } ?>
    </div>

    <footer id="fotter2">
      Copyright <a href="../index.html">画像アップローダー</a>. All Rights Reserved.
    </footer>

  </body>
</html>