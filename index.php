<!DOCTYPE html>
<?php
  session_start();
  if( isset( $_SESSION[ 'name' ] ) ) {
    $login_check = TRUE;
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D1</title>
</head>
<body>
    <h1>Project-D1</h1>
    <h2>로그인을 해야합니다</h2>
    <P>이 사이트는 소통을 위해 만들었습니다</P>
    <?php if($login_check){ ?>
    <h2>환영합니다</h2>
    <?php } else{?>
     <form action="process_login.php" method="post">
        <p>아이디 : <input type="text" name="id" placeholder="아이디"></p>
        <p>비밀번호 : <input type="password" name="pw" placeholder="비밀번호"></p>
        <p>닉네임 : <input type="text" name="name" placeholder="닉네임"></p>
        <p><input type="submit" value="로그인하기"></p>
    </form>
    <p><a href="sign_up.php">회원가입</a></p>
    <?php }?>
</body>
</html>

