<?php
	session_start();
	if(sizeof($_SESSION)==0)
		header("Location: job_login.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Company Dashboard</title>

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
		 	<?php echo $_SESSION['company_name']." : ".$_SESSION['profile_name'] ?>
		</a>
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
    	</button>

    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="job_db_app.php">Students Applications <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item active">
		      	<a class="nav-link" href="job_db_eligibility.php">Eligibility</a>
		      </li>
		      <li class="nav-item">
		      	<a class="nav-link" href="job_db_schedule.php">Schedule</a>
		      </li>
  			</ul>

  			<form class="form-inline" action="" method="post">
    			<input class="btn btn-sm btn-outline-primary" type="submit" style="font-weight:bold;" name="logout" value="Log Out"/>
  			</form>
  		</div>

	</nav>

<br>
<div class="container">
  	<h1 class="text-center">Insert Program</h1>
  	<br>
  	<form method="post" action="" >
  		<div class="form-group">
  		<label for="programs">Choose program:</label>
		  <select id="programs" name="prog_name" class="form-control">
		    <option value="MSc MnC">MSc MnC</option>
		    <option value="MTech CSE">MTech CSE</option>
		    <option value="BTechCSE">BTech CSE</option>
		    <option value="BTech MnC">BTech MnC</option>
		  </select>
		</div>
		<div class="form-group">
		  	Enter 10th percentage criteria : 
			<input type="number" step="0.01" name="tenth_per_crt" class="form-control"/>
		</div>
		<div class="form-group">
		  Enter 12th percentage criteria : 
		<input type="number" step="0.01" name="twelveth_per_crt" class="form-control" />
		</div>
		<div class="form-group">
		  Enter UG percentage criteria : 
		<input type="number" step="0.01" name="ug_cpi_crt" class="form-control" />
		</div>
		<div class="form-group">
		  Enter PG percentage criteria : 
		<input type="number" step="0.01" name="pg_cpi_crt" class="form-control"/>
		</div>
		<div class="form-group">
		  Enter PhD percentage criteria : 
		<input type="number" step="0.01" name="phd_cpi_crt" class="form-control"/>
		</div>
		<div class="form-group text-center">
  		<input type="submit" class='btn btn-primary' name="sub" >
		</div>
  	</form>
</div>

	<br>
	

	<div class="dtable" style="border:6px solid black;border-radius:8mm;border-color:green;">
		<h1 class="text-center"> Eligibile programs with criterias</h1>
		<br>
		<table class="table">
	  		<thead class="text-center bg-info">
	  			<th scope="col" style=font-size:24px;> Program </th>
	  			<th scope="col" style=font-size:24px;> 10th per criteria</th>
	  			<th scope="col" style=font-size:24px;> 12th per criteria</th>
	  			<th scope="col" style=font-size:24px;> UG cpi criteria</th>
	  			<th scope="col" style=font-size:24px;> PG cpi criteria</th>
	  			<th scope="col" style=font-size:24px;> PhD cpi criteria</th>
	  		</thead>
	  		<tbody>
	  		
	  		<?php
	  			require('db.php');
	  			$sql = "SELECT * FROM plcmtportal.eligible WHERE eligible.profile_name='".$_SESSION['profile_name']."' AND eligible.company_name='".$_SESSION['company_name']."'";
	  			
	  			$stmt = $conn->query($sql);

	  			while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
					echo "<tr class='table-success text-center'><td style=font-size:18px;font-weight:bold;>";
					echo $row['prog_name'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";
					echo $row['tenth_per_crt'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";
					echo $row['twelveth_per_crt'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";
					echo $row['ug_cpi_crt'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";
					echo $row['pg_cpi_crt'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";
					echo $row['phd_cpi_crt'];
					echo "</td></tr>";
				}
	  		?>


	  		</tbody>
	  	</table>
  	</div><br>

	<!-- jQuery (Bootstrap JS plugins depend on it) -->
	<script type="bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
	<script type="bootstrap-4.5.3-dist/js/bootstrp.min.js"></script>
	<script type="bootstrap-4.5.3-dist/js/script.js"></script>
</body>
</html>

<?php

	if(isset($_POST['sub']))
	{
		require('db.php');

		$prog_name = $_POST['prog_name'];
		if(strlen($_POST['tenth_per_crt']))
			$tenth_per_crt = $_POST['tenth_per_crt'];
		else
			$tenth_per_crt = 0;
		if(strlen($_POST['twelveth_per_crt']))
			$twelveth_per_crt = $_POST['twelveth_per_crt'];
		else
			$twelveth_per_crt = 0;
		if(strlen($_POST['ug_cpi_crt']))	
			$ug_cpi_crt = $_POST['ug_cpi_crt'];
		else
			$ug_cpi_crt = 0;
		if(strlen($_POST['pg_cpi_crt']))
			$pg_cpi_crt = $_POST['pg_cpi_crt'];
		else
			$pg_cpi_crt = 0;
		if(strlen($_POST['phd_cpi_crt']))
			$phd_cpi_crt = $_POST['phd_cpi_crt'];
		else
			$phd_cpi_crt = 0;


		$sql = "INSERT INTO plcmtportal.eligible(company_name, profile_name, prog_name, tenth_per_crt, twelveth_per_crt, ug_cpi_crt, pg_cpi_crt, phd_cpi_crt) VALUES (:company_name, :profile_name, :prog_name, :tenth_per_crt, :twelveth_per_crt, :ug_cpi_crt, :pg_cpi_crt, :phd_cpi_crt)";
		$stmt = $conn->prepare($sql);
		$res = $stmt->execute(
			array(
				':company_name' => $_SESSION['company_name'],
				':profile_name' => $_SESSION['profile_name'],
				':prog_name' => $prog_name,
				':tenth_per_crt' => $tenth_per_crt,
				':twelveth_per_crt' => $twelveth_per_crt,
				':ug_cpi_crt' => $ug_cpi_crt,
				':pg_cpi_crt' => $pg_cpi_crt,
				':phd_cpi_crt' => $phd_cpi_crt
			)
		);
		header("Location:job_db_eligibility.php");
	}

	if(isset($_POST['logout']))
	{	
		session_unset();
		session_destroy();
		header("Location:job_login.php");
	}

?>