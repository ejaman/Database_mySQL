<?php
session_start();
$row = unserialize($_SESSION['ROW']);
$stu_code = $row['stu_code'];

# 해당 강좌를 등록하시겠습니까?

# 차단 for what? : 같은 row에서 card, cash를 중복선택한 경우.
# 페이지는 데이터입력을 위해 등록 할 때는 한 번만 가능하게 하도록, card, cash 포함해서 하나만 체크가능. -> script alert.
$conn = mysqli_connect('localhost', 'root', '1234', 'cultureland');
$limit = "SELECT COUNT(course_code) AS course_num FROM register WHERE stu_code = '$stu_code';";
$limit_check = $conn -> query($limit);
$limit_row = $limit_check->fetch_array(MYSQLI_ASSOC);
$course_num = $limit_row['course_num'];

$cancel = "SELECT register.stu_code, count(register.course_code) AS cancel_num
           FROM register INNER JOIN cancel ON cancel.register_id = register.register_id
           WHERE register.stu_code = '$stu_code'";
$cancel_check = $conn->query($cancel);
$cancel_row = $cancel_check->fetch_array(MYSQLI_ASSOC);
$cancel_num = $cancel_row['cancel_num'];
$limit_num = $course_num - $cancel_num;
if($limit_num >= 2){
  echo "<script>alert('이미 두 개의 강좌를 등록하셨습니다.'); </script>";
  echo "<a href= register.php> back page </a>";
  exit();
}

elseif(isset($_POST['cash_real'])&&isset($_POST['card_real'])){
  echo "<script>alert('한 번에 두 개의 결제 방식을 선택할 수 없습니다.'); </script>";
  echo "<a href= register.php> back page </a>";
  exit();
}

# 웬만하면, 체크를 하나만 할 수 있도록
# 물론 지금도, input checkbox name을 같게 해서 cash, card에 대해서는 각각 하나만 입력이 되기는 한다. (다중 체크를 한다고 하더라도.)
# cash, card에 대해서도 하나만 입력이 될 수 있도록.


# $cash, $card 모두 course_code를 의미.
# 등록 시 register table에 register_id 우선 insert.
$sql1 = "
  INSERT INTO register(register_id) SELECT(NOW()+0);
  ";
# 현금 결제 시 discount table에 discount_id 우선 insert.
$sql4 = "
  INSERT INTO discount(discount_id)
  SELECT CONCAT_WS('.',(SELECT(NOW()+0)), '01');
  ";
# 추천인이 있을 경우 우선 discount table에 discount_id 입력
$sql7 = "
  INSERT INTO discount(discount_id)
  SELECT CONCAT_WS('.',(SELECT(NOW()+0)), '02');
  ";

if(isset($_POST['cash_real'])){
  $cash = $_POST['cash_real'];
  $conn = mysqli_connect('localhost', 'root', '1234', 'cultureland');
  $check = "SELECT course_fee FROM course WHERE course_code = '$cash';";
  $result = $conn-> query($check);
  $cash_row = $result->fetch_array(MYSQLI_ASSOC);
  $course_fee = $cash_row['course_fee'];

  echo $sql1;
  mysqli_query($conn, $sql1);
  $find_id = "SELECT register_id FROM register ORDER BY register_id DESC LIMIT 1;";
  $result_find = $conn-> query($find_id);
  $register_row = $result_find->fetch_array(MYSQLI_ASSOC);
  $register_id = $register_row['register_id'];

  # cash로 결제 시 register table 정보 입력.
  $sql2 = "
    UPDATE register
    SET register_date = date_format(NOW(), '%Y-%m-%d'),
        course_code = '$cash',
        payment_type = 2,
        admin_code = 'A0001',
        stu_code = '$stu_code',
        payment_amount = '$course_fee'
    WHERE register_id = '$register_id'
    ";

  echo $sql2;
  mysqli_query($conn, $sql2);
  echo $sql4;
  mysqli_query($conn, $sql4);
  $find_discount = "SELECT discount_id FROM discount ORDER BY discount_id DESC LIMIT 1;";
  $result_discount = $conn-> query($find_discount);
  $discount_row = $result_discount->fetch_array(MYSQLI_ASSOC);
  $discount_id = $discount_row['discount_id'];

  # 현금 결제 시 할인되는 정보 입력
  $sql5 = "
    UPDATE discount
    SET register_id = '$register_id',
        admin_code = 'A0001',
        Discount_percentage = 0.05
        WHERE discount_id = '$discount_id';
        ";

  echo $sql5;
  mysqli_query($conn, $sql5);

  if(isset($row['recommend_id'])){
    echo $sql7;
    mysqli_query($conn, $sql7);
    $recommend_id = $register_id . ".02";
    $sql8 = "
      UPDATE discount
      SET register_id = '$register_id',
          admin_code = 'A0001',
          Discount_percentage = 0.01
      WHERE discount_id = '$recommend_id';
      ";

    echo $sql8;
    mysqli_query($conn, $sql8);

    # 추천인이 있고, 현금 결제도 한 경우.
    $sql10 = "
      UPDATE register
      SET payment_amount = payment_amount*0.94
      WHERE register_id = '$register_id';
      ";

    echo $sql10;
    mysqli_query($conn, $sql10);

    echo "<script>alert('해당 강좌를 등록했습니다.'); </script>";

    header('Location: ./register.php');
  }
  else{
    # 현금 결제 시 할인되는 금액을 register table에 적용 (추천인이 없을 때)
    $sql6 = "
      UPDATE register
      SET payment_amount = payment_amount*0.95
      WHERE register_id = '$register_id';
      ";

    echo $sql6;
    mysqli_query($conn, $sql6);
    echo "<script>alert('해당 강좌를 등록했습니다.'); </script>";

    header('Location: ./register.php');
  }

}
elseif(isset($_POST['card_real'])){
  $card = $_POST['card_real'];
  $conn = mysqli_connect('localhost', 'root', '1234', 'cultureland');
  $check = "SELECT course_fee FROM course WHERE course_code = '$card';";
  $result = $conn-> query($check);
  $card_row = $result->fetch_array(MYSQLI_ASSOC);
  $course_fee = $card_row['course_fee'];

  echo $sql1;
  mysqli_query($conn, $sql1);
  $find_id = "SELECT register_id FROM register ORDER BY register_id DESC LIMIT 1;";
  $result_find = $conn-> query($find_id);
  $register_row = $result_find->fetch_array(MYSQLI_ASSOC);
  $register_id = $register_row['register_id'];

  # card로 결제 시 register table 정보 입력.
  $sql3 = "
    UPDATE register
    SET register_date = date_format(NOW(), '%Y-%m-%d'),
        course_code = '$card',
        payment_type = 1,
        admin_code = 'A0002',
        stu_code = '$stu_code',
        payment_amount = '$course_fee'
    WHERE register_id = '$register_id';
    ";

  echo $sql3;
  mysqli_query($conn, $sql3);

  if(isset($row['recommend_id'])){
    echo $sql7;
    mysqli_query($conn, $sql7);
    $recommend_id = $register_id . ".02";

    $sql8 = "
      UPDATE discount
      SET register_id = '$register_id',
          admin_code = 'A0002',
          Discount_percentage = 0.01
      WHERE discount_id = '$recommend_id';
      ";

    echo $sql8;
    mysqli_query($conn, $sql8);

    # 추천인이 있고, 카드 결제를 한 경우.
    $sql9 = "
      UPDATE register
      SET payment_amount = payment_amount*0.99
      WHERE register_id = '$register_id';
      ";

    echo $sql9;
    mysqli_query($conn, $sql9);
    echo "<script>alert('해당 강좌를 등록했습니다.'); </script>";

    header('Location: ./register.php');
  }
  echo "<script>alert('해당 강좌를 등록했습니다.'); </script>";

  header('Location: ./register.php');

}
else{
  echo "<script>alert('아무것도 등록하지 않으셨습니다.'); </script>";
  echo "<a href= register.php> back page </a>";
  exit();
}






 ?>
