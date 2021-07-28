<?php session_start();
$row = unserialize($_SESSION['ROW']);

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








     <!-- NEWS DETAIL -->
     <section>
         <div class="container">
             <br />
    <form method="post" action="process_cancel.php">
     <h3 align="left">My course</h3></br>
     <div class="table-responsive">
         <table class="table table-bordered table-striped">
             <thead>
                 <th width="5%">Course Code</th>
                 <th width="15%">Course</th>
                 <th width="15%">Instructor</th>
                 <th width="25%">Course Schedule</th>
                 <th width="20%">Course Fee</th>
                 <th width="5%">Classroom</th>
                 <th width="10%">Open date</th>
                 <th width="5%">Cancel</th>

             </thead>
             <tbody>
               <?php
                $conn = mysqli_connect( 'localhost', 'root', '1234', 'cultureland' );
                $stu_code = $row['stu_code'];
                $current = "SELECT course.course_code, course_name, course.inst_code, inst_name, course.classroom_code, course_schedule, course_fee, course_open_date
                            FROM course INNER JOIN classroom ON course.classroom_code = classroom.classroom_code
		                        INNER JOIN instructor ON instructor.inst_code = classroom.inst_code
                            INNER JOIN register ON course.course_code = register.course_code
			                      WHERE register.stu_code = '$stu_code';";
                $current_check = $conn->query($current);

                $cancel1 = "SELECT register.stu_code, register.course_code
                           FROM register INNER JOIN cancel ON cancel.register_id = register.register_id
                           WHERE register.stu_code = '$stu_code' ORDER BY course_code ASC limit 1 ;";
                $cancel1_check = $conn->query($cancel1);

                $cancel2 = "SELECT register.stu_code, register.course_code
                           FROM register INNER JOIN cancel ON cancel.register_id = register.register_id
                           WHERE register.stu_code = '$stu_code' ORDER BY course_code DESC limit 1 ;";
                $cancel2_check = $conn->query($cancel2);

                if($cancel1_check->num_rows==1 || $cancel2_check->num_rows==1 ){
                  $cancel1_row = $cancel1_check->fetch_array(MYSQLI_ASSOC);
                  $cancel2_row = $cancel2_check->fetch_array(MYSQLI_ASSOC);
                  while($current_row = $current_check->fetch_array(MYSQLI_ASSOC)){
                    if($current_row['course_code']!=$cancel1_row['course_code']){
                      if($current_row['course_code']!=$cancel2_row['course_code']){
                        echo
                       '<tr>
                        <td>' . $current_row[ 'course_code' ] . '</td>
                        <td>' . $current_row[ 'course_name' ] . '</td>
                        <td>' . $current_row[ 'inst_name' ] . '</td>
                        <td>' . $current_row[ 'course_schedule' ] . '</td>
                        <td>' . $current_row['course_fee'].'</td>
                        <td>' . $current_row['classroom_code'].'</td>
                        <td>' . $current_row['course_open_date'].'</td>
                        <td> <input type = "radio" name = "refund" value = '.$current_row['course_code'].'> </td>
                        </tr>';
                      }
                    }
                  }
                }
                else{
                  while($current_row = $current_check->fetch_array(MYSQLI_ASSOC)){
                  echo
                 '<tr>
                  <td>' . $current_row[ 'course_code' ] . '</td>
                  <td>' . $current_row[ 'course_name' ] . '</td>
                  <td>' . $current_row[ 'inst_name' ] . '</td>
                  <td>' . $current_row[ 'course_schedule' ] . '</td>
                  <td>' . $current_row['course_fee'].'</td>
                  <td>' . $current_row['classroom_code'].'</td>
                  <td>' . $current_row['course_open_date'].'</td>
                  <td> <input type = "radio" name = "refund" value = '.$current_row['course_code'].'> </td>
                  </tr>';
                  }
                }



              ?>
            </tr>

             </tbody>
         </table>
     </div>
     <h5 align="center">최대 두 번만 강좌를 취소할 수 있습니다.</h5>
     <h5 align="center">취소한 강좌는 다시 등록할 수 없습니다.</h5>
     <div align="right">
         <input type="submit" name="Cancel" id="Cancel" class="btn btn-info" value="Refund" />
     </div>
   </form>
     <form method="post" action="payment.php">
                     <br />
                     <div class="table-responsive">
                       <h3 align="left">Course list</h3></br>
                         <table class="table table-bordered table-striped">
                             <thead>
                                 <th width="5%">Course Code</th>
                                 <th width="15%">Course</th>
                                 <th width="15%">Instructor</th>
                                 <th width="30%">Course Schedule</th>
                                 <th width="20%">Course Fee</th>
                                 <th width="10%"># of Remain</th>
                                 <th width="5%">check</th>
                             </thead>
                             <tbody>
                               <?php
                                $conn = mysqli_connect( 'localhost', 'root', '1234', 'cultureland' );
                                $sql = "SELECT course.course_code, course_name, course.inst_code, inst_name,
                                        course.classroom_code, course_schedule, course_fee, 20- count(stu_code) AS '# of Remain'
                                        FROM course INNER JOIN classroom ON course.classroom_code = classroom.classroom_code
                                        INNER JOIN instructor ON instructor.inst_code = classroom.inst_code INNER JOIN register
                                        ON course.course_code = register.course_code  GROUP BY course.course_code";
                                $result = $conn->query($sql);

                                $stu_code = $row['stu_code'];
                                # 수강생이 등록한 첫번 째 강의를 강의등록 표에서 제외
                                $exist1 = "SELECT register.course_code
                                           FROM register LEFT JOIN cancel ON register.register_id = cancel.register_id
                                           WHERE register.stu_code = '$stu_code' AND cancel.register_id is null ORDER BY course_code ASC limit 1;";
                                $exist1_check = $conn->query($exist1);
                                $exist1_row = $exist1_check->fetch_array(MYSQLI_ASSOC);
                                # 수강생이 등록한 두번 째 강의를 강의등록 표에서 제외
                                $exist2 = "SELECT register.course_code
                                           FROM register LEFT JOIN cancel ON register.register_id = cancel.register_id
                                           WHERE register.stu_code = '$stu_code' AND cancel.register_id is null ORDER BY course_code DESC limit 1 ;";
                                $exist2_check = $conn->query($exist2);
                                $exist2_row = $exist2_check->fetch_array(MYSQLI_ASSOC);

                                if($exist1_check->num_rows==1 || $exist2_check->num_rows==1 ){
                                  while($table_row = $result->fetch_array(MYSQLI_ASSOC)){
                                    if($table_row['course_code'] != $exist1_row['course_code']){
                                      if($table_row['course_code'] != $exist2_row['course_code']){
                                          echo
                                         '<tr>
                                          <td>' . $table_row[ 'course_code' ] . '</td>
                                          <td>' . $table_row[ 'course_name' ] . '</td>
                                          <td>' . $table_row[ 'inst_name' ] . '</td>
                                          <td>' . $table_row[ 'course_schedule' ] . '</td>
                                          <td>' . $table_row['course_fee'].'</td>
                                          <td>' . $table_row[ '# of Remain' ].'</td>
                                          <td> <input type = "radio" name = "check" value = '.$table_row['course_code'].'> </td>
                                          </tr>';
                                      }
                                    }
                                  }
                                }
                                else{
                                  while($table_row = $result->fetch_array(MYSQLI_ASSOC)){
                                    echo
                                   '<tr>
                                    <td>' . $table_row[ 'course_code' ] . '</td>
                                    <td>' . $table_row[ 'course_name' ] . '</td>
                                    <td>' . $table_row[ 'inst_name' ] . '</td>
                                    <td>' . $table_row[ 'course_schedule' ] . '</td>
                                    <td>' . $table_row['course_fee'].'</td>
                                    <td>' . $table_row[ '# of Remain' ].'</td>
                                    <td> <input type = "radio" name = "check" value = '.$table_row['course_code'].'> </td>
                                    </tr>';
                                  }
                                }


                              ?>
                            </tr>

                             </tbody>
                         </table>
                     </div>
                     <h5 align="center">한 번에 한 개의 강좌만 등록해주세요.</h5>
                     <h5 align="center">최대 두 개의 강좌만 등록이 가능합니다.</h5>
                     <div align="right">
                         <input type="submit" name="Register" id="Register" class="btn btn-info" value="Register" />
                     </div>
                 </form>
               </div>
             </div>
           </section>






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
