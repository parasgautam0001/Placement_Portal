<?php
	session_start();
	if(sizeof($_SESSION)==0)
		header("Location: std_login.php");
	$str="Hello";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/customstyle.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
h1 {text-align: center;}
form{
    text-align: center;
}
.header {
  padding: 5px;
  text-align: center;
  /* background: lightblue; */
  /* color: white ; */
  font-size: 25px;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 4px;
}
.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
  border-radius: 4px;
}
.button2:hover {
  background-color: #008CBA;
  color: white;
  border-radius: 4px;
}
/* ul {
  list-style-type: none;
  margin: 0;
  padding: 10;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
} */

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
</head>
<body style="background-image: url('img/resume.jpg');">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4" style="font-size:25px;">
		<a class="navbar-brand mb-0 h1" href="#">
			<!-- <img src="images/welcome.png" width=150 height=70></img> -->
		 	<?php echo "Welcome ".$_SESSION['name'] ?>
		</a>
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
    	</button>

    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
		      	<a class="nav-link" href="resume.php">Upload Resume</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="std_db_jobs.php">Eligible jobs <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		      	<a class="nav-link" href="std_db_timeslots.php">Time slots</a>
		      </li>
  			</ul>

  			<form class="form-inline" action="" method="post">
    			<input class="btn btn-sm btn-outline-primary" style="font-weight:bold;" type="submit" name="logout" value="Log Out"/>
  			</form>
  		</div>

	</nav>
  <br>
<div class="header">
<h1>Upload Your Resume</h1>
</div>
<br>
<br>
<form action="" method="POST">
  <label for="myfile" style="font-size:22px;"><b>Resume : 1</b></label>
  <input type="file" id="myfile1" name="myfile1" class="button button2"><br><br>
  <label for="myfile" style="font-size:22px;"><b>Resume : 2</b></label>
  <input type="file" id="myfile2" name="myfile2" class="button button2"><br><br>
  <label for="myfile" style="font-size:22px;"><b>Resume : 3</b></label>
  <input type="file" id="myfile3" name="myfile3" class="button button2"><br><br>
  <input type="submit" class="button button2">
</form>
</body>
</html>
<?php
require('db.php');
if(strlen($_POST['myfile1'])){
$resumeno=1;
$rollno=$_SESSION['rollno'];
$myfile1=$_POST['myfile1'];
$sql = "INSERT INTO plcmtportal.resume(resumeno,rollno,resumee) VALUES(:resumeno,:rollno,:myfile1)";
$stmt = $conn->prepare($sql);
try{
$res = $stmt->execute(
  array(
    ':resumeno' => $resumeno,
    ':rollno' => $rollno
    ,':myfile1' => $myfile1
  )
  );
  echo "<h2 style=color:green;text-align:center;>Resume 1 added successfully!</h2>";
}
catch(PDOException $e)
{
    echo "<h2 style=color:red;text-align:center;>You have already uploaded your Resume 1</h2>";
}
}
if(strlen($_POST['myfile2']))
{
  $resumeno=2;
$rollno=$_SESSION['rollno'];
$myfile2=$_POST['myfile2'];
$sql = "INSERT INTO plcmtportal.resume(resumeno,rollno,resumee) VALUES(:resumeno,:rollno,:myfile2)";
$stmt = $conn->prepare($sql);
try{
$res = $stmt->execute(
  array(
    ':resumeno' => $resumeno,
    ':rollno' => $rollno
    ,':myfile2' => $myfile2
  )
  );
  echo "<h2 style=color:green;text-align:center;>Resume 2 added successfully!</h2>";
}
catch(PDOException $e)
{
  echo "<h2 style=color:red;text-align:center;>You have already uploaded your Resume 2</h2>";
}
}
if(strlen($_POST['myfile3']))
{
  $resumeno=3;
$rollno=$_SESSION['rollno'];
$myfile3=$_POST['myfile3'];
$sql = "INSERT INTO plcmtportal.resume(resumeno,rollno,resumee) VALUES(:resumeno,:rollno,:myfile3)";
$stmt = $conn->prepare($sql);
try{
$res = $stmt->execute(
  array(
    ':resumeno' => $resumeno,
    ':rollno' => $rollno
    ,':myfile3' => $myfile3
  )
  );
  echo "<h2 style=color:green;text-align:center;>Resume 3 added successfully!</h2>";
}
catch(PDOException $e)
{
  echo "<h2 style=color:red;text-align:center;>You have already uploaded your Resume 3</h2>";
}
}


?>
<?php

	if(isset($_POST['logout']))
	{	
		session_unset();
		session_destroy();
		header("Location:std_login.php");
	}

?>