<?php
session_start();
if($_SESSION['id']!='admin' && $_SESSION['id']!='director' && $_SESSION['id']!='user'){
  switch ($_POST['id']){
    case 'root':
      if ($_POST['pass'] == '4510471') {
        $_SESSION['id'] = 'admin';
      }else{
        $_SESSION = array();
        break;
      }
    break;
    case 'comsan':
    if ($_POST['pass'] == '4510471') {
      $_SESSION['id'] = 'director';
    }else{
      $_SESSION = array();
      break;
    }
    break;
    case 'syoutarou':
    if ($_POST['pass'] == '123') {
      $_SESSION['id'] = 'user';
    }else{
      $_SESSION = array();
      break;
    }
    break;
    default:
      $_SESSION = array();
    break;
  }
}
if ($_SESSION['id']) {
?>
  <!DOCTYPE html>
  <html lang="ja" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>ファイル共有システム</title>
    </head>
    <body>
      <header>
        <h1>ファイル共有システム</h1>
      </header>
      <section>
        <form class="share_form"enctype="multipart/form-data" action="Share_back.php" method="post" style="margin-bottom:4em;">
          <input type="file" name="file_up">
          <input type="submit" value="送信">
        </form>
        <?php
        include 'ConnectDB.php';
         ?>
      </section>
      <footer>
        <form action="index.php" method="post">
          <input type="submit" value="ログアウト">
        </form>
      </footer>
    </body>
  </html>
<?php
}else{
  header("Location:index.php");
}
 ?>
