<?php session_start();
      $row = unserialize($_SESSION['ROW']);
      $connect = mysqli_connect("localhost", "root", "1234", "cultureland");
      $ad_code = $row['admin_code'];
      $ad_name = $row['admin_name'];
      $ad_phone = $row['admin_phone'];
      $ad_email = $row['admin_email'];
      $ad_id = $row['admin_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>admin</title>
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


    <section>
      <form method="post" action="update.php">
        <div class="container">
            <br />
    <div class="table-responsive">
    <h3 align="left">Admin Info</h3></br>

    <div class="col-md-12 col-sm-12">
    <div class="table-responsive">
        <table class="table table-hover">
              <tbody>
                <?php
                      echo
                      '<tr>
                        <td> ID </td>
                        <td> ' . $ad_id . ' </td>
                       </tr>
                       <tr>
                         <td> 관리자 코드 </td>
                         <td>' . $ad_code . '</td>
                       </tr>
                       <tr>
                         <td> 이름 </td>
                         <td>'. $ad_name.'</td>
                       </tr>
                       <tr>
                         <td> 전화번호 </td>
                         <td>'.$ad_phone.'</td>
                       </tr>
                       <tr>
                         <td> 이메일 </td>
                         <td>'.$ad_email.'</td>
                       </tr>
                     
                       ';
                    ?>
              </tbody>
          </table>
    </div>
   
    </form>

  </div>
   </div>
 </div>
</div>
</section>

<section>
    <div class="container">
        <br />
<h3 align="left">조회</h3></br>
<div class="table-responsive">
   
    <h4>*강의 정보 조회</h4>
    <h5>강의 코드를 입력하세요</h5>
    <section id="google" class="slider" data-stellar-background-ratio="0.5">
    <form method="POST" action="check.php">
        <input type="text" name="code"/><br/>
        <div style = "float:right;">
        <input type="submit" name="submit" class="btn btn-info"/>
        </div>
    </form>
    </section>
    </div>

    <div class="table-responsive">
    <h4>*학생 정보 조회</h4>
    <h5>학생 코드를 입력하세요</h5>
    <section id="google" class="slider" data-stellar-background-ratio="0.5">
    <form method="POST" action="check1.php">
        <input type="text" name="st_code"/><br/>
        <div style = "float:right;">
        <input type="submit" name="submit" class="btn btn-info"/>
        </div>
    </form>
    </section>
 </div>
    
 <div class="table-responsive">
    <h4>*강사 정보 조회</h4>
    <h5>강사 코드를 입력하세요</h5>
    <section id="google" class="slider" data-stellar-background-ratio="0.5">
    <form method="POST" action="check1_1.php">
        <input type="text" name="inst_code"/><br/>
        <div style = "float:right;">
        <input type="submit" name="submit" class="btn btn-info"/>
        </div>
    </form>
   
    </section>
    </div>

    <div class="table-responsive">
    <h4>*등록 학생 아이디 조회 </h4>
    <h5>아이디를 입력하세요(일부 입력시 포함하는 모든 아이디 검색)</h5>
    <section id="google" class="slider" data-stellar-background-ratio="0.5">
        <form method="POST" action="check6.php">
            <input type="text" name="s_id"/><br/>
          <div style = "float:right;">
        <input type="submit" name="submit" class="btn btn-info"/>
        </div>
        </form>
    </section>
    </div>

    <div class="table-responsive">
    <h4>*강의 수강 학생 조회</h4>
        <h5>강의 코드를 입력하세요</h5>
        <section id="google" class="slider" data-stellar-background-ratio="0.5">
        <form method="POST" action="check2.php">
            <input type="text" name="code2"/><br/>
          <div style = "float:right;">
        <input type="submit" name="submit" class="btn btn-info"/>
        </div>
        </form>
    </section>
    </div>


    <div class="table-responsive">
    <h4>*현금/카드 결제 등록 조회 </h4>
    <h5>카드= 1, 현금= 2</h5>
    <section id="google" class="slider" data-stellar-background-ratio="0.5">
    <form method="post" action="check3.php">  
    <input type="submit" name="task" value="1" class="btn btn-info"/>
    </form>
     <form method="post" action="check3_1.php">
    <input type="submit" name="task1" value="2" class="btn btn-info"/>
     </form>
    </section>
    </div>

    <div class="table-responsive">
    <h4>*강사별 학생 조회</h4>
        <h5> 강사코드를 입력하세요</h5>
        <section id="google" class="slider" data-stellar-background-ratio="0.5">
        <form method="POST" action="check4.php">
            <input type="text" name="code3"/><br/>
            <div style = "float:right;">
        <input type="submit" name="submit" class="btn btn-info"/>
        </div>
        </form>
    </section>
    </div>

  <div class="table-responsive">
    <h4>*강의실 조회</h4>
    <h5>강의실 타입을 선택하세요</h5>
    <section id="google" class="slider" data-stellar-background-ratio="0.5">
    <form method="post" action="check5.php">
      <select name="taskOption">
          <option value="1">체육관</option>
          <option value="2">다용도실</option>
          <option value="3">음악실</option>
          <option value="4">미술실</option>
          <option value="5">컴퓨터실</option>
      </select>
      <div style = "float:right;">
        <input type="submit" name="submit" class="btn btn-info"/>
        </div>
     </form>
    </section>
     </div>
    
     
     <?php $today1 = date("Y년 n월 j일 (요일 : D)"); ?>
    
     <div class="table-responsive">
    <h4>*등록조회</h4>
    <h5> 지정 기간 사이의 등록을 조회합니다(yyyy-mm-dd).</h5>
    <h5> 오늘 날짜는 <?php  echo $today1; ?> 입니다</h5>
    <section id="google" class="slider" data-stellar-background-ratio="0.5">
    <form method="POST" action="check7.php">
            <p> 조회 시작 날짜 <input type="text" name="date1"/><br/></p>
            <p> 조회 종료 날짜<input type="text" name="date2"/><br/></p>
          <div style = "float:right;">
        <input type="submit" name="submit" class="btn btn-info"/>
        </div>
        </form>
     </form>
    </section>
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
