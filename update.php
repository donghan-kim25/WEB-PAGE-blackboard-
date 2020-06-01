<?php
 $conn = mysqli_connect("localhost","root","200325","d1");
 session_start();
 if(isset($_SESSION['name'])){
  $login_check=TRUE;
 }
 $num=$_GET['idx'];
 settype=($num,"int");
 $sql = "SELECT * FROM d1_list";
 $result = mysqli_query($conn,$sql);
 $list='';

 while($row=mysqli_fetch_array($result)){

   $list=$list."<li><a href=\"content_list.php?idx={$row['idx']}\">{$row['title']}</a></li>";
}
 $article = array(
    'title'=>"WEB INTRODUCE",
    'description'=>"WEB IS WONDERFUL"
 );
$update_link = '';
if(isset($_GET['idx'])){
    $sql= "SELECT * FROM d1_list WHERE id={$num}" ;
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $article['title']=$row['title'];
    $article['description']=$row['description'];
    $update_link = '<a href="update.php?idx='.$num.'>update</a>';
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
    <h1><a href="content.php">D1_PROJECT</a></h1>
    <ol>
        <?php
        echo $list;
        ?>
    </ol>
    <form action="process_update.php" method="post">
        <input type="hidden" name="idx" value=<?=$_GET['idx']?>>
        <p><input type="text" name="title" value="<?=$article['title'];?>"></p>
        <p><textarea name="description"  cols="30" rows="10" value="<?=$article['description'];?>"></textarea></p>
        <p><input type="submit"></p>
  </form>
    <?php if(!isset($login_check)){
       header("Location: index.php");
    }?>
</body>
</html>
