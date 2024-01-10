<?php
    include "connection.php";
    //error_reporting(0);
		$sn = $_GET['sn'];
		$in = $_GET['in'];
		$bn =$_GET['bn'];
		$issu = $_GET['issu'];
		$ed = $_GET['ed'];
		$fi = $_GET['fi'];
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
				<h1>Update Issue Book to Student !</h1>
			</div>
			<div id="return">
				<h3><a href="adminmenus.php">Return to Home</a></h3>
			</div>
			<div id="submain">
				<div id="formholder">
					<h1>Update Issue Book</h1>
					<form method="post">
						<br><label for="idnumber">ID Number:</label>
					    <input type="text" id="idnumber" name="idnumber" value="<?php echo $in;?>" disabled>
					    <br><br><br>
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
						<input type="submit" name="btn_sub" id="btn_sub" value="Update">
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
<?php
	include "connection.php";
	if(isset($_POST['btn_sub']))
	{
		$msg = "";
		$sql = "SELECT * FROM Student";
		$result = mysqli_query($con,$sql);
		while($row=mysqli_fetch_assoc($result))
		{
			$fname = $row['firstname'];
		}
		$idnumber =$_POST['idnumber'];
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
		$sql_update = "UPDATE issue_book SET studentname='$fname', idnumber='$idnumber', bookname='$bname', issuedate='$issuedate', expirydate='$expirydate', fine='$fine' WHERE idnumber='$idnumber'";
		$result_update = mysqli_query($con,$sql_update);
		if(!$result_update)
		{
			$msg = "Update Failed, Try Again";
		}
		$msg = "Update Success !";
		header("Location: issuedbyadmin.php");
	}
?>