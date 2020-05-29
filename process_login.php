<?php
  session_start();
  if( isset( $_SESSION[ 'name' ] ) ) {
    $login_check = TRUE;
  }
  $connect = mysqli_connect("localhost","root","200325","d1");
  $sql = "SELECT * FROM d1_members";
  $result = mysqli_query($connect,$sql);
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>
    <?php
      if ( $login_check ) {
    ?>
      <h1>이미 로그인하셨습니다.</h1>
    <?php
      } else {
      $user_id = $_POST[ 'id' ];
      $user_pw = $_POST[ 'pw' ];
      $user_name = $_POST['name'];
      while($row=mysqli_fetch_array($result)){
         if($user_id==$row['id'] and $user_pw==$row['pw']and $user_name=$row['name'] ){
        $_SESSION['name']=$user_name;
        header('Location: ../content.php');
  }else{
        echo "<script>alert('잘못 입력하셨습니다.')</script>";
        header('Location: ../index.php');
  }

}
      }
    ?>
  </body>
</html>
