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
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$EmailID=$_POST['email'];
		$Password=$_POST['password'];
		$Username=$_POST['uname'];
		$Hashpassword = password_hash($Password, PASSWORD_DEFAULT);
		$sqlquery="INSERT INTO `login`(`EmailID`, `Password`,`userName`) VALUES ('$EmailID','$Hashpassword','$Username')";
		$conn->query($sqlquery);
		header("location:login.php");
	}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		<table>

		<tr>
			<td>Name:</td>
			<td><input type="name" class="box1" name="uname" placeholder="Enter Username"></td>
		</tr>
		<tr>
			<td>E-Mail:</td>
			<td><input type="email" class="box1" name="email" placeholder="Enter Email"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" class="box1" name="password" placeholder="Enter Password"></td>
		</tr>
		</table>
		<br>
		<button class="btn5" type="submit">Register</button>
	</form>
	<br>
	<br>
	<div class="txt1">
		Already have an account? <a href="login.php">Login</a>
	</div>
</body>
</html>