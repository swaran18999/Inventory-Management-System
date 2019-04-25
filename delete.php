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
	session_start();
	$delElement=$_GET['id'];
	echo $delElement;
	$sqlquery="DELETE FROM `items` WHERE `Item_ID`='$delElement'";
	$conn->query($sqlquery);
	echo "Successfully deleted";
	header("location:/DBMS/retrievedb.php")
?>