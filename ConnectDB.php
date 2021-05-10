<?php

$host = 'localhost';
$username = 'root';
$passwd = '';
$dbname = 'share_file';

//データベースに接続
$db = mysqli_connect($host, $username, $passwd, $dbname);

if (!$db) {
  die('データベースの接続に失敗しました。');
}

//データベースに名前が載っているファイルを一覧で表示
if($result = mysqli_query($db, 'SELECT * FROM file_table')){
  echo "";
  foreach ($result as $row) {
    if ($_SESSION['id']=='admin'||$_SESSION['id']=='director') {
      echo "<form action='delete.php' method='post'><a href='".$row["file_name"]. "' download>".$row["file_name"]."</a><input type='hidden' name='id' value='".$row["id"]."'><input type='hidden' name='name' value='".$row["file_name"]."'><input type='submit' value='削除' style='margin-left:4em;'></form><br>";
    }else{
      echo "<form action='delete.php' method='post'><a href='".$row["file_name"]. "' download>".$row["file_name"]."</a><input type='hidden' name='id' value='".$row["id"]."'><input type='hidden' name='name' value='".$row["file_name"]."'></form><br>";
    }
  }
}
 ?>
