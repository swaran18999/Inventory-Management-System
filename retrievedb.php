<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
<style>
	table, th, td 
	{
		border: solid black;
  		border-collapse: collapse;
	}
	th, td 
	{
		text-align: left;
		width: 70px;
		padding: 10px;
	}
	th
	{
		background-color: lightgray;
	}
</style>
</head>
<body>

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
	$sqlquery="SELECT * FROM `items` WHERE 1 ORDER BY `Item_ID`";
	$result=$conn->query($sqlquery);
	session_start();
	if($_SESSION['loggedin']!=true)
	{
		echo "you are not logged in";
		header("location:login.php");
	}
	else
	{

	if($result->num_rows>0)
	{
		?>
		<table>
			<tr>
				<th>Name</th>
				<th>ID</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Delete</th>
				<th>Edit</th>
			</tr>
		<?php
		while($row=$result->fetch_assoc())
		{
			?>
			<tr>
				<td><?php echo $row["Item_Name"]; ?></td>
				<td><?php echo $row["Item_ID"]; ?></td>
				<td><?php echo $row["Item_Qty"]; ?></td>
				<td><?php echo $row["Item_Price"]; ?></td>
				<td><a href="/DBMS/delete.php?id=<?php echo $row['Item_ID'];?>"><button class="btn4"><center>Delete</center></button></a></td>
				<td><a href="/DBMS/edit.php?id=<?php echo $row['Item_ID'];?>"><button class="btn4">Edit</button></a></td>
			</tr>
		<?php
		}
		?>
		</table>
		<?php
	}
	}
?>
<br>
<a href="inventory.php"><button class="btn7">Enter into Inventory</button></a>
<br><br><br>
<a href="logout.php"><button class="btn8">LOGOUT</button></a>
</body>
</html>