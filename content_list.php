<?php
 $conn=mysqli_connect("localhost","root","200325","d1");
 session_start();
 if(isset($_SESSION['name'])){
  $login_check=TRUE;
 }
 $sql = "SELECT * FROM d1_list";
 $post=$_GET['idx'];
 settype($post,"int");
 $result = mysqli_query($conn,$sql);
 $list='';
 $article = array(
    'title'=>"WEB INTRODUCE",
    'description'=>"WEB IS WONDERFUL",
    'author'=>"donghan"
);
 $sql = "SELECT * FROM d1_list";
 $result = mysqli_query($conn,$sql);
 $list='';

 while($row=mysqli_fetch_array($result)){

  $list=$list."<li><a href='content_list.php?idx={$row['idx']}'>{$row['title']}</a></li>";
}

 $update_link = '';
 $delete_link = '';
 $comment_table = '';
 if(isset($post)){
    $sql= "SELECT * FROM d1_list WHERE idx={$post}" ;
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $article['title']=$row['title'];
    $article['description']=$row['description'];
    $article['author']=$row['author'];

    if(isset($_SESSION['name'])&&$_SESSION['name'] == $article['author']){
        $update_link = '<a href="update.php?id='.$_GET['idx'].'"style="white-space:nowrap;">update</a>';
         $delete_link = ' <form action = "delete.php" method ="post">
    <input type="hidden" name="idx" value="'.$_GET['idx'].'">
    <input type="submit" value="deleted">
    </form>';

    }
    $c_sql = "select * from d1_comment where post_idx={$post}";
    $result_comment = mysqli_query($conn, $c_sql);
    $c_table ='';
    
    
    while($c_row = mysqli_fetch_array($result_comment)){
    $c_filtered = Array(
        'idx' => mysqli_real_escape_string($conn, $c_row['idx']),
        'comment'=> htmlspecialchars($c_row['comment']),
        'c_author'=> htmlspecialchars($c_row['c_author']),
        'created' => htmlspecialchars($c_row['created']),
        'post_index' => htmlspecialchars($c_row['post_index'])
    );

    $c_table .= "
        <tr>
            <td>{$c_filtered['c_author']}</td>
            <td>{$c_filtered['comment']}</td>
            <td>{$c_filtered['created']}</td>
        </tr>
    ";
    if($_SESSION['name'] == $c_filtered['c_author']){
       $c_table .= "
    <tr>
        <td><a href='c_update.php?idx={$c_filtered['idx']}'>update</a></td>
        <td>
        ".
        '
        <form action="comment_delete.php" method="post">
        <input type="hidden" name="comment_idx" value="'.$c_filtered['idx'].'">
        <input type="submit" value="delete">
        </form>'
        ."
        </td>
    </tr>
    ";
    }

    }


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
    <h1><a href="content.php">D1-PROJECT</a></h1>
    <h2><?=$_SESSION['name']?>님 사용자들의 글을 읽어봅시다</h2>
    <ul>
    <?=$list;?>
    </ul>
    <h2>글내용</h2>
    <ul> 제목  <?=$article['title'];?></ul>
    <ul> 작성자  <?=$article['author']?></ul>
    <ul> 내용   <?=$article['description'];?></ul>
    <?=$update_link.$delete_link;?>
    <h2>코멘트</h2>
    <form action='process_c.php' method='post'>
    <textarea name='comment' placeholder="comment" ></textarea>
    <input type='hidden' name='post_idx' value='<?=$_GET['idx']?>'>
    <input type='submit' value='제출'>
    </form>
    <table><?= $c_table; ?></table>
    <?php if(!($login_check)){
    header("Location: index.php");
    }?>
</body>
</html>

