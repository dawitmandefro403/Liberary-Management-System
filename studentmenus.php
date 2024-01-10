<?php
	session_start();
	if(!isset($_SESSION['user']))
	{
		header('location:studentlogin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/studentmenus.css">
	<title>Liberary Management System</title>
</head>
<body>
	<div id="outer">
		<div id="main">
			<div id="title">
				<h1>Hello, <?php echo $_SESSION['user'];?></h1>
				<p>As you are Student, you can see how many book you have taken from liberary with fine and many more...</p>
			</div>
			<div id="submain">
				<div id="div1">
					<a href="issuedbystudent.php">View Issued Book To You</a>
				</div>
				<div id="div2">
					<a href="studentlogin.php">Log Out</a>
				</div>
			</div>
		</div>
		<div id="foot">
			<p>Made in Arbaminch University</p>
			<p>Copyright &copy; 2022 G3 SE</p>
		</div>
	</div>
</body>
</html>