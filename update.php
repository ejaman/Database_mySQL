<?php session_start();
$row = unserialize($_SESSION['ROW']);
$conn = mysqli_connect("localhost", "root", "1234", "cultureland");

if(isset($_POST['pw'])){
  $pw = $_POST['PW'];
}

if(isset($_POST['phone'])){
  $phone = $_POST['phone'];
}

if(isset($_POST['email'])){
  $email = $_POST['email'];
}

if(isset($_POST['address'])){
  $address = $_POST['address'];
}

 ?>
