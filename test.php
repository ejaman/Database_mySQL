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
        font-family: sans-serif;
        font-family: 12px;
      }
      h4,h5 {
          font-family: sans-serif;
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
                      
                       <li class="appointment-btn"><a href="index.php">MAIN</a></li>
                        
                         <li class="appointment-btn"><a href="logout.php">LOGOUT</a></li>
                    </ul>
               </div>

          </div>
     </section>


     
    


    <h4>1_1. 강의 정보 조회</h4>
    <h5>강의 코드를 입력하세요</h5>
    <section id="google" class="slider" data-stellar-background-ratio="0.5">
    <form method="POST" action="check.php">
        코드: <input type="text" name="code"/><br/>
        <input type="submit" name="submit"/>
    </form>
    


    </section>


    <h4>1_2. 학생 정보 조회</h4>
    <h5>학생 코드를 입력하세요</h5>
    <section id="google" class="slider" data-stellar-background-ratio="0.5">
    <form method="POST" action="check1.php">
        코드: <input type="text" name="st_code"/><br/>
        <input type="submit" name="submit"/>
    </form>
    


    </section>

    
    <h4>1_3. 강사 정보 조회</h4>
    <h5>강사 코드를 입력하세요</h5>
    <section id="google" class="slider" data-stellar-background-ratio="0.5">
    <form method="POST" action="check1_1.php">
        코드: <input type="text" name="inst_code"/><br/>
        <input type="submit" name="submit"/>
    </form>
   
    </section>

    
    <h4> 등록한 학생 아이디 조회 </h4>
    <h5>카드 또는 현금을 선택하세요</h5>
    <section id="google" class="slider" data-stellar-background-ratio="0.5">
        <form method="POST" action="check6.php">
            아이디: <input type="text" name="s_id"/><br/>
            <input type="submit" name="submit"/>
        </form>
    </section>



    <h4>2. 강의 수강 학생 조회</h4>
        <h5> 학생/ 강사/ 강의의 코드를 입력하세요</h5>
        <section id="google" class="slider" data-stellar-background-ratio="0.5">
        <form method="POST" action="check2.php">
            코드: <input type="text" name="code2"/><br/>
            <input type="submit" name="submit"/>
        </form>
    </section>

    <h4>3. 현금/카드 결제 등록 조회 </h4>
    <h5>카드 또는 현금을 선택하세요</h5>
    <section id="google" class="slider" data-stellar-background-ratio="0.5">
    <form method="post" action="check3.php">
      <select name="task">
          <option value="1">카드</option>
          <option value="2">현금</option>
      </select>
      <input type="submit" value="Submit"/>
     </form>

    </section>

    <h4>4. 강사별 학생 조회</h4>
        <h5> 강사코드를 입력하세요</h5>
        <section id="google" class="slider" data-stellar-background-ratio="0.5">
        <form method="POST" action="check4.php">
            코드: <input type="text" name="code3"/><br/>
            <input type="submit" name="submit"/>
        </form>
    </section>


    <h4>5. 강의실 조회</h4>
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
      <input type="submit" value="Submit"/>
     </form>
    


    </section>


    



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
