<?php
	include "connection.php";
	$msg = "";
	if(isset($_POST['btn_sub']))
	{
		session_start();
		header('location:adminlogin.php');
		
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['mail'];
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
		$chk = "SELECT * FROM Admin WHERE username = '$uname'";
		$result = mysqli_query($con,$chk);
		$num = mysqli_num_rows($result);
		if($num == 1)
		{
			$msg = "Username already taken";
		}else{
			$siup = "INSERT INTO Admin (firstname,lastname,email,username,password) VALUES ('$fname','$lname','$email','$uname','$pass')";
			mysqli_query($con,$siup);
			$msg = "Signup successfuly";
			header('location:adminlogin.php');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/adminsignup.css">
	<title>Sign up Admin</title>
</head>
<body>
	<div id="outer">
		<div id="main">
			<div id="titletop">
				<h1>Signup As Admin!</h1>
			</div>
			<div id="return">
				<h3><a href="index.html">Return to Home</a></h3>
			</div>
			<div id="submain">
				<div id="formholder">
					<h1>Admin Signup</h1>
					<form method="post">
						<br>First Name : 
						<input type="text" name="fname" required="required"><br><br><br>
						Last Name : 
						<input type="text" name="lname"><br><br><br>
						Email : 
						<input type="email" name="mail" placeholder="name@domain.com"><br><br><br>
						Username : 
						<input type="text" name="uname" required="required"><br><br><br>
						Password : 
						<input type="password" name="pass" required="required">
						<br>
						<p style="color: red"><?php echo $msg; ?></p>
						<br>
						<input type="submit" name="btn_sub" id="btn_sub" value="Sign Up">
					</form>
				</div>
				<div id="msgbottom">
					<p>
						Already have an acccount?
						<a href="adminlogin.php">Login here</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>