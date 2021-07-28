<?php
session_start();
$row = unserialize($_SESSION['ROW']);
$stu_code = $row['stu_code'];
$cancel = "SELECT register.stu_code, count(register.course_code) AS cancel_num
           FROM register INNER JOIN cancel ON cancel.register_id = register.register_id
           WHERE register.stu_code = '$stu_code'";
$conn = mysqli_connect('localhost', 'root', '1234', 'cultureland');
$cancel_check = $conn->query($cancel);
$cancel_row = $cancel_check->fetch_array(MYSQLI_ASSOC);
$cancel_num = $cancel_row['cancel_num'];

if($cancel_num >= 2){
  echo "<script>alert('이미 두 개의 강좌를 취소하셨습니다.'); </script>";
  echo "<a href= register.php> back page </a>";
  exit();
}

$refund = $_POST['refund'];
$refund_sql = "SELECT register_id, payment_amount, payment_type FROM register WHERE stu_code = '$stu_code' AND course_code = '$refund';";
$refund_check = $conn->query($refund_sql);
$refund_row = $refund_check->fetch_array(MYSQLI_ASSOC);

$register_id = $refund_row['register_id'];
$cancel_paid_amount = $refund_row['payment_amount'];
$cancel_type = $refund_row['payment_type'];

$sqlr1 ="
  INSERT INTO cancel(register_id, cancel_paid_amount, cancel_type) VALUES('$register_id', '$cancel_paid_amount', '$cancel_type');
";
$sqlr2 ="
  UPDATE cancel SET cancel_date = date_format(NOW(), '%Y-%m-%d') WHERE register_id = '$register_id';
";

echo $sqlr1;
mysqli_query($conn, $sqlr1);

echo $sqlr2;
mysqli_query($conn, $sqlr2);

header('Location: ./register.php');
