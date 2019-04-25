<?php

session_start();

if(isset($_SESSION['error']))
{
	$error=$_SESSION['error'];
}
else
{
	$error="";
}

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true)
{
	header("location:welcome.php");
	exit;
}

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<form action="logincheck.php" method="post">
			<input type="email" class="box1" name="email" placeholder="Enter Email" required="required">
			<input type="password" class="box1" name="password" placeholder="Enter Password" required="required">
			<button type="submit" class="btn4">Login</button>
		</form>
		<div class="error">
			<?php echo $error; ?>
		</div>
		<br><br><br>
		<div class="txt1">
			Don't have an account? <a href="register.php">Register</a>
		</div>
	</body>
</html>