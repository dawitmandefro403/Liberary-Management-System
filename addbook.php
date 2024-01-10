<?php
    include "connection.php";
	if(isset($_POST['btn_sub']))
	{
		$msg = "";
		$bname = $_POST['bname'];
		$detail = $_POST['detail'];
		$author =$_POST['author'];
		$isbn = $_POST['isbn'];
		$category = $_POST['category'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$sql = "INSERT INTO add_book (bookname,detail,author,isbn,category,price,quantity) VALUES ('$bname','$detail','$author','$isbn','$category','$price','$quantity')";
		$result = mysqli_query($con,$sql);
		if(!$result)
		{
			$msg = "Signup Failed, Try Again";
			die('Adding record failed ' . mysqli_error($con));
		}
		$msg = "Signup Success !";
		header("Location: addbooksuccess.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/addbook.css">
	<title>Sign up Student</title>
</head>
<body>
	<div id="outer">
		<div id="main">
			<div id="titletop">
				<h1><a href="adminmenus.php">Return to Home</a></h1>
			</div>
			<div id="submain">
				<div id="formholder">
					<h1>Add Book</h1>
					<form method="post">
						Book Name : 
						<input type="text" name="bname" required><br><br>
						Detail : 
						<input type="text" name="detail"><br><br>
						Author : 
						<input type="text" name="author"><br><br>
						ISBN : 
						<input type="text" name="isbn" required><br><br>
						<label for="category">Category :</label>
					    <select id="bname" name="category">
						    <option value="default">------</option>
						    <option value="Software">Software</option>
						    <option value="Computer Science">Computer Science</option>
						    <option value="Information Technology">Information Technology</option>
						    <option value="Civil">Civil</option>
					    </select><br><br>
						Price : 
						<input type="text" name="price"><br><br>
						Quantity : 
						<input type="text" name="quantity" required>
						<br><br>  
						<input type="submit" name="btn_sub" id="btn_sub" value="ADD">
					</form>
				</div>
				<div id="msgbottom">
					<p>
						View available Book in Liberary
						<a href="availablebook.php">Click here</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>