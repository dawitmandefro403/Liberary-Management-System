<?php
    include "connection.php";
    //error_reporting(0);
		$bn = $_GET['bn'];
		$tail = $_GET['tail'];
		$auth =$_GET['auth'];
		$is = $_GET['is'];
		$gory = $_GET['gory'];
		$ice = $_GET['ice'];
		$quant = $_GET['quant'];
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
					<h1>Update Book</h1>
					<form method="post">
						Book Name : 
						<input type="text" name="bname" value="<?php echo $bn;?>"><br><br>
						Detail : 
						<input type="text" name="detail" value="<?php echo $tail;?>"><br><br>
						Author : 
						<input type="text" name="author" value="<?php echo $auth;?>"><br><br>
						ISBN : 
						<input type="text" name="isbn" value="<?php echo $is;?>"><br><br>
						<label for="category">Category :</label>
					    <select id="bname" name="category" required>
						    <option value="">--------</option>
						    <option value="Software">Software</option>
						    <option value="Computer Science">Computer Science</option>
						    <option value="Information Technology">Information Technology</option>
						    <option value="Civil">Civil</option>
					    </select><br><br>
						Price : 
						<input type="text" name="price" value="<?php echo $ice;?>"><br><br>
						Quantity : 
						<input type="text" name="quantity" value="<?php echo $quant;?>">
						<br><br>  
						<input type="submit" name="btn_sub" id="btn_sub" value="Update">
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
<?php
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
		$sql = "UPDATE add_book SET bookname='$bname', detail='$detail', author='$author', isbn='$isbn', category='$category', price='$price', quantity='$quantity' WHERE bookname='$bname'";
		$result = mysqli_query($con,$sql);
		if(!$result)
		{
			$msg = "Update Failed, Try Again";
		}
		$msg = "Update Success !";
		header("Location: availablebook.php");
	}
?>