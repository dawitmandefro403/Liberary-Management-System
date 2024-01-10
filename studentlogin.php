<?php
	include "connection.php";
	$msg = "";
	if(isset($_POST['btn_sub']))
	{
		session_start();
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
		$chk = "SELECT * FROM Student WHERE username = '$uname' && password = '$pass'";
		$result = mysqli_query($con,$chk);
		$num = mysqli_num_rows($result);
		if($num == 1)
		{
			$_SESSION['user'] = $uname;
			$msg = "Successfully Login";
			header('location:studentmenus.php');
		}else{
			$msg = "Login Failed, Try Again";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/adminlogin.css">
	<title>Student Login</title>
</head>
<body>
	<div id="outer">
		<div id="main">
			<div id="titletop">
				<h1>Login As Student</h1>
			</div>
			<div id="return">
				<h3><a href="index.html">Return to Home</a></h3>
			</div>
			<div id="submain">
				<div id="formholder">
					<h1>Student Login</h1>
					<form method="post">
						<br>Username :
						<input type="text" name="uname" required><br><br><br>
						Password :
						<input type="password" name="pass" required>
						<br>
						<p style="color: red"><?php echo $msg;?></p>
						<input type="submit" name="btn_sub" id="btn_sub" value="Login">
					</form>
				</div>
				<div id="msgbottom">
					<p>
						Do not have acccount?
						<a href="studentsignup.php">Signup here</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>