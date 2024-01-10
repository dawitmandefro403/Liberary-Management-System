<?php
	session_start();
	if(!isset($_SESSION['user']))
	{
		header('location:adminlogin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/adminmenus.css">
	<title>Liberary Management System</title>
</head>
<body>
	<div id="outer">
		<div id="main">
			<div id="title">
				<h1>Hello, <?php echo $_SESSION['user'];?></h1>
				<p>As you are admin, you can add a book to liberary, issue books to students, View issued books to students and many more...</p>
			</div>
			<div id="submain">
				<div id="div1">
					<a href="addbook.php">Add Book To Liberary</a>
				</div>
				<div id="div2">
					<a href="availablebook.php">View Available Book</a>
				</div>
				<div id="div3">
					<a href="issuebook.php">Issue New Book</a>
				</div>
				<div id="div4">
					<a href="issuedbyadmin.php">View Issued Book</a>
				</div>
				<div id="div5">
					<a href="viewstudent.php">View Student</a>
				</div>
				<div id="div6">
					<a href="adminlogin.php">Log Out</a>
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