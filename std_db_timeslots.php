<?php
	session_start();
	if(sizeof($_SESSION)==0)
		header("Location: std_login.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Student Dashboard</title>

	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/customstyle.css">
<style type="text/css">
	.dtable{
		margin: 10mm;
		border-style: solid;
		border-width: 2px; 
		padding: 3mm; 
	}
</style>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="font-size:25px;">
		<a class="navbar-brand mb-0 h1" href="#">
		 	<?php echo "Welcome ".$_SESSION['name'] ?>
		</a>
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
    	</button>

    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
		      	<a class="nav-link" href="resume.php">Upload Resume</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="std_db_jobs.php">Eligible jobs <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item active">
		      	<a class="nav-link" href="std_db_timeslots.php">Time slots</a>
		      </li>
  			</ul>

  			<form class="form-inline" action="" method="post">
    			<input class="btn btn-sm btn-outline-primary" style="font-weight:bold;" type="submit" name="logout" value="Log Out"/>
  			</form>
  		</div>

	</nav>

	<div class="dtable" style="border:6px solid black;border-radius:8mm;border-color:green;">
		<h1 class=text-center>Schedule</h1>
		<br>
		<table class="table">
	  		<thead class="text-center bg-info">
	  			<th scope="col" style=font-size:24px;> Company Name </th>
	  			<th scope="col" style=font-size:24px;> Profile name</th>
	  			<th scope="col" style=font-size:24px;> Start time</th>
	  			<th scope="col" style=font-size:24px;> End time</th>
	  			<th scope="col" style=font-size:24px;> Purpose</th>
	  			<th scope="col" style=font-size:24px;> Links</th>
	  		</thead>
	  		<tbody>
	  		
	  		<?php
	  			require('db.php');

	  			$sql = "SELECT * FROM plcmtportal.time_slots T, plcmtportal.application A, plcmtportal.student S WHERE T.profile_name=A.profile_name AND T.company_name=A.company_name AND A.rollno=S.rollno AND A.statas='applied' AND T.start_time>=now() AND S.rollno=".$_SESSION['rollno']." ORDER BY T.start_time";
	  			$stmt = $conn->query($sql);

	  			while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	  				echo "<tr class='table-success text-center'><td style=font-size:18px;font-weight:bold;>";
					echo $row['company_name'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";
					echo $row['profile_name'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";
					echo $row['start_time'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";
					echo $row['end_time'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";
					echo $row['purpose'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";
					echo $row['links'];
					echo "</td></tr>";
	  			}
	  		?>
	  		</tbody>
	  	</table>
	</div>  		


	<!-- jQuery (Bootstrap JS plugins depend on it) -->
	<script type="bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
	<script type="bootstrap-4.5.3-dist/js/bootstrp.min.js"></script>
	<script type="bootstrap-4.5.3-dist/js/script.js"></script>
</body>
</html>

<?php

	if(isset($_POST['logout']))
	{	
		session_unset();
		session_destroy();
		header("Location:std_login.php");
	}

?>