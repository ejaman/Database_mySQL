<?php session_start();
$stu_row = unserialize($_SESSION['ROW']);

if(isset($_POST['cash'])&& isset($_POST['card'])){
  echo "<script>alert('한 개의 결제방식만 선택 가능합니다.'); </script>";
  echo "<a href= payment.php> back page </a>";
}
elseif(isset($_POST['cash'])){
  $_POST['card'] = null;
  $cash = $_POST['cash'];
}
elseif(isset($_POST['card'])){
  $_POST['cash'] = null;
  $card = $_POST['card'];
}
elseif(isset($_POST['check'])){
  $check_value = $_POST['check'];
}
else{
  echo "<script>alert('결제 방식을 선택해주세요.'); </script>";
  echo "<a href= register.php> back page </a>";
  exit();
}


if(isset($_POST['check'])){
  $check_value = $_POST['check'];
  $_SESSION['check'] = serialize($check_value);
}
$check_value = unserialize($_SESSION['check']);


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>student</title>
<!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Tooplate">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
    <section class="preloader">
         <div class="spinner">

              <span class="spinner-rotate"></span>

         </div>
    </section>


    <!-- HEADER -->
    <header>
         <div class="container">
              <div class="row">

                   <div class="col-md-4 col-sm-3">
                        <p>Welcome, This is CULTURELAND</p>
                   </div>

                   <div class="col-md-8 col-sm-9 text-align-right">
                        <span class="phone-icon"><i class="fa fa-phone"></i> 010-1234-5678</span>
                        <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 9:00 AM - 11:00 PM (Mon-Fri)</span>
                        <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">cultureland@naver.com</a></span>
                   </div>

              </div>
         </div>
    </header>


    <!-- MENU -->
    <section class="navbar navbar-default navbar-static-top" role="navigation">
         <div class="container">

              <div class="navbar-header">
                   <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                   </button>

                   <!-- lOGO TEXT HERE -->
                   <a href="index.php" class="navbar-brand"><i class="fa fa-h-square"></i>CULTURELAND</a>
              </div>

              <!-- MENU LINKS -->
              <div class="collapse navbar-collapse">
                   <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php#top" class="smoothScroll">Home</a></li>
                        <li><a href="index.php#about" class="smoothScroll">About Us</a></li>
                        <li><a href="index.php#team" class="smoothScroll">COURES</a></li>
                        <li><a href="index.php#news" class="smoothScroll">INSTRUCTORS</a></li>
                        <li><a href="index.php#google-map" class="smoothScroll">Contact</a></li>
                        <?php
                        if(isset($_SESSION['ROW'])){
                          echo '<li class="appointment-btn"><a href="logout.php">LOGOUT</a></li>';
                        }
                        else{
                          echo '<li class="appointment-btn"><a href="#appointment">JOIN US</a></li>';
                          echo '<li class="appointment-btn"><a href="login.php">LOGIN</a></li>';
                        }
                         ?>
                   </ul>
              </div>

         </div>
    </section>

<!-- Main -->
<section>
    <div class="container">
        <br />
<div class="table-responsive">
<h3 align="left">Course Info</h3></br>


<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <th width="15%">Course</th>
            <th width="15%">Instructor</th>
            <th width="30%">Course Schedule</th>
            <th width="15%">Classroom</th>
            <th width="10%">Course Fee</th>
            <th width="15%">Open date</th>
        </thead>
          <tbody>
            <?php
            $conn = mysqli_connect( 'localhost', 'root', '1234', 'cultureland' );
            $sql = "SELECT course.course_code, course_name, course.inst_code, inst_name,
                    course.classroom_code, course_schedule, course_fee, course_open_date
                    FROM course INNER JOIN classroom ON course.classroom_code = classroom.classroom_code
                    INNER JOIN instructor ON instructor.inst_code = classroom.inst_code INNER JOIN register
                    ON course.course_code = register.course_code
                    WHERE course.course_code = '$check_value';";
            $result = $conn->query($sql);
            $row = $result->fetch_array(MYSQLI_ASSOC);
                  echo
                 '<tr>
                  <td>' . $row[ 'course_name' ] . '</td>
                  <td>' . $row[ 'inst_name' ] . '</td>
                  <td>' . $row[ 'course_schedule' ] . '</td>
                  <td>' . $row[ 'classroom_code' ] . '</td>
                  <td>' . $row['course_fee'].'</td>
                  <td>' . $row[ 'course_open_date' ].'</td>
                  </tr>';
                ?>
          </tbody>
      </table>
</div>

<h3 align="left">Discount Info</h3><br/>

<form method="post" action="payment.php">
  <div class="table-responsive">
      <table class="table table-hover">
            <tbody>
              <?php
              if(isset($stu_row['recommend_id'])){
                  $recommend_discount = $row['course_fee']*0.01;
              }
              else{
                  $recommend_discount = 0;
              }

              if(isset($_POST['cash'])){
                $cash_discount = $row['course_fee']*0.05;
              }
              elseif(isset($_POST['card'])){
                $cash_discount = 0;
              }
              else{
                $cash_discount = 0;
              }
              $total_cost = $row['course_fee']-$recommend_discount-$cash_discount;
                    echo
                    '<thead>
                        <th width="25%">현금 <input type = "checkbox" name = "cash" value = '.$check_value.'></th>
                        <th width="25%">카드 <input type = "checkbox" name = "card" value = '.$check_value.'></th>
                        <th width="50%"></th>
                     </thead>
                    <tr>
                      <td> 강좌료 </td>
                      <td> ' . $row[ 'course_fee' ] . '원 </td>
                      <td></td>

                    </tr>
                    <tr>
                      <td> 추천인 할인 </td>
                      <td> -' .$recommend_discount. '원</td>
                      <td></td>

                    </tr>
                    <tr>
                      <td> 현금 할인 시 </td>
                      <td>-' .$cash_discount. '원</td>
                      <td></td>
                    </tr>

                    <tr>
                      <td> 결제 금액 </td>
                      <td>' .$total_cost. '원</td>
                      <td></td>

                    </tr>';

                  ?>
            </tbody>
        </table>
  </div>
  <div align="right">
  <input type="submit" name="inquiry" id="inquiry" class="btn btn-info" value="할인금액 조회" />
 </div>
</form>

<h3 align="left">Payment Info</h3><br/>
<form method="post" action="process_register.php">
  <div class="table-responsive">
      <table class="table table-hover">
            <tbody>
              <?php
              echo
              '<thead>
              <th width="25%"> 현금 <input type = "checkbox" name = "cash_real" value = '.$check_value.'> </th>
              <th width="25%"> 카드 <input type = "checkbox" name = "card_real" value = '.$check_value.'> </th>
              <th width="50%"></th>
              </thead>';
               ?>
             </tbody>
         </table>
   </div>
   <div align="right">
   <input type="submit" name="inquiry" id="inquiry" class="btn btn-info" value="결제" />
  </div>
 </form>







    <!-- FOOTER -->
    <footer data-stellar-background-ratio="5">
         <div class="container">
              <div class="row">

                   <div class="col-md-4 col-sm-4">
                        <div class="footer-thumb">
                             <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                             <p>Fusce at libero iaculis, venenatis augue quis, pharetra lorem. Curabitur ut dolor eu elit consequat ultricies.</p>

                             <div class="contact-info">
                                  <p><i class="fa fa-phone"></i> 010-1234-5678</p>
                                  <p><i class="fa fa-envelope-o"></i> <a href="#">cultureland@naver.com</a></p>
                             </div>
                        </div>
                   </div>



                   <div class="col-md-4 col-sm-4">
                        <div class="footer-thumb">
                             <div class="opening-hours">
                                  <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                                  <p>Monday - Friday <span>09:00 AM - 11:00 PM</span></p>
                                  <p>Saturday <span>Closed</span></p>
                                  <p>Sunday <span>Closed</span></p>
                             </div>

                             <ul class="social-icon">
                                  <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                  <li><a href="#" class="fa fa-twitter"></a></li>
                                  <li><a href="#" class="fa fa-instagram"></a></li>
                             </ul>
                        </div>
                   </div>

                   <div class="col-md-12 col-sm-12 border-top">
                        <div class="col-md-4 col-sm-6">
                             <div class="copyright-text">
                                  <p>Copyright &copy; 2018 Your Company

                                  | Design: Tooplate</p>
                             </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                             <div class="footer-link">
                                  <a href="#">Laboratory Tests</a>
                                  <a href="#">Departments</a>
                                  <a href="#">Insurance Policy</a>
                                  <a href="#">Careers</a>
                             </div>
                        </div>
                        <div class="col-md-2 col-sm-2 text-align-center">
                             <div class="angle-up-btn">
                                 <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                             </div>
                        </div>
                   </div>

              </div>
         </div>
    </footer>


    <!-- SCRIPTS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

   </body>
   </html>
