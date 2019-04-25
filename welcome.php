<?php
	session_start();

	if($_SESSION['loggedin']!=true)
	{
		header("location:login.php");
	}

?>
<div class="txt1">
<?php
	echo "You are logged in as "?><b><?php echo $_SESSION['email'] ?></b> <?php;
?>


<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<br><br>
	<form action="/DBMS/inventory.php">
		<button class="btn6">Add Item to Inventory</button>
	</form>
	<form action="/DBMS/retrievedb.php">
		<button class="btn6">View Inventory</button>
	</form>
<br><br><br>
<a href="logout.php"><button class="btn9">LOGOUT</button></a>
</body>
</html>