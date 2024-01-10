<?php
    include "connection.php";
	if(isset($_POST['btn_sub']))
	{
		$sql = "SELECT * FROM Student";
		$result = mysqli_query($con,$sql);
		while ($row=mysqli_fetch_array($result)) 
		{
			$fname = $row['firstname'];
		}
		$msg = "";
		$idnum =$_POST['idnum'];
		$bname = $_POST['bname'];
		$calday = 10+(date("d"));
		$calmonth = date("m");
		$calyear = date("Y");
		if($calday>31)
		{
			$calday = $calday - 31;
			if ($calmonth==12) 
			{
				$calmonth = $calmonth - 11;
			}
			elseif ($calmonth==12 && $calyear==2022) 
			{
				$calmonth = $calmonth - 11;
				$calyear++;
			}
			else{
				$calmonth++;
			}
		}
		$issuedate = date("d") ."-". date("m") ."-". date("Y");
		$expirydate = $calday ."-". $calmonth ."-". $calyear;
		$fine = $calday - (--$calday);
		$sql = "INSERT INTO issue_book (studentname, idnumber, bookname, issuedate, expirydate, fine) VALUES ('$fname','$idnum','$bname','$issuedate','$expirydate','$fine')";
		$result = mysqli_query($con,$sql);
		if(!$result)
		{
			$msg = "Signup Failed, Try Again";
			die('Adding record failed ' . mysqli_error($con));
		}
		$msg = "Signup Success !";
		header("Location: issuesuccess.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/issuebook.css">
	<title>Admin Login</title>
</head>
<body>
	<div id="outer">
		<div id="main">
			<div id="titletop">
				<h1>Issue Book To Student !</h1>
			</div>
			<div id="return">
				<h3><a href="adminmenus.php">Return to Home</a></h3>
			</div>
			<div id="submain">
				<div id="formholder">
					<h1>Issue Book To Student</h1>
					<form method="post">
						<br><label for="idnum">ID Number:</label>
					    <select id="idnum" name="idnum">
					    	<?php
								include "connection.php";
								$sql = "SELECT * FROM Student";
								$result = mysqli_query($con,$sql);
								while ($row=mysqli_fetch_array($result)) 
								{
							?>
						    <option value="<?php echo $row['idnumber']; ?>"><?php echo $row['idnumber']; ?></option>
							<?php 
								}
							?>
					    </select><br><br><br>
						<label for="bname">Book Name:</label>
					    <select id="bname" name="bname">
						    <?php
								include "connection.php";
								$sql = "SELECT * FROM Add_Book";
								$result = mysqli_query($con,$sql);
								while ($row=mysqli_fetch_array($result)) 
								{
							?>
						    <option value="<?php echo $row['bookname']; ?>"><?php echo $row['bookname']; ?></option>
							<?php 
								}
							?>
					    </select>
						<br><br><br>
						<input type="submit" name="btn_sub" id="btn_sub" value="Issue">
					</form>
				</div>
				<div id="msgbottom">
					<p>
						View Issued Book to Student
						<a href="issuedbyadmin.php">Click here</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>