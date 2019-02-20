<?php
error_reporting(E_ALL);
ini_set('dispkay_errors','On');

if(!empty($_POST)) {

  // エラーメッセージを定義
  define ('MSG01','入力必須です。');
  define ('MSG02','E-mailの表記でご記入ください。');
  define ('MSG03','パスワードが合っていません。');
  define ('MSG04','半角英数字のみでご記入ください。');
  define ('MSG05','6文字以上でご記入ください。');

  // エラーメッセージ変数を宣言
  $err_msg = array();

  if(empty($_POST['email'])) {
    $err_msg['email'] = MSG01;
  }
  if(empty($_POST['password'])) {
    $err_msg['password'] = MSG01;
  }
  if(empty($_POST['password_retry'])) {
    $err_msg['password_retry'] = MSG01;
  }

  if(empty($err_msg)) {

    // 値を変数に格納
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass_rty = $_POST['password_retry'];

    // E-mail表記であるかをチェック
    if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email)) {
      $err_msg['email'] = MSG02;
    }

    // パスワードチェック
    if($pass !== $pass_rty) {
      $err_msg['password'] = MSG03;
    } else if(!preg_match('/^[a-zA-Z0-9]+$/',$pass)) {
      $err_msg['password'] = MSG04;
    } else if(mb_strlen($pass) < 6) {
      $err_msg['password'] = MSG05;
    }

  }

  if(empty($err_msg)) {
    header('Location:main.php');

  }

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

          </ul>
        </nav>
      </div>
    </header>

    <div class="example">
      <img id="top-banner" src="../img/画像アップローダー.jpeg" alt="">
      <div class="input-form" id="signup">
        <h1>SIGN UP</h1>
        <form method="post">
          <p class="error_msg"><?php if(!empty($err_msg['email'])) echo $err_msg['email']; ?></p>
          <input class="input-style" type="text" placeholder="E-mail" name="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>">
          <p class="error_msg"><?php if(!empty($err_msg['password'])) echo $err_msg['password']; ?></p>
          <input class="input-style" type="text" placeholder="password" name="password" value="<?php if(!empty($_POST['password'])) echo $_POST['password']; ?>">
          <p class="error_msg"><?php if(!empty($err_msg['$pass_rty'])) echo $err_msg['$pass_rty']; ?></p>
          <input class="input-style" type="text" placeholder="password(再入力)" name="password_retry" value="<?php if(!empty($_POST['password_retry'])) echo $_POST['password_retry']; ?>">
          <input id="input-submit" type="submit" name="submit" value="sign up">
        </form>

      </div>
    </div>



    <footer>
      Copyright <a href="../index.html">画像アップローダー</a>. All Rights Reserved.
    </footer>

  </body>
</html>
