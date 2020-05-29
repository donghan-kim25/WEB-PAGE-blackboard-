<?php
  session_start();
  if(isset($_SESSION['name'])){
        $login_check= TRUE;
}
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>D1</title>
  </head>
  <body>
    <?php
      if ( $login_check ) {
        session_destroy();
        echo '<script>alert("로그아웃 되었습니다.")</script>';
        header('Location: ../index.php');
      } else {
        echo '<script>alert("로그인 상태가 아닙니다.")</script>';
        header('Location: ../index.php');
      }
    ?>
  </body>
</html>

