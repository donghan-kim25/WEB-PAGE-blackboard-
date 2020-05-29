<?php
$connect=mysqli_connect("localhost","root","200325","d1");
$filtered=array(
    "id"=> mysqli_real_escape_string($connect, $_POST["id"]),
    "pw"=> mysqli_real_escape_string($connect, $_POST["pw"]),
    "nickname"=> mysqli_real_escape_string($connect, $_POST["name"])
);
$sql="
INSERT INTO d1_members(id,pw,nickname)
 VALUES('{$filtered['id']}',
 '{$filtered['pw']}',
 '{$filtered['nickname']}')
";
$result=mysqli_query($connect,$sql);
if($result===false){
    echo "잘못입력하셨습니다.";
    echo $result.error($connect);
}else{
    echo "<script>alert('회원가입에 성공했습니다.')</script>
        <a href='111hw.php'>다시 돌아가기</a>";
}
?>
