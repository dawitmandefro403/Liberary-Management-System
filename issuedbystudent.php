<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/issuedbystudent.css">
	<title>Student Login</title>
</head>
<body>
	<div id="outer">
		<div id="main">
			<div id="titletop">
				<h1>List of Issued Books !</h1>
			</div>
			<div id="return">
				<h3><a href="studentmenus.php">Return to Home</a></h3>
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
						</tr>
					</thead>
					<tbody>
						<?php
								include "connection.php";
								$sql = "SELECT * FROM Issue_Book";
								$result = mysqli_query($con,$sql);
								$num = 0;
								while ($row=mysqli_fetch_array($result)) 
								{
									$num++;
							?>
						<tr>
							<td><?php echo $num; ?></td>
							<td><?php echo $row['studentname']; ?></td>
							<td><?php echo $row['idnumber']; ?></td>
							<td><?php echo $row['bookname']; ?></td>
							<td><?php echo $row['issuedate']; ?></td>
							<td><?php echo $row['expirydate']; ?></td>
							<td><?php echo $row['fine']; ?></td>
						</tr>
						<?php 
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