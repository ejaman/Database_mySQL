<?php session_start();
      $row = unserialize($_SESSION['ROW']);
      $inst_code = $row['inst_code'];
      $name = "SELECT * FROM instructor WHERE INST_CODE = '$inst_code'";
      $connect = mysqli_connect( 'localhost', 'root', '1234', 'culture_world' );
      $inst_result = $connect->query($name);
      $inst_row = $inst_result->fetch_array(MYSQLI_ASSOC);
      $_SESSION['INST_ROW'] = $inst_row;
      $inst_course = "SELECT * FROM course WHERE INST_CODE = '$inst_code'";
      $inst_course_result = $connect->query($inst_course);
      $inst_course_row = $inst_course_result->fetch_array(MYSQLI_ASSOC);
      $_SESSION['INST_COURSE_ROW'] = $inst_course_row;
      ?>

<!DOCTYPE html>
<html lang="en">
<head>

     <title>instructor</title>
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
                    <a href="index.html" class="navbar-brand"><i class="fa fa-h-square"></i>CULTURELAND</a>
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

     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item ">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>환영합니다 </h3>
                                             <h1><?php echo $inst_row['INST_NAME'] ?>강사님</h1>
                                             <h1><?php echo $inst_course_row['COURSE_NAME'] ?>과목을 강의 중이십니다.</h1>
                                             <a href="http://localhost/info.php">>강의중인 강의 보기</a>
                                        </div>
                                   </div>
                              </div>
                        </div>

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
