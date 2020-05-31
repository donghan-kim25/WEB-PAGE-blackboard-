<?php
$conn=mysqli_connect("localhost","root","20325","d1");
session_start();
$sql="
INSERT INTO d1_list
    (title , description , crated , author)
    VALUES(
        '{$_POST['title']}',
        '{$_POST['description']}',
        NOW(),
        '{$_SESSION['name']}'
        )
";
$result=mysqli_query($conn,$sql);
if($result===false){
    echo '오류가 생겼습니다.';
    error_log(mysql_error($conn));
}else{
    echo '성공 <a href="content.php">돌아가기</a>';
}

?>
