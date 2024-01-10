<?php
	include "connection.php";

	if(isset($_GET['bn'])){
		$bn = $_GET['bn'];
		$delete = mysqli_query($con,"DELETE FROM add_book WHERE bookname='$bn'");
	}
	$select = "SELECT * FROM add_book";
	$query = mysqli_query($con,$select);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/availablebook.css">
	<title>Available Books</title>
</head>
<body>
	<div id="outer">
		<div id="main">
			<div id="titletop">
				<h1>Available Book in Liberary !</h1>
			</div>
			<div id="return">
				<h3><a href="adminmenus.php">Return to Home</a></h3>
			</div>
			<div id="submain">
				<table id="tbl" border="1">
					<thead>
						<tr>
							<th>No.</th>
							<th>Book Name</th>
							<th>Detail</th>
							<th>Author</th>
							<th>ISBN</th>
							<th>Category</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Modify</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$count=0;
							$num = mysqli_num_rows($query);
							if($num>0)
							{
							while ($row = mysqli_fetch_assoc($query)) 
								{
									$count++;
									echo "
									<tr>
										<td>".$count."</td>
										<td>".$row['bookname']."</td>
										<td>".$row['detail']."</td>
										<td>".$row['author']."</td>
										<td>".$row['isbn']."</td>
										<td>".$row['category']."</td>
										<td>".$row['price']."</td>
										<td>".$row['quantity']."</td>
										<td>
										<a href='availablebook.php?bn=".$row['bookname']."'>Delete</a>
										<a href='updatebook.php?bn=".$row['bookname']."&tail=".$row['detail']."&auth=".$row['author']."&is=".$row['isbn']."&gory=".$row['category']."&ice=".$row['price']."&quant=".$row['quantity']."'>Update</a>
										</td>
									</tr>
									";
								}		
							}
								
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div id="foot">
			<p>Made in Arbaminch University</p>
			<p>Copyright &copy; 2022 G3 SE</p>
		</div>
	</div>
</body>
</html>