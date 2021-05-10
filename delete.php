<?php
session_start();
$f_id =  $_POST['id'];
$f_name = $_POST['name'];
$host = 'localhost';
$username = 'root';
$passwd = '';
$dbname = 'share_file';
if ($_SESSION['id']=='admin' || $_SESSION['id']=='director') {
  //データベースに接続
  $db = mysqli_connect($host, $username, $passwd, $dbname);
  if (!$db) {
    die('データベースの接続に失敗しました。');
  }

  //データとファイルの削除処理
  if(mysqli_query($db, 'DELETE FROM file_table WHERE id='.$f_id.'')){
    unlink($f_name);
    header('Location: Share_System_Top.php');
  }
}else{
  echo "データを削除する権限がありません。";
}
 ?>
