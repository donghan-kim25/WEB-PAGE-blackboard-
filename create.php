<?php
 $conn = mysqli_connect("localhost","root","200325","d1");
 session_start();
 $sql = "SELECT * FROM d1_list";
 $result = mysqli_query($conn,$sql);
 if(isset($_SESSION['name'])){
 $login_check=TRUE;
 }
 $list='';

 while($row=mysqli_fetch_array($result)){

   $list=$list."<li><a href=\"list.php?idx={$row['idx']}\">{$row['title']}</a></li>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><a href="content.php">WEB</a></h1>
    <ol>
        <?php
        echo $list;

        ?>
    </ol>
    <p><a href="create2.php">create</a></p>
    <form action="process_create.php" method="post">
    <br><input type = "text" name="title" placeholder="title"></br>
    <br><textarea name="description" placeholder="description"></textarea></br>
    <br><input type = "submit" value="제출하기"></br>
    </form>
    <?php
        if(!($login_check)){
         echo "<script>alert('로그인을 하셔야 합니다.')</script>";
         header('Location:../index.php');
      }
     ?>


</body>
</html>
