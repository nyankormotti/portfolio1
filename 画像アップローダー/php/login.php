<?php
 
error_reporting(E_ALL); //E_STRICTレベル以外のエラーを報告する
ini_set('display_errors','On'); //画面にエラーを表示させるか
 
//post送信されていた場合
if(!empty($_POST)){
 
 
  //変数にユーザー情報を代入
  $email = $_POST['email'];
  $pass = $_POST['pass'];
 
  //DBへの接続準備
  $dsn = 'mysql:dbname=php_sample01;host=localhost;charset=utf8';
  $user = 'root';
  $password = 'root';
  $options = array(
          // SQL実行失敗時に例外をスロー
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          // デフォルトフェッチモードを連想配列形式に設定
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
      );
 
  // PDOオブジェクト生成（DBへ接続）
  $dbh = new PDO($dsn, $user, $password, $options);
 
  //SQL文（クエリー作成）
  $stmt = $dbh->prepare('SELECT * FROM users WHERE email = :email AND pass = :pass');
 
  //プレースホルダに値をセットし、SQL文を実行
  $stmt->execute(array(':email' => $email, ':pass' => $pass));
 
  $result = 0;
 
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
  //結果が０でない場合
  if(!empty($result)){
 
    //SESSION（セッション）を使うにsession_start()を呼び出す
    session_start();
 
    //SESSION['login']に値を代入
    $_SESSION['login'] = true;
 
    //マイページへ遷移
    header("Location:mypage.php"); 
 
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

    <div id='login-form'>
      <h1>LOGIN</h1>
      <form method="post">
 
        <input type="text" name="email" placeholder="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email'];?>">
 
        <input type="password" name="pass" placeholder="パスワード" value="<?php if(!empty($_POST['pass'])) echo $_POST['pass'];?>">
 
        <input type="submit" value="送信">
 
      </form>
    </div>

   

    <footer id="fotter2">
      Copyright <a href="../index.html">画像アップローダー</a>. All Rights Reserved.
    </footer>

  </body>
</html>
