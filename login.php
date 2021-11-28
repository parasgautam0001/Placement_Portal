<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIT Guwahati</title>
    <link rel="icon" href="images/iitg-logo.png" sizes="30x30" type="image/png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/LoginSignup.css">
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
                    <img style="width: 64px" src="Images/iit-logo.png"alt="iit logo"/>
                    <span class="iitg" style="font-family: 'Open Sans', sans-serif; font-weight:600; font-size: 21px;">IIT Guwahati</span>
                </a>
            </div>
            <div id="navbar6" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./index.php"><i class="fa fa-home fa-fw" style="font-size: 20px;" aria-hidden="true"></i>Home</a></li>
                <li><a href="./admin/login.php">Admin <i class="fa fa-user" aria-hidden="true"></i> </a> </li>
                <li><a href="signup.php">Student-Signup <i class="fa fa-sign-in" style="color: blue" aria-hidden="true"></i> </a> </li>
            </ul>
        </div>
      </div>
    </nav>

    <!-- Login Content -->
    <div class="login-content">
        <h2>Student Login</h2>
        <div class="lform">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <div class="icon"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                    <input class="form-control" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <div class="icon"> <i class="fa fa-lock" aria-hidden="true"></i> </div>
                    <input class="form-control" type="password" name="password" placeholder="Password" >
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <input class="btn btn-primary submit-button" type="submit" value="Login">
                <p class="signupnow">Don't have an account yet? <a href="signup.php" style="color:green" >Sign up now</a>
                    <span class="arrow"><i class="fa fa-arrow-right" style="font-size: 13px" aria-hidden="true"></i></span>
                </p>
            </form>
        </div>
    </div> 

    <!-- Footer -->
    <footer id="footer" class="footer" style="position: fixed">
      <p class="text-center">
        Email: pportal@iitg.ac.in
        <br />Mobile: 0361-258-3000
      </p>
    </footer>

    <!-- Bootsrtap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- JavaScript Linked-->
    <script src="../Javascript/navbar.js"></script>
</body>
</html>