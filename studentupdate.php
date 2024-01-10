<?php
    include "connection.php";
    error_reporting(0);
		$fn=$_GET['fn'];
		$ln = $_GET['ln'];
		$in = $_GET['in'];
		$dep =$_GET['dep'];
		$eml = $_GET['eml'];
		$un = $_GET['un'];
		$pd = $_GET['pd'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/studentsignup.css">
	<title>Sign up Student</title>
</head>
<body>
	<div id="outer">
		<div id="main">
			<div id="titletop">
				<h1>Update the Student!</h1>
			</div>
			<div id="submain">
				<div id="formholder">
					<h1>Student Update</h1>
					<form method="post">
						First Name : 
						<input type="text" name="fname" required value="<?php echo $fn;?>"><br><br>
						Last Name : 
						<input type="text" name="lname" value="<?php echo $ln;?>"><br><br>
						ID Number : 
						<input type="text" name="idnum" required value="<?php echo $in;?>"><br><br>
						<label for="bname">Department :</label>
					    <select id="bname" name="dep" required>
						    <option value="default">------</option>
						    <option value="Software">Software</option>
						    <option value="Computer Science">Computer Science</option>
						    <option value="Information Technology">Information Technology</option>
						    <option value="Civil">Civil</option>
					    </select><br><br>
						Email : 
						<input type="email" name="mail" placeholder="name@domain.com" value="<?php echo $eml;?>"><br><br>
						Username : 
						<input type="text" name="uname" required value="<?php echo $un;?>"><br><br>
						Password : 
						<input type="password" name="pass" required value="<?php echo $pd;?>">
						<br><br>
						<input type="submit" name="btn_sub" id="btn_sub" value="Update">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	if(isset($_POST['btn_sub']))
	{
		$msg = "";
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$idnum =$_POST['idnum'];
		$dep =$_POST['dep'];
		$mail = $_POST['mail'];
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
		$sql = "UPDATE Student SET firstname='$fname', lastname='$lname', idnumber='$idnum', department='$dep', email='$mail', username='$uname', password='$pass' WHERE username='$uname'";
		$result = mysqli_query($con,$sql);
		if(!$result)
		{
			$msg = "Update Failed, Try Again";
		}
		$msg = "Update Success !";
		header("Location: viewstudent.php");
	}
?>