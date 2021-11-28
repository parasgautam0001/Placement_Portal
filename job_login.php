<?php
    session_start();
    $err = false;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
<style type="text/css">
    .space{
        margin-left: 10mm 
    }
    body{
        margin: 0;
        padding: 0;
        background-image:url('images/com_login.png');
        background-repeat:no-repeat;
        background-size:100% 140%;
    }
    .d1{
        background: white;
        width: 100%;
        padding: 3mm;
        padding-left: 5mm;
    }
</style>
</head>
<body>
    <!-- <h1 class="d1">Placement Portal</h1> -->
<?php

    if(isset($_POST['sub']))
    {
        require('db.php');
        $company_name = $_POST['company_name'];
        $profile_name = $_POST['profile_name'];
        $passwd = md5($_POST['passwd']);

        $str = "SELECT * FROM plcmtportal.jobs WHERE jobs.company_name='$company_name' AND jobs.profile_name='$profile_name' AND jobs.password='$passwd'";

        $stmt = $conn->query($str);

        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        if($row)
        {
            $_SESSION['profile_name']=$row['profile_name'];
            $_SESSION['company_name']=$row['company_name'];
            header("Location: job_db_app.php");
        }
        else
        {
            $err = true;
        }
    }
?>

<form class="form" action="" method="post" name="login" style="border-radius:8mm;border:4px solid black;">
        <h1 class="login-title" style="font-size:35px;color:black;"><b>Company Login</b></h1>
        <input type="text" class="login-input" name="company_name" placeholder="Company Name"  style="border-radius:4mm;border:2px solid black;" required/>
        <input type="text" class="login-input" name="profile_name" placeholder="Profile Name" style="border-radius:4mm;border:2px solid black;" required/>
        <input type="password" class="login-input" name="passwd" placeholder="Password" style="border-radius:4mm;border:2px solid black;" required/>
        <input type="submit" name="sub" value="Log In" class="login-button" />
        <p class="error" style=font-size:25px;font-weight:bold;>
            <?php
            if($err)
                echo "Invalid credentials!";
            ?>
        </p>
        <p class="link" style=font-size:18px;font-weight:bold;><a href="job_register.php"><b>New Registration</b></a><span class="space"></span><a href="std_login.php"><b>For students</b></a></p>
</form>


</body>
</html>