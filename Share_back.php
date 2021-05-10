<?php
$file_name = $_FILES["file_up"]["name"];
$upfile = $_FILES["file_up"]["tmp_name"];
$date = new DateTime();
$host = 'localhost';
$username = 'root';
$passwd = '';
$dbname = 'share_file';

//データベースに接続
$db = mysqli_connect($host, $username, $passwd, $dbname);

$datetime = $date->format('Y-m-d H-i-s');

if ($file_name != "delete.php" && $file_name != "Share_System_Top.php" && $file_name != "Share_back.php" && $file_name!="ConnectDB.php") {

  //アップロードしたファイルが存在するか確認
  if(is_uploaded_file($upfile)&& strlen($file_name)<=40){

    //同じ名前のファイル名が存在した場合、古いファイルに日付を付ける
    if($result = mysqli_query($db, 'SELECT * FROM file_table')){
        foreach ($result as $row){
          if ($row["file_name"]==$file_name) {
            if(mysqli_query($db,'UPDATE file_table SET file_name="'.$file_name.$datetime.'" WHERE file_name="'.$file_name.'"')){
              echo "ok";
              copy($file_name, $file_name.$datetime);
            }
          }
        }
    }
    //アップロードしたファイルの保存
    if (move_uploaded_file($upfile,$file_name) ) {

      if (!$db) {
        die('データベースの接続に失敗しました。');
      }

      //アップロードしたファイル名をデータベースに追加
      if(mysqli_query($db, 'INSERT INTO file_table (file_name) VALUES ("'.$file_name.'")')){
        header('Location: Share_System_Top.php');
      }
      echo "データベースの接続に成功しました！ \n";

      // データベースの接続を閉じる
      mysqli_close($db);

      echo "ファイルをアップロードしました";
    }else {
      echo "ファイルのアップロードに失敗しました";
    }
  }
}else{
  echo "不正なファイルがアップロードされました。";
}


 ?>
