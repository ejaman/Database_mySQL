<!DOCTYPE html>
<html lang="en">
<head>


     <title>login</title>
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

        #columns{
          column-width:350px;
          column-gap: 15px;
        }
        #columns figure{
          display: inline-block;
        }

      </style>

</head>
<<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
       <!-- MAKE AN APPOINTMENT -->
     <section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">
                 <div class="col-md-6 col-sm-6">
                   <img src="images/건물.jpg" class="img-responsive" alt="">
                 </div>
                 <div class="section-title wow fadeInUp" data-wow-delay="0.4s"style="text-align: center">
                   <h2>SIGN IN</h2>
                 </div>
        <div id="columns" style="text-align: center">
          <figure>
            <form action="process_login.php" method="POST">
              <label for="id">ID</label>
              <p><input type="text" class="form-control", name="ID" placeholder="ID"width="500"></p>
              <label for="PASSWORD">PASSWORD</label>
              <p><input type="password" class="form-control", name="PASSWORD" placeholder="PASSWORD"></p>
              <p><button type="submit" class="form-control" id="cf-submit" name="login">Login</button>
           </form>
         </figure>
       </div>
     </body>
</html>
