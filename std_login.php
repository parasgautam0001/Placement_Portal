<?php
    //require_once'db.php';
    session_start();
    $err = false;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
<style type="text/css">
    body{
        margin: 0;
        padding: 0;
        background-image:url('images/capture.png');
        background-repeat:no-repeat;
        background-size:100% 150%;
    }
    .space{
        margin-left: 10mm 
    }
    .d1{
        text-align:center;
        background: white;
        width: 100%;
        padding: 3mm;
        padding-left: 5mm;
    }
    form{
        color:lightblue;
    }
</style>
</head>
<body>
    <!-- <h1 class="d1">Placement Portal</h1> -->
<?php
    if(isset($_POST['sub']))
    {
        require('db.php');
        $rollno = $_POST['rollno'];
        $pp=md5($_POST['passwd']);
        $passwd = $pp;
        $stmt = $conn->query("SELECT * FROM plcmtportal.student WHERE student.rollno='$rollno' AND student.passwd='$passwd'");

        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        if($row)
        {
            $_SESSION['rollno']=$row['rollno'];
            $_SESSION['name']=$row['fname']." ".$row['lname'];
            $_SESSION['prog_name']=$row['prog_name'];
            
            header("Location: resume.php");
        }
        else
        {
            $err = true;
        }
    }
?>

    <form class="form" action="" method="post" name="login" style="margin-left:1100px;border-radius:8mm;border:4px solid black;">
        <h1 class="login-title" style=font-size:40px;><b>Student Login</b></h1>

        <input type="text" class="login-input" name="rollno" placeholder="Roll Number" style="border-radius:4mm;border:2px solid black;" required/>
        <input type="password" class="login-input" name="passwd" placeholder="Password" style="border-radius:4mm;border:2px solid black;" required/>
        <input type="submit" name="sub" value="Log In" class="login-button" style="border-radius:4mm;" />
        <p class="error" style=font-size:25px;font-weight:bold;>
            <?php
            if($err)
                echo "Invalid Credentials!";
            ?>
        </p>
        <p class="link" style=font-size:18px;font-weight:bold;><a href="std_signup.php"><b>New Registration</b></a><span class="space"></span><a href="job_login.php"><b>For companies</b></a></p>
        
    </form>
</body>
</html>