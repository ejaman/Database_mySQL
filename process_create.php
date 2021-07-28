<?php
# 회원가입: 페이지의 정보를 DB에 입력까지.

$conn = mysqli_connect('localhost', 'root', '1234', 'cultureland');

# CODE 일치 시 학생 또는 강사 테이블에 데이터 입력.
# CODE 일치 시 학생 정보 변경의 우려가 있다. 하지만 문화센터에서 CODE를 발급하는 것으로
# 가정했기 때문에 문제는 없다. 그리고 이 코드를 정보를 변경할 때도 그대로 활용하면 될 듯.
$sql1 ="
  UPDATE STUDENT
  SET STU_NAME = '{$_POST['USER_NAME']}',
      STU_ADDRESS = '{$_POST['USER_ADDRESS']}',
      STU_PHONE = '{$_POST['USER_PHONE']}',
      STU_EMAIL = '{$_POST['USER_EMAIL']}',
      STU_ID = '{$_POST['ID']}',
      STU_PW = '{$_POST['PW']}',
      recommend_ID = '{$_POST['RECOMMENDER_ID']}'
  WHERE STU_CODE = '{$_POST['USER_CODE']}'
  ";

$sql2 ="
  UPDATE INSTRUCTOR
  SET INST_NAME = '{$_POST['USER_NAME']}',
      INST_ADDRESS = '{$_POST['USER_ADDRESS']}',
      INST_PHONE = '{$_POST['USER_PHONE']}',
      INST_EMAIL = '{$_POST['USER_EMAIL']}'
      INST_ID = '{$_POST['ID']}',
      INST_PW = '{$_POST['PW']}'
  WHERE INST_CODE = '{$_POST['USER_CODE']}'
";

$sql3 ="
  UPDATE STUDENT
  SET STU_NAME = '{$_POST['USER_NAME']}',
      STU_ADDRESS = '{$_POST['USER_ADDRESS']}',
      STU_PHONE = '{$_POST['USER_PHONE']}',
      STU_EMAIL = '{$_POST['USER_EMAIL']}',
      STU_ID = '{$_POST['ID']}',
      STU_PW = '{$_POST['PW']}'
  WHERE STU_CODE = '{$_POST['USER_CODE']}'
  ";

# 팝업을 띄워질 수 있는 부분: STU_CODE, INST_CODE, RECOMMENDER_ID가 안맞을 때.
# 중복된 ID, STU_CODE, INST_CODE일 때. (ADMIN_CODE는 다른 방식으로 생성되니 고려하지 않는다.)
# 빈 칸을 채우지 않았을 시에 팝업창 띄우기 (Email과 RECOMMENDER_ID는 제외)
if($_POST['USER_CODE'] == NULL || $_POST['ID'] == NULL ||
$_POST['PW'] == NULL || $_POST['USER_NAME'] == NULL ||
$_POST['USER_PHONE'] == NULL || $_POST['USER_ADDRESS'] ==  NULL)
{
  echo "<script>alert('빈 칸을 채워 주시기 바랍니다.'); </script>";
  echo "<a href= index.php> back page </a>";
  exit();
}

# 중복된 ID일 경우 팝업창 띄우기.
$check_s ="SELECT * FROM student WHERE stu_id = '{$_POST['ID']}'";
$result_s = $conn-> query($check_s);
$check_i ="SELECT * FROM instructor WHERE inst_id = '{$_POST['ID']}'";
$result_i = $conn-> query($check_i);
if($result_s -> num_rows ==1){
  echo "<script>alert('중복된 ID입니다.'); </script>";
  echo "<a href= index.php> back page </a>";
  exit();
}
elseif($result_i -> num_rows ==1){
  echo "<script>alert('중복된 ID입니다.'); </script>";
  echo "<a href= index.php> back page </a>";
  exit();
}

# CODE가 맞지 않을 시, stu_code이면서 inst_code일 시(오류) 팝업창 띄우기.
$stu = "SELECT * FROM student WHERE stu_code = '{$_POST['USER_CODE']}'";
$inst = "SELECT * FROM instructor WHERE inst_code = '{$_POST['USER_CODE']}'";
$stu_check = $conn -> query($stu);
$inst_check = $conn -> query($inst);
if($stu_check-> num_rows==0 && $inst_check-> num_rows==0){
  echo "<script>alert('유효하지 않은 코드입니다.'); </script>";
  echo "<a href= index.php> back page </a>";
  exit();
}
elseif($stu_check-> num_rows==1 && $inst_check-> num_rows==1){
  echo "<script>alert('오류 코드입니다. 코드를 재발급 받아주시기 바랍니다.'); </script>";
  echo "<a href= index.php> back page </a>";
  exit();
}
# CODE 중복일 경우 팝업창 띄우기
elseif($stu_check-> num_rows==1){
  $stu_row = $stu_check->fetch_array(MYSQLI_ASSOC);
  if(!empty($stu_row['STU_NAME'])){
    echo "<script>alert('중복된 코드입니다.'); </script>";
    echo "<a href= index.php> back page </a>";
    exit();
  }
}
elseif($inst_check-> num_rows==1){
  $inst_row = $inst_check->fetch_array(MYSQLI_ASSOC);
  if(!empty($inst_row['INST_NAME'])){
    echo "<script>alert('중복된 코드입니다.'); </script>";
    echo "<a href= index.php> back page </a>";
    exit();
  }
}

# 추천인을 적지 않았을 떄의 상황 또한 넘어갈 수 있도록 해야 한다.
# 추천인이 실제 있는 계정인지 확인.
$rec = "SELECT * FROM student WHERE stu_id = '{$_POST['RECOMMENDER_ID']}'";
$rec_check = $conn -> query($rec);
# 강사는 추천인 등록을 못하도록 적어주길 바랍니다.
# 버튼으로 수강생, 강사에 따라 다르게 창을 띄우면 똑같은 걸 또 만들어야해서 복잡해집니다...
$rec_null = strlen($_POST['RECOMMENDER_ID']);
switch($rec_null){
  case 0: break;
  default: if(strlen($_POST['RECOMMENDER_ID']) > 0 && $rec_check -> num_rows == 0){
    echo "<script>alert('해당 추천인은 존재하지 않습니다.'); </script>";
    echo "<a href= index.php> back page </a>";
    exit();
    }
  elseif(strlen($_POST['RECOMMENDER_ID']) > 0 && $inst_check -> num_rows==1){
    echo "<script>alert('강사는 추천인 등록이 불가능합니다.'); </script>";
    echo "<a href= index.php> back page </a>";
    exit();
    }
}


if($stu_check-> num_rows==1){
  if($rec_null == 0){
    echo $sql3;
    mysqli_query($conn, $sql3);
  }
  else{
    echo $sql1;
    mysqli_query($conn, $sql1);
  }
}
elseif($inst_check-> num_rows==1){
  echo $sql2;
  mysqli_query($conn, $sql2);
}

echo mysqli_error($conn);


# 회원가입 확인

$after_stu = "SELECT * FROM student WHERE stu_code = '{$_POST['USER_CODE']}'";
$after_inst = "SELECT * FROM instructor WHERE inst_code = '{$_POST['USER_CODE']}'";
$after_stucheck = $conn -> query($after_stu);
$after_instcheck = $conn -> query($after_inst);

# 정보입력됨을 확인함으로써 수강생 회원가입이 됐음을 공지한다.
# STU_NAME, INST_NAME만으로 확인하기 때문에 오류가 있을 수는 있다.
# 회원가입 실패의 경우, DB에 기록이 남아 같은 정보로 회원가입이 불가능할 수 있기 때문에
# 문화센터로 연락하도록 공지한다.

if($after_stucheck-> num_rows==1){
  $after_sturow = $after_stucheck->fetch_array(MYSQLI_ASSOC);
  if(!empty($after_sturow['stu_name'])){
    echo "<script>alert('수강생 회원가입이 완료되었습니다.'); </script>";
    echo "<a href= login.php> 로그인 </a>";
    exit();
  }
  else{
    echo "<script>alert('회원가입 실패입니다. 문화센터로 연락바랍니다.'); </script>";
    echo "<a href= index.php> 메인페이지} </a>";
  }
}
elseif($after_instcheck-> num_rows==1){
  $after_instrow = $after_instcheck->fetch_array(MYSQLI_ASSOC);
  if(!empty($after_instrow['inst_name'])){
    echo "<script>alert('강사 회원가입이 완료되었습니다.'); </script>";
    echo "<a href= login.php> 로그인 </a>";
    exit();
  }
  else{
    echo "<script>alert('회원가입 실패입니다. 문화센터로 연락바랍니다.'); </script>";
    echo "<a href= index.php> 메인페이지} </a>";
  }
}
else{
  echo "<script>alert('회원가입 실패입니다. 문화센터로 연락바랍니다.'); </script>";
  echo "<a href= index.php> 메인페이지} </a>";
}



 ?>
