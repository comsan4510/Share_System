<?php
session_start();
$_SESSION['id']=array();
 ?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ファイル共有システム</title>
  </head>
  <body>
    <h1>ログインしてください</h1>
    <form action="Share_System_Top.php" method="post">
      <p>ID:<input type="text" name="id" required style="display:inline-block;"></p>
      <p>PASSWORD:<input type="password" name="pass" required></p>
      <input type="submit" value="ログイン">
    </form>
  </body>
</html>
