<?php
  $p_type = $_POST['task'];
 
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


     <style>
      body {
        font-family: Consolas, monospace;
        font-family: 12px;
      }
      table {
        width: 100%;
      }
      th, td {
        padding: 10px;
        border-bottom: 1px solid #dadada;
      }
    </style>

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>

          </div>
     </section>
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
                    <a href="index.html" class="navbar-brand"><i class="fa fa-h-square"></i>CULTURELAND_ADMIN PAGE</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#google" class="smoothScroll">조회</a></li>
                         <li><a href="#team" class="smoothScroll">전체 테이블</a></li>
                        
                         <li class="appointment-btn"><a href="logout.php">LOGOUT</a></li>
                    </ul>
               </div>

          </div>
     </section>

  <!-- NEWS DETAIL -->
  <section>
         <div class="container">
             <br />
   
     <h3 align="left"><h3><?php echo $p_type  ?>(으)로 결제한 등록 정보를 조회합니다</h3></br>
     <div class="table-responsive">
         <table class="table table-bordered table-striped">
        
             <thead>
          <th width="10%" >금액</th>
          <th width="10%">결제 방법</th>
          <th width="10%">강의비</th>
          <th width="10%">할인</th>
          <th width="10%">강의명</th>
          <th width="10%">강의 코드</th>
          <th width="10%">학생 코드</th>
          <th width="10%">등록일자</th>
          <th width="20%">스케줄</th>
                
             </thead>
             <tbody>
             <?php
            $con = mysqli_connect('localhost','root','1234','cultureland');
            $query = "SELECT course_code, course_fee, payment_d, register_date, stu_code,  admin_code, course_name, course_schedule, course_fee*1 as 'after_d', course_fee*0 as 'd_amount'
            FROM register 
            join course using(course_code)
            join payment_type using(payment_type)
            where payment_type = '$p_type'
            order by stu_code";

            $exec = mysqli_query($con,$query);
            while($row = mysqli_fetch_array($exec)){
            echo  '<tr><td>' . $row[ 'after_d' ] . '</td><td>'. $row[ 'payment_d' ] . '</td>
            <td>' . $row[ 'course_fee' ] . '</td><td>' . $row[ 'd_amount'] .  '</td>
            <td>'.$row['course_name'].'</td><td>'. $row[ 'course_code' ] . '</td>
            <td>'. $row['stu_code'] . '</td><td>'. $row[  'register_date'  ] .  '</td><td>'. $row[  'course_schedule'  ] .'</td>
            </tr>';
             }
            
        ?>

            </tr>

             </tbody>
         </table>
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

