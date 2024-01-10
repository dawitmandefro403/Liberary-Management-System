<?php
	include "connection.php";

	if(isset($_GET['user'])){
		$user = $_GET['user'];
		$delete = mysqli_query($con,"DELETE FROM Student WHERE username='$user'");
	}
	$select = "SELECT * FROM Student";
	$query = mysqli_query($con,$select);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/viewstudent.css">
	<title>Student Login</title>
</head>
<body>
	<div id="outer">
		<div id="main">
			<div id="titletop">
				<h1>Student Registered in Liberary !</h1>
			</div>
			<div id="return">
				<h3><a href="adminmenus.php">Return to Home</a></h3>
			</div>
			<div id="submain">
				<table id="tbl" border="1">
					<thead>
						<tr>
							<th>No.</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>ID Number</th>
							<th>Department</th>
							<th>email</th>
							<th>Username</th>
							<th>Password</th>
							<th>Modify</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$count = 0;
							$num = mysqli_num_rows($query);
							if($num>0)
							{
							while ($row = mysqli_fetch_assoc($query)) 
								{
									$count++;
									echo "
									<tr>
										<td>".$count."</td>
										<td>".$row['firstname']."</td>
										<td>".$row['lastname']."</td>
										<td>".$row['idnumber']."</td>
										<td>".$row['department']."</td>
										<td>".$row['email']."</td>
										<td>".$row['username']."</td>
										<td>".$row['password']."</td>
										<td>
										<a href='viewstudent.php?user=".$row['username']."'>Delete</a>
										<a href='studentupdate.php?fn=".$row['firstname']."&ln=".$row['lastname']."&in=".$row['idnumber']."&dep=".$row['department']."&eml=".$row['email']."&un=".$row['username']."&pd=".$row['password']."'>Update</a>
										</td>
									</tr>
									";
								}		
							}
								
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div id="foot">
			<p>Made in Arbaminch University</p>
			<p>Copyright &copy; 2022 G3 SE</p>
		</div>
	</div>
</body>
</html>