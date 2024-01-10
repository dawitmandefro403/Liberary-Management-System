<?php
	include "connection.php";
	$msg = "";
	if(isset($_POST['btn_sub']))
	{
		session_start();
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$idnum =$_POST['idnum'];
		$dep = $_POST['dep'];
		$email = $_POST['mail'];
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
		$chk = "SELECT * FROM Student WHERE username = '$uname'";
		$result = mysqli_query($con,$chk);
		$num = mysqli_num_rows($result);
		if($num == 1)
		{
			$msg = "Username already taken";
		}else{
			$siup = "INSERT INTO Student (firstname,lastname,idnumber,department,email,username,password) VALUES ('$fname','$lname','$idnum','$dep','$email','$uname','$pass')";
			mysqli_query($con,$siup);
			$msg = "Signup successfuly";
			header('location:studentlogin.php');
		}
	}
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
				<h1>Signup As Student!</h1>
			</div>
			<div id="return">
				<h3><a href="index.html">Return to Home</a></h3>
			</div>
			<div id="submain">
				<div id="formholder">
					<h1>Student Signup</h1>
					<form method="post">
						First Name : 
						<input type="text" name="fname" required><br><br>
						Last Name : 
						<input type="text" name="lname"><br><br>
						ID Number : 
						<input type="text" name="idnum" required><br><br>
						<label for="bname">Department :</label>
					    <select id="bname" name="dep">
						    <option value="default">------</option>
						    <option value="Software">Software</option>
						    <option value="Computer Science">Computer Science</option>
						    <option value="Information Technology">Information Technology</option>
						    <option value="Civil">Civil</option>
					    </select><br><br>
						Email : 
						<input type="email" name="mail" placeholder="name@domain.com"><br><br>
						Username : 
						<input type="text" name="uname" required><br><br>
						Password : 
						<input type="password" name="pass" required>
						<br>
						<p style="color: red"><?php echo $msg; ?></p>
						<input type="submit" name="btn_sub" id="btn_sub" value="Sign Up">
					</form>
				</div>
				<div id="msgbottom">
					<p>
						Already have an acccount?
						<a href="studentlogin.php">Login here</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>