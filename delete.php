<?php
session_start();
$row = unserialize($_SESSION['ROW']);
$conn = mysqli_connect("localhost", "root", "1234", "cultureland");
$stu_code = $row['stu_code'];
$sqld ="
       UPDATE student
       SET stu_WI_Application_Date = date_format(NOW(), '%Y-%m-%d');
       WHERE stu_code = $stu_code;
       ";

if(isset($_POST['delete'])){
  echo $sqld;
  mysqli_query($conn, $sqld);
  echo "<script>alert('회원탈퇴 요청이 완료되었습니다.'); </script>";
  echo "<a href= index.php> 메인 페이지 </a>";
}
 ?>
