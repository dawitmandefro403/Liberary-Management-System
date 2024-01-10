<?php
	include "connection.php";

	if(isset($_GET['in'])){
		$in = $_GET['in'];
		$delete = mysqli_query($con,"DELETE FROM issue_book WHERE idnumber='$in'");
	}

	$select = "SELECT * FROM issue_book";
	$query = mysqli_query($con,$select);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/issuedbyadmin.css">
	<title>Student Login</title>
</head>
<body>
	<div id="outer">
		<div id="main">
			<div id="titletop">
				<h1>Issued Book to Student !</h1>
			</div>
			<div id="return">
				<h3><a href="adminmenus.php">Return to Home</a></h3>
			</div>
			<div id="submain">
				<table id="tbl" border="1">
					<thead>
						<tr>
							<th>No.</th>
							<th>Student Name</th>
							<th>ID Number</th>
							<th>Book Name</th>
							<th>Issue Date</th>
							<th>Expiry Date</th>
							<th>Fine</th>
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
										<td>".$row['studentname']."</td>
										<td>".$row['idnumber']."</td>
										<td>".$row['bookname']."</td>
										<td>".$row['issuedate']."</td>
										<td>".$row['expirydate']."</td>
										<td>".$row['fine']."</td>
										<td>
										<a href='issuedbyadmin.php?in=".$row['idnumber']."'>Delete</a>
										<a href='issuebookupdate.php?sn=".$row['studentname']."&in=".$row['idnumber']."&bn=".$row['bookname']."&issu=".$row['issuedate']."&ed=".$row['expirydate']."&fi=".$row['fine']."'>Update</a>
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