<?php
session_start();
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image:url('images/loginback.jpg');background-size:cover">

	<div id="main-wrapper">
		<center>
			<h2>Login</h2>
			<img src="images/loginpic.jpg" class="avatar1"/>
		</center>
	
	<form class="myform" action="login.php" method="post">
		<label><font face="Comic Sans MS">Username:</font></label><br>
		<input name="username" type="text" class="inputvalues" placeholder="Username" required/><br><br>
		<label><font face="Comic Sans MS">Password:</font></label><br>
		<input name="password" type="password" class="inputvalues" placeholder="Password" required/><br>
		<center><br><input name="login" type="submit" id="login_btn" value="Login"/><br>
		<a href="register.php" style="text-decoration:none"><input type="button" id="register_btn" value="Register"/><a/><br></center>
	</form>
	
	<?php
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$query = "select * from userinfotable where username='$username' AND password='$password'";
			
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				$_SESSION['username']=$username;
				header('location:login.php');
			}
			else
			{
				echo '<script type="text/javascript">alert("Invalid Credentials")</script>';
			}
		}
	?>
	</div>

</body>
</html>