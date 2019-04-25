<?php

session_start();


if($_SESSION['loggedin']!=true)
{
	echo "you are not logged in";
	header("location:login.php");
}
else
{

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<form action="" method="post">
			<input class="box1" type="text" name="Item_Name" placeholder="Item Name" required="required">
			<input class="box1" type="number" name="Item_ID" placeholder="Item ID" required="required">
			<input class="box1" type="number" name="Item_Qty" placeholder="Item Quantity" required="required">
			<input class="box1" type="number" name="Item_Price" placeholder="Item Price" required="required">
			<br><br>
			<button class="btn1" type="submit" name="signup-submit" formaction="/DBMS/enterdb.php">Enter Another Item</button>
			<button class="btn1" type="submit" name="signup-submit" formaction="/DBMS/enterdbalt.php">Finish</button>	
		</form>
	</body>
</html>

<?php

}

?>