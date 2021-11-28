<!DOCTYPE html>
<html>
<head>
	<title>Job Registration</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<style type="text/css">
    body{
        background-image:url('images/com_login.png');
        background-repeat:no-repeat;
        background-size:100% 100%;
    }
	</style>
<body>
	<form class="form" action="" method="post" style="border-radius:8mm;border:4px solid black;">
        <h1 class="login-title" style="font-size:35px;color:black;"><b>Job registration</b></h1>
        <input type="text" class="login-input" name="company_name" placeholder="Company Name" style="border-radius:4mm;border:2px solid black;" required />
        <input type="text" class="login-input" name="profile_name" placeholder="Profile Name" style="border-radius:4mm;border:2px solid black;" required />
        <input type="text" class="login-input" name="job_details" placeholder="Job Details" style="border-radius:4mm;border:2px solid black;"/>
        <input type="date" class="login-input" name="application_deadline" placeholder="Application deadline" style="border-radius:4mm;border:2px solid black;" required />
        <input type="number" class="login-input" name="ctc" placeholder="CTC" style="border-radius:4mm;border:2px solid black;" required />
        <input type="password" class="login-input" name="passwd" placeholder="Password" style="border-radius:4mm;border:2px solid black;" required />
        <input type="submit" name="sub" value="Register" class="login-button" />
        <p class="link" style=font-size:18px;font-weight:bold;><a href="job_login.php"><b>Click to Login</b></a></p>
    </form>
</body>
</html>

<?php 
	require('db.php');

	if(isset($_POST['sub']))
	{
		$company_name = $_POST['company_name'];
		$profile_name = $_POST['profile_name'];
		$job_details = $_POST['job_details'];
		$application_deadline = $_POST['application_deadline'];
		$ctc = $_POST['ctc'];
		$passwd = md5($_POST['passwd']);

		$sql = "INSERT INTO plcmtportal.jobs(company_name, profile_name, job_details, application_deadline, ctc, password) VALUES (:company_name, :profile_name, :job_details, :application_deadline, :ctc, :passwd)";
		$stmt = $conn->prepare($sql);
		try{
		$res = $stmt->execute(
			array(
				':company_name' => $company_name,
				':profile_name' => $profile_name,
				':job_details' => $job_details,
				':application_deadline' => $application_deadline,
				':ctc' => $ctc, 
				':passwd' => $passwd
			)
		);
		echo "<h2 style=color:green;text-align:center;font-size:40px;>Company Registered Successfully!</h2>";
	}
	catch(PDOException $e)
{
    echo "<h2 style=color:red;text-align:center;font-size:40px;>Company already registered!</h2>";
}
	}

?>
