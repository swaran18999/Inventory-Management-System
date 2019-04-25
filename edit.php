<?php
	$servername="localhost";
	$username="root";
	$password="";
	$db="inventory";
	$conn=mysqli_connect($servername,$username,$password,$db);
	if(!$conn)
	{
		die("Connection Failed:".mysqli_connect_error());
	}
	$editEle=$_GET['id'];
	$sqlquery="SELECT * FROM `items` WHERE `Item_ID`='$editEle'";
	$result=$conn->query($sqlquery);
	session_start();
	$_SESSION['EditID']=$editEle;
	$row=$result->fetch_assoc();
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">		
	</head>
	<body>
		<form action="/DBMS/editenter.php" method="post">
			<table>
				<tr>
				<th>Name</th>
				<th>Item ID</th>
				<th>Quantity</th>
				<th>Price</th>
				</tr>
				<tr>
			<td><input class="box1" type="text" name="Item_Name" placeholder="Item Name" value="<?php echo $row['Item_Name']; ?>"></td>
			<td><input class="box1" type="number" name="Item_ID" placeholder="Item ID" value="<?php echo $row['Item_ID']; ?>"></td>
			<td><input class="box1" type="number" name="Item_Qty" placeholder="Item Quantity" value="<?php echo $row['Item_Qty']; ?>"></td>
			<td><input class="box1" type="number" name="Item_Price" placeholder="Item Price" value="<?php echo $row['Item_Price']; ?>"></td>
			</tr></table>
			<br><br>
			<button class="btn2" type="submit">Add to Inverntory</button>
		</form>
	</body>
</html>