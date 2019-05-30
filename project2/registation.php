<?php
$name_error='';
$email_error='';
$passwd_error='';
$cpasswd_error='';
$con = mysqli_connect('127.0.0.1','root','','webdb'); 

if(isset($_POST['register']))
{
				$name=$_POST['name'];
				$email=$_POST['email'];
				$passwd=$_POST['password'];
				$cpasswd=$_POST['confirmpassword'];
			if(valadition($name) ||  evaladition($email) || pvaladition($passwd) || cvaladition($cpasswd,$passwd))
	{
			$name_error = valadition($name);
			$email_error = evaladition($email);
			$passwd_error = pvaladition($passwd);
			$cpasswd_error = cvaladition($cpasswd,$passwd);
	}
	else
	{
		$sql = "INSERT INTO value (name,email,password,confirmpassword) values('$name','$email','$passwd','$cpasswd')";
		if(mysqli_query($con,$sql))
		{
			echo"your data is been saved go to <a href='login.php'>loginpage</a>";
		}
	}
}
	function valadition($name)
		{
			if(empty($name))
			{
				return "Field is required";
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
	function cvaladition($cpasswd,$passwd)
		{
			if($passwd!=$cpasswd)
			{
				return"Password is not match";
			}
			if(empty($cpasswd))
			{
				return "Field is required";
			}
		}
?>
<!DOCTYPE html>
<html>
<head>
	<style>
	body{
		background-color: #fff008;
	}
	form{
		height:300px;
		width: 400px;
		background-color:#8080;
	}
	</style>
</head>
<body>
<form action="registation.php" method="POST">
	<?php echo $name_error;?>
	Name   <input type="text" name="name"><br><br>
	<?php echo $email_error;?>
	email   <input type="email" name="email"><br><br>
	<?php echo $passwd_error;?>
	password   <input type="password" name="password"><br><br>
	<?php echo $cpasswd_error;?>
	confirmpassword  <input type="password" name="confirmpassword"><br><br>
	<input type="submit" name="register" value="Register">
</form>
</bod>
</html>