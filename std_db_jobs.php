<?php
	session_start();
	if(sizeof($_SESSION)==0)
		header("Location: std_login.php");
	$str="Hello";
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style type="text/css">
	.dtable{
		margin: 10mm;
		border-style: solid;
		border-width: 2px; 
		padding: 3mm; 
	}
	.but:disabled{
	  border: 1px solid #999999;
	  background-color: #cccccc;
	  color: #666666;
	}
</style>
</head>




<!-- <script>var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})</script> -->



<body>
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
			<li class="nav-item">
		      	<a class="nav-link" href="resume.php">Upload Resume</a>
		      </li>
		      <li class="nav-item active">
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

	<?php
	require('db.php');
	
			 $stmtt="SELECT COUNT(*) as total FROM plcmtportal.application WHERE rollno=".$_SESSION['rollno'];
			 $resulti=$conn->query($stmtt);
			 $data=$resulti->fetch(PDO::FETCH_ASSOC);
			 ?><h1 style=font-weight:bold;color:green;font-size:35px;text-align:center;> You have applied for 
			 <?php
			 echo $data['total'];?> jobs in total!</h1>
			 <?php
			 if($data['total']==5){
				 ?><h2 style=font-weight:bold;color:red;font-size:30px;text-align:center;> Your Profile Limit Exceeded!</h2>
				 <?php
				}
				?>
	



	<div class="dtable" style="border:6px solid black;border-radius:8mm;border-color:green;">
		<h1 class=text-center>Eligibile Jobs</h1>
		<br>
		<table class="table">
	  		<thead class="text-center bg-info">
	  			<th scope="col" style=font-size:24px;> Company_name </th>
	  			<th scope="col" style=font-size:24px;> Profile_name</th>
	  			<th scope="col" style=font-size:24px;> Application Deadline</th>
	  			<th scope="col" style=font-size:24px;> CTC (in LPA)</th>
	  			<th scope="col" style=font-size:24px;> Apply</th>
	  		</thead>
	  		<tbody>
	  		
	  		<?php

	  			$sql = "SELECT J.profile_name, J.company_name, J.application_deadline, J.ctc FROM plcmtportal.Jobs J, plcmtportal.Eligible E, plcmtportal.Program P, plcmtportal.Student S WHERE J.profile_name=E.profile_name AND J.company_name=E.company_name AND E.prog_name=P.prog_name AND S.prog_name=P.prog_name AND S.rollno=".$_SESSION['rollno']." AND S.tenth_per>=E.tenth_per_crt AND S.twelveth_per>=E.twelveth_per_crt AND S.ug_cpi>=E.ug_cpi_crt AND (S.pg_cpi=-1 OR S.pg_cpi>=E.pg_cpi_crt) AND (S.phd_cpi=-1 OR S.phd_cpi>=E.phd_cpi_crt) AND J.application_deadline>=now()";
	  			
	  			$stmt = $conn->query($sql);

	  			$i=1;
	  			$memo = array(array());

	  			while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
					echo "<tr class='table-success text-center'><td style=font-size:18px;font-weight:bold;>";
					echo $row['company_name'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";
					echo $row['profile_name'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";
					echo $row['application_deadline'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";
					echo $row['ctc'];
					echo "</td><td style=font-size:18px;font-weight:bold;>";

					$sql2 = "SELECT * FROM plcmtportal.application A, plcmtportal.student S WHERE A.rollno=S.rollno AND A.company_name='".$row['company_name']."' AND A.profile_name='".$row['profile_name']."' AND A.rollno=".$_SESSION['rollno'];
					
					$stmt2 = $conn->query($sql2);
					$row2=$stmt2->fetch(PDO::FETCH_ASSOC);

					if($row2){
						echo "<form method='post'><input class='btn btn-danger' type='submit' value='Withdraw' name='sub".$i."'></form>";
						
					}
					else{
						
						echo "<form method='post'><input class='btn btn-primary' type='submit' value='Apply' name='sub".$i."'></form>";
						
					}
					echo "</td><td>";
					echo "</td></tr>";

					$arr = array($i, $row['company_name'], $row['profile_name']);
					
					array_push($memo, $arr);

					$i++;
				}
	  		?>
	  		</tbody>
	  	</table>
	</div>


	<!-- jQuery (Bootstrap JS plugins depend on it) -->
	<script type="bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>
	<script type="bootstrap-4.5.3-dist/js/bootstrp.min.js"></script>
	<script type="bootstrap-4.5.3-dist/js/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<?php
	
	for($i=1; $i<sizeof($memo); $i++)
	{
		$str = "sub".$i;
		if(isset($_POST[$str]))
		{
			$rollno = $_SESSION['rollno'];
			$prog_name = $_SESSION['prog_name'];
			$company_name = $memo[$i][1];
			$profile_name = $memo[$i][2];

			$sqli = "SELECT * FROM plcmtportal.application A WHERE A.company_name='".$company_name."' AND A.profile_name='".$profile_name."' AND A.rollno=".$_SESSION['rollno'];
			$stmti = $conn->query($sqli);
			$rowi=$stmti->fetch(PDO::FETCH_ASSOC);
			if($rowi)
			{
				$sql = "DELETE FROM plcmtportal.application WHERE company_name='".$company_name."' AND profile_name='".$profile_name."' AND rollno=".$rollno;
				$stmt=$conn->query($sql);
			}
			
			else {
				$stmtt="SELECT COUNT(*) as total FROM plcmtportal.application WHERE rollno=".$_SESSION['rollno'];
				$resulti=$conn->query($stmtt);
				$data=$resulti->fetch(PDO::FETCH_ASSOC);
				if($data['total']<5){
				$sql = "INSERT INTO plcmtportal.application(rollno,prog_name,company_name,profile_name,statas) VALUES (:rollno, :prog_name, :company_name, :profile_name, :statas)";
			$stmt = $conn->prepare($sql);
			$stmt->execute(
				array(
					':rollno'=>$rollno,
					':prog_name'=>$prog_name,
					':company_name'=>$company_name,
					':profile_name'=>$profile_name,
					':statas'=>"Applied"
				)
			);
		}
		}
			header('Location:std_db_jobs.php');
		}
	}

	if(isset($_POST['logout']))
	{	
		session_unset();
		session_destroy();
		header("Location:std_login.php");
	}

?>