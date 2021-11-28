<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placement Portal</title>
    <link rel="icon" href="images/Capture.PNG" sizes="30x30" type="image/png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/navbar.css"/>
    <link rel="stylesheet" href="CSS/home.css"/>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
  <!-- Navigation -->
  <nav class="navbar-sticky navbar navbar-inverse navbar-static-top navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar6" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> 
                    <span class="iitg" style="font-family: 'Open Sans', sans-serif ;color:white; font-size: 40px; margin-left:-80px;">Placement Portal</span>
                </a>
            </div>
            <div id="navbar6" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#"><i class="fa fa-home fa-fw" style="font-size: 20px;" aria-hidden="true"></i>Home</a></li>
                <li><a href="about.php">About <i class="fa fa-user" aria-hidden="true"></i> </a> </li>
                <li><a href="std_signup.php">Student-Signup <i class="fa fa-sign-in" style="color: blue" aria-hidden="true"></i></a></li>
                <li><a href="std_login.php">Student-Login <i class="fa fa-sign-in" style="color: blue" aria-hidden="true"></i></a></li>
                <li><a href="job_register.php">Company-SignUp <i class="fa fa-sign-in" style="color: blue" aria-hidden="true"></i></a></li>
                <li><a href="job_login.php">Company-Login <i class="fa fa-user" aria-hidden="true"></i> </a> </li>
            </ul>
        </div>
      </div>
    </nav>

    <!-- Home Content -->

    <div class="container">
	    <div id="login-box">
		    <div >
			    <img src="images/drasti1.png" width="600" height="260" class="img" />
          <p class="iitg" style="font-family: 'Open Sans', sans-serif ;color:White; font-size: 35px; margin-left:-10px;"> A one stop portal for Placements. </p>
          
			    <!-- <h1 class="logo-caption"><span class="tweak">IIT</span> Guwahati</h1> -->
		    </div>
	    </div>
    </div>
    <!-- <div class="container">
      <h1 class=text-center style=margin-top:550px> About Portal </h1>
</div> -->
    
    
    <!-- Footer  -->
    <footer id="footer" class="footer" style="position: fixed">
      <p class="text-center" style=color:white;>
        Developed by:
        <br />Drashti Sahu and Paras Gautam
      </p>
    </footer>

    <!-- <div id="particles-js"></div> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <!-- <script src="js/home.js"></script> -->
<!-- partial:index.partial.html -->
<canvas id="projector">Your browser does not support the Canvas element.</canvas>
<!-- partial -->
  <script src='https://code.createjs.com/easeljs-0.7.1.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script><script  src="./script.js"></script>

</body>
</html>