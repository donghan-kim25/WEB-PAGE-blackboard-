<?php
session_start();
$conn = mysqli_connect("localhost", "root", "200325", "d1");
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id']),
  'pw'=>mysqli_real_escape_string($conn, $_POST['pw']),
  'name'=>mysqli_real_escape_string($conn, $_POST['name'])
);

  $sql = "SELECT * FROM d1_members";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)){
    if($row['id']==$filtered['id']){
      if($row['pw']==$filtered['pw']){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        header('Location: content.php');

      }
    }
  }
  if($back !=1){
    $back = 0;
?>
    <form action="index.php" method="post">
      <h1>로그인에 실패했습니다. 다시 입력해주세요.</h1>
      <input type="hidden" name="back" value="<?=$back?>">
      <input type="submit" name="submit" value="메인창으로 돌아가기">
    </form>
<?php
  }
?>
