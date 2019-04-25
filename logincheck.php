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
	$EmailID=$_POST['email'];
	$Password1=$_POST['password'];
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$sqlquery="SELECT * FROM `login` WHERE 	`EmailID`='$EmailID'";	
		$result=$conn->query($sqlquery);
		if($result->num_rows==1)
		{
		while($row=$result->fetch_assoc())
		{
			$Pass=$row['Password'];
			$Hashpassword = password_hash($Password1,PASSWORD_DEFAULT);
			if(password_verify($Password1,$Pass))
			{
				$_SESSION['loggedin'] = true;
                $_SESSION['email'] = $row['EmailID'];
                $_SESSION['username'] = $row['username'];
				header("location:welcome.php");
				$_SESSION['error']='\0';
			}
			else
			{
				$_SESSION['error']="Incorrect Password";
				header("location:login.php");
			}

		}
		}
		else
		{
			$_SESSION['error']="Email does not exist!";
			header("location:login.php");
		}
	}
?>