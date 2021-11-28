<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Student Signup</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<style>
	body{
		background-image:url('images/stud_signup2.png');
        background-repeat:no-repeat;
        background-size:100% 100%;
	}
	</style>
<body>
	<form class="form" action="" method="post" style="float:left;margin-left:150px;border:4px solid black;border-radius:8mm;">
        <h1 class="login-title" style="font-size:35px;color:black;"><b>Student Registration</b></h1>
        <input type="text" class="login-input" name="rollno" placeholder="Roll Number" style="border-radius:4mm;border:2px solid black;" required />
        <input type="text" class="login-input" name="fname" placeholder="First Name" style="border-radius:4mm;border:2px solid black;" required />
        <input type="text" class="login-input" name="mname" placeholder="Middle Name" style="border-radius:4mm;border:2px solid black;"/>
        <input type="text" class="login-input" name="lname" placeholder="Last Name" style="border-radius:4mm;border:2px solid black;" required />
        <input type="email" class="login-input" name="email" placeholder="Email Adress" style="border-radius:4mm;border:2px solid black;" required />
        <input type="text" class="login-input" name="ug_college" placeholder="UG college" style="border-radius:4mm;border:2px solid black;" />
        <input type="text" class="login-input" name="pg_college" placeholder="PG college" style="border-radius:4mm;border:2px solid black;" />
        <div style="font-size: 115%">
        <label for="programs" >Choose program:</label>
        <select id="programs" name="prog_name">
		    <option value="MSc MnC">MSc MnC</option>
		    <option value="MTech CSE">MTech CSE</option>
		    <option value="BTech CSE">BTech CSE</option>
		    <option value="BTech MnC">BTech MnC</option>
			<option value="Phd">Phd</option>
		  </select>
		</div>
		 <br>
        <input type="number" step=0.01 class="login-input" name="tenth_per" placeholder="10th percentage" style="border-radius:4mm;border:2px solid black;" required />
        <input type="number" step=0.01 class="login-input" name="twelveth_per" placeholder="12th percentage" style="border-radius:4mm;border:2px solid black;" required />
        <input type="number" step=0.01 class="login-input" name="ugcpi" placeholder="UG cpi" style="border-radius:4mm;border:2px solid black;" required />
        <input type="number" step=0.01 class="login-input" name="pgcpi" placeholder="PG cpi" style="border-radius:4mm;border:2px solid black;" />
        <input type="number" step=0.01 class="login-input" name="phdcpi" placeholder="PhD cpi" style="border-radius:4mm;border:2px solid black;" />
        <input type="password" class="login-input" name="passwd" placeholder="Password" style="border-radius:4mm;border:2px solid black;" required/>
        <input type="submit" name="submit" value="Register" class="login-button" />
        <p class="link" style="font-size:22px;"><a href="std_login.php"><b>Click to Login</b></a></p>
    </form>
</body>
</html>


<?php
	require_once'db.php';

	if(isset($_POST['submit']))
	{		
		$rollno = $_POST['rollno'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$ug_college = $_POST['ug_college'];
		//$pg_college = $_POST['pg_college'];
		if(strlen($_POST['pg_college']))
			$pg_college = $_POST['pg_college'];
			else
			$pg_college="NIL";

		$prog_name = $_POST['prog_name'];
		$tenth_per = $_POST['tenth_per'];
		$twelveth_per = $_POST['twelveth_per'];
		$ugcpi = $_POST['ugcpi'];
		if(strlen($_POST['pgcpi']))
			$pgcpi = $_POST['pgcpi'];
		else
			$pgcpi = -1;
		if(strlen($_POST['phdcpi']))
			$phdcpi = $_POST['phdcpi'];
		else
			$phdcpi = -1;
			$ps=md5($_POST['passwd']);
		$passwd = $ps;
		
		$sql = "INSERT INTO plcmtportal.student(rollno, fname, mname, lname, email, ug_college, pg_college, prog_name, tenth_per, twelveth_per, ug_cpi, pg_cpi, phd_cpi, passwd) VALUES(:rollno, :fname, :mname, :lname, :email, :ug_college, :pg_college, :prog_name, :tenth_per, :twelveth_per, :ugcpi, :pgcpi, :phdcpi, :passwd)";
		$stmt = $conn->prepare($sql);
		try{
		$res = $stmt->execute(
			array(
				':rollno' => $rollno,
				':fname' => $fname,
				':mname' => $mname,
				':lname' => $lname,
				':email' => $email,
				':ug_college' => $ug_college,
				':pg_college' => $pg_college,
				':prog_name' => $prog_name,
				':tenth_per' => $tenth_per,
				':twelveth_per' => $twelveth_per,
				':ugcpi' => $ugcpi,
				':pgcpi' => $pgcpi,
				':phdcpi' => $phdcpi,
				':passwd' => $passwd
			)
		);
		echo "<h2 style=color:white;text-align:center;font-size:40px;>Student Registered Successfully!</h2>";
	}
	catch(PDOException $e)
{
    echo "<h2 style=color:red;text-align:center;font-size:40px;>Student already exists!</h2>";
}
		//var_dump($res);
	}

?>








