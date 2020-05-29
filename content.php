<?php
 session_start();
 if(isset($_SESSION['name'])){
        $login_check=TRUE;
}

 $connect = mysqli_connect("localhost","root","200325","d1");
 $sql = "SELECT * FROM d1_list";
 $result = mysqli_query($connect,$sql);
 $list='';

 while($row=mysqli_fetch_array($result)){

   $list=$list."<li><a href=\"content_list.php?id={$row['idx']}\">{$row['title']}</a></li>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D1</title>
</head>
<body>
    <?if($login_check){?>
    <h1><a href="content.php">D1-PROJECT</a></h1>
    <p>환영합니다 이사이트는 소통을 위한 사이트입니다.</p>
    <p><a href="process_logout.php"><input type = "submit" value="로그아웃"></a></p>
    <h2>글 목록</h2>
    <ol>
    <?php
        echo $list;
    ?>
    </ol>
    <p><a href="create1.php">create</a></p>
    <?php } else{
    "<script>alert('로그인 하셔야 됩니다.')</script>"
    header('Location: ../index.php');
    }
    ?>

</body>
</html>
