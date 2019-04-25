<?php
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$db="inventory";
	$conn=mysqli_connect($servername,$username,$password,$db);
	if(!$conn)
	{
		die("Connection Failed:".mysqli_connect_error());
	}
	//if($_SESSION['loggedin']==true)
	{
	$delEle=$_SESSION['EditID'];
	echo $delEle;
	$sqlquery1="DELETE FROM `items` WHERE `Item_ID`='$delEle'";
	$conn->query($sqlquery1);
	$Item_Name=$_POST['Item_Name'];
	$Item_Price=$_POST['Item_Price'];
	$Item_ID=$_POST['Item_ID'];
	$Item_Qty=$_POST['Item_Qty'];
	echo $Item_Name;
	$sqlquery="INSERT INTO `items`(`Item_Name`, `Item_ID`, `Item_Qty`,`Item_Price`) VALUES ('$Item_Name','$Item_ID','$Item_Qty','$Item_Price')";
	$conn->query($sqlquery);	
	}

	header("location:/DBMS/retrievedb.php");
?>