<?php session_start();

if(isset( $_SESSION['ID'])){
  $row = unserialize($_SESSION['ROW']);
}

if(isset($row['stu_code'])){
  $stu_row = $row['stu_code'];
}
elseif(isset($row['inst_code'])){
  $inst_row = $row['inst_code'];
}
elseif(isset($row['admin_code'])){
  $admin_row = $row['admin_code'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>CULTURELAND</title>
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

                    <div class="col-md-4 col-sm-5">
                         <p>CULTURELAND에 오신것을 환영합니다</p>
                    </div>

                    <div class="col-md-8 col-sm-7 text-align-right">
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
                         <li><a href="#top" class="smoothScroll">Home</a></li>
                         <li><a href="#about" class="smoothScroll">About Us</a></li>
                         <li><a href="#team" class="smoothScroll">COURSE</a></li>
                         <li><a href="#news" class="smoothScroll">INSTRUCTORS</a></li>
                         <li><a href="#google-map" class="smoothScroll">Contact</a></li>
                         <?php
                         if(isset($stu_row)){
                           echo '<li><a href="student.php">INFORMATION</a></li>';
                         }
                         elseif(isset($inst_row)){
                           echo '<li><a href="instructor.php">INFORMATION</a></li>';
                         }
                         elseif(isset($admin_row)){
                           echo '<li><a href="admin.php">INFORMATION</a></li>';
                         }
                          ?>
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


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>자기개발은 하고 싶은데.. 집근처에서 할 순 없을까?</h3>
                                             <h1>당신 근처의 그 곳. 당근</h1>
                                             <a href="#team" class="section-btn btn btn-default smoothScroll">저희가 제공하는 강의를 확인해보세요!</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>CULTURELAND 뭐하는 곳이지?</h3>
                                             <h1>문화상품권 파는곳? No..</h1>
                                             <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">CULTURELAND는?</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-third">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>이왕이면 최고한테 강의 받고 싶어</h3>
                                             <h1>The Town Best</h1>
                                             <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">강사진을 확인해보세요!</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s">Welcome, This is cultureland! </h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>이사와서 동네에 친구도 없는데.. 같은 관심사를 가진 친구를 만날 순 없을까??</p>
                                   <p>바로 그.곳. cultureland</p>
                              </div>
                              <figure class="profile wow fadeInUp" data-wow-delay="1s">
                                   <img src="images/lecture.jpg" class="img-responsive" alt="">
                                   <figcaption>
                                        <h3>손흥민</h3>
                                        <p>General Principal</p>
                                   </figcaption>
                              </figure>
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- TEAM -->
     <section id="team" data-stellar-background-ratio="1">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.1s">Our Course</h2>
                         </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                              <img src="images/yoga.jpg" class="img-responsive" alt="">

                                   <div class="team-info">
                                        <a href="info.php">
                                        <h3> <a href="info.php">요가 - 몸과 마음의 평화를 찾자(이효리도 등록하려고 했'던'요가)</h3></a>
                                        <p>김경수</p>
                                        <div class="team-contact-info">
                                             <p><i class="fa fa-phone"></i> 010-1234-6789</p>
                                             <p><i class="fa fa-envelope-o"></i> <a href="#">zebra1@naver.com</a></p>
                                        </div>
                                        <ul class="social-icon">
                                             <li><a href="#" class="fa fa-linkedin-square"></a></li>
                                             <li><a href="#" class="fa fa-envelope-o"></a></li>
                                        </ul>
                                   </div>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <a href="info.php">
                              <img src="images/computer.jpg" class="img-responsive" alt=""></a>

                                   <div class="team-info">

                                        <h3><a href="info.php"> 컴퓨터-더는 컴퓨터 앞에서좌절하지 말아요</a></h3>
                                        <p>강동원</p>
                                        <div class="team-contact-info">
                                             <p><i class="fa fa-phone"></i> 010-6633-0011</p>
                                             <p><i class="fa fa-envelope-o"></i> <a href="#">nud55@naver.com</a></p>
                                        </div>
                                        <ul class="social-icon">
                                             <li><a href="#" class="fa fa-facebook-square"></a></li>
                                             <li><a href="#" class="fa fa-envelope-o"></a></li>
                                             <li><a href="#" class="fa fa-flickr"></a></li>
                                        </ul>
                                   </div>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <a href="info.php">
                              <img src="images/invest.jpg" class="img-responsive" alt=""></a>

                                   <div class="team-info">
                                        <h3><a href="info.php">재테크-돈, 알면 알수록 모인다.</a></h3>
                                        <p>윤민수</p>
                                        <div class="team-contact-info">
                                             <p><i class="fa fa-phone"></i> 010-2299-7788</p>
                                             <p><i class="fa fa-envelope-o"></i> <a href="#">nad77@naver.com</a></p>
                                        </div>
                                        <ul class="social-icon">
                                             <li><a href="#" class="fa fa-twitter"></a></li>
                                             <li><a href="#" class="fa fa-envelope-o"></a></li>
                                        </ul>
                                   </div>

                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- NEWS -->
     <section id="news" data-stellar-background-ratio="2.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>INSTRUCTORS</h2>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <a href="info.php">
                                   <img src="images/literature.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>박충만</span>
                                   <h3><a href="info.php">About Amazing Literature</a></h3>
                                   <p>1984, 혈의 누, 작은 아씨들.</p>
                                   <div class="author">
                                        <img src="images/character-1468032_1920.jpg" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>2013 신춘문예 출신</h5>
                                             <p>CEO / 모현출판사 Founder</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <a href="info.php">
                                   <img src="images/dancer.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>이경무</span>
                                   <h3><a href="info.php">Shell we dance with me?</a></h3>
                                   <p>비의 깡, 싸이의 강남스타일, 블랙핑크 뚜두뚜두등 그의 손을 안거쳐간 곳은 없다.</p>
                                   <div class="author">
                                        <img src="images/model-2303361_1920.jpg" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>YG 안무 디렉터</h5>
                                             <p>2만 유튜브 채널 운영</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                              <a href="info.php">
                                   <img src="images/health.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <span>한고은</span>
                                   <h3><a href="info.php">개똥밭에 굴러도 이승이 낫다</a></h3>
                                   <p>절대 늙지않는 그녀의 동안 관리법 까지.</p>
                                   <div class="author">
                                        <img src="images/guy-3237859_1920.jpg" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>피지컬 갤러리 디렉터</h5>
                                             <p>마이프로틴 공동 대표</p>
                                        </div>
                                   </div>
                              </div>9
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- MAKE AN APPOINTMENT -->
     <section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">

                         <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->

                         <form action="process_create.php" id="appointment-form" role="form" method="post" action="#">

                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">

                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.6s">

                                   <div class="col-md-6 col-sm-6">
                                        <label for="user_code">USER_CODE</label>
                                        <input type="text" class="form-control" id="user_code" name="USER_CODE" placeholder="User code">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="USER_NAME" placeholder="Full Name">
                                   </div>


                                   <div class="col-md-6 col-sm-6">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="ID" name="ID" placeholder="ID">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="password">PASSWORD</label>
                                        <input type="password" class="form-control" id="PW" name="PW" placeholder="Password">
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="recommender_id">Recommender ID</label>
                                        <input type="text" class="form-control" id="RECOMMENDER_ID" name="RECOMMENDER_ID" placeholder="Recommender ID">
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="USER_EMAIL" placeholder="Your Email">
                                   </div>


                                   <div class="col-md-12 col-sm-12">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="USER_PHONE" placeholder="Phone">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="USER_ADDRESS" placeholder="Your Email">
                                        <button onclick = "location.href = 'process_create.php' "type="submit" class="form-control" id="cf-submit" name="submit">JOIN US</button>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>


     <!-- GOOGLE MAP -->
     <section id="google-map">
     <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
     <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d25377.666840872116!2d127.25593933698732!3d37.337575691786725!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xae050b2ce766e1e9!2z7ZWc6rWt7Jm46rWt7Ja064yA7ZWZ6rWQIOq4gOuhnOuyjOy6oO2NvOyKpA!5e0!3m2!1sko!2skr!4v1606453653207!5m2!1sko!2skr" width="1600" height="350" frameborder="0"></iframe>     </section>


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
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>
