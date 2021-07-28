<?php
session_start();
$ID = $_POST['ID'];
$PW = $_POST['PASSWORD'];

$connect = mysqli_connect("localhost", "root", "1234", "cultureland");
$check_s = "SELECT * FROM student WHERE stu_id = '$ID'";
$result_s = $connect->query($check_s);
$check_i = "SELECT * FROM instructor WHERE inst_id = '$ID'";
$result_i = $connect->query($check_i);
$check_a = "SELECT * FROM admin WHERE admin_id = '$ID'";
$result_a = $connect->query($check_a);


if($result_s->num_rows==1){
  $row = $result_s->fetch_array(MYSQLI_ASSOC);
  if($row['stu_pw']==$PW){
    $_SESSION['ID'] = $ID;
    if(isset($_SESSION['ID'])){
      header('Location: ./index.php');
    }
    else{
      echo "<script>alert('세션 저장에 실패했습니다. 다시 시도해주세요.'); </script>";
      echo "<a href= login.php> back page </a>";
    }
  }
  else{
    echo "<script>alert('패스워드가 틀렸습니다.'); </script>";
    echo "<a href= login.php> back page </a>";
  }

}

elseif($result_i->num_rows==1){
  $row = $result_i->fetch_array(MYSQLI_ASSOC);
  if($row['inst_pw']==$PW){
    $_SESSION['ID'] = $ID;
    if(isset($_SESSION['ID'])){
      header('Location: ./index.php');
    }
    else{
      echo "<script>alert('세션 저장에 실패했습니다. 다시 시도해주세요.'); </script>";
      echo "<a href= login.php> back page </a>";
    }
  }
  else{
    echo "<script>alert('패스워드가 틀렸습니다.'); </script>";
    echo "<a href= login.php> back page </a>";
  }

}

elseif($result_a->num_rows==1){
  $row = $result_a->fetch_array(MYSQLI_ASSOC);
  if($row['admin_pw']==$PW){
    $_SESSION['ID'] = $ID;
    if(isset($_SESSION['ID'])){
      header('Location: ./admin.php');
    }
    else{
      echo "<script>alert('세션 저장에 실패했습니다. 다시 시도해주세요.'); </script>";
      echo "<a href= login.php> back page </a>";
    }
  }
  else{
    echo "<script>alert('패스워드가 틀렸습니다.'); </script>";
    echo "<a href= login.php> back page </a>";
  }

}


else{
  echo "<script>alert('해당 ID를 찾을 수 없습니다.'); </script>";
  echo "<a href= login.php> back page </a>";
}



$_SESSION['ROW'] = serialize($row);
 ?>
