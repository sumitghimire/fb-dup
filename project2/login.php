<?php
session_start();
$con = mysqli_connect('127.0.0.1','root','','webdb');

 if(isset($_GET['login']))
 {
	$email=$_GET['email'];
	$passwd=$_GET['password'];

	if(evaladition($email) || pvaladition($passwd))
	{
		$email_error = evaladition($email);
		$password_error = pvaladition($passwd);
	}
	else
	 {
		 $sql ="SELECT * FROM value WHERE email='$email' AND password='$passwd' ";
	 $result=mysqli_query($con,$sql);
     $rows=mysqli_num_rows($result);
     if($rows==1)
     {
     	$row=$result->fetch_assoc();
     	$email=$row['email'];
     	$passwd=$row['password'];

     	$_SESSION['email']=$email;
     	$_SESSION['password']=$passwd;
     	header('location:display.php');
     }
     else
     {
     	echo"Invalid username and password";
     }
 }
}
function evaladition($email)
{
	if(empty($email))
	{
	   return "Field is required";
	}
}
function pvaladition($passwd)
{
	if(empty($passwd))
	{
		return "Field is required";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="login.php" method="GET">
	<?php $email_error;?>
	Email<input type="email" name="email"><br><br>
	<?php $password_error;?>
	Password<input type="passsword" name="password"><br><br>
	<input type="submit" name="login" value="login">
</form>
</body>
</html>