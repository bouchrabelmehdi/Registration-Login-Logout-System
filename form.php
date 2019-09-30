<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="Bouchra Belmehdi, register login logout system, registration form." />
		<title>Registration form</title>	
		<link rel='stylesheet' href='styleform.css' type='text/css' media='all' />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="registration.js"></script>
		<script src="checkusername.js"></script>
		<script src="checkpassword.js"></script>
		<script src="incorrectuserpass.js"></script>
		<noscript><style>#signup{display:none;}</style></noscript>
	</head>
	<body>
		<header>
			<div class="demo">Live demo</div>			
		</header>
		<section>
			<noscript><div class="jsalert"><h5>JavaScript is required for form validation<br>Please, enable JavaScript</h5></div></noscript>
			<div id="signup">
			<form method="post" action="form.php" autocomplete="off" onsubmit="return checkregistrationfields()">
				<table>
					<tr><td>Name</td>
					<td><input type="text" id="name" name="name" spellcheck="false" placeholder="Name" maxlength="100" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" title="Enter a valid name" required></td></tr>
					<tr><td>Email</td>
					<td><input type="email" id="email" name="email" spellcheck="false" placeholder="Email" maxlength="50" pattern="^([^.@\s]+)(\.[^.@\s]+)*@([^.@\s]+\.)+([^.@\s]+)$" title="Enter a valid email address" required></td></tr>
					<tr><td>Username<span id="msg"></span></td>
					<td><input type="text" id="username" name="username" onkeyup="checkusername(this.value)" spellcheck="false" placeholder="Username" maxlength="10" pattern="^[^ ]+$" title="Spaces are not allowed" required></td></tr>
					<tr><td>Password</td>
					<td><i class="fa fa-eye" id="eye"></i>
					<input type="password" id="password" name="password" onkeyup="checkpassword()" spellcheck="false" placeholder="Password" maxlength="60" pattern="^(?!.*\s).{8,}$" title="At least 8 characters. No spaces" required></td></tr>					
					<tr><td>Confirm password</td>
					<td><i class="fa fa-eye" id="eye2"></i>
					<input type="password" id="password2" name="password2" onkeyup="checkpassword()" spellcheck="false" placeholder="Confirm password" maxlength="60" pattern="^(?!.*\s).{8,}$" title="At least 8 characters. No spaces" required></td></tr>					
				</table>
				<input class="btn" type="submit" name="submit1" value="Register">
				<div id="incorrectpass"></div>
				<?php
					if (isset($_SESSION['message']))
					{
					echo "<div class='incorrectuserpass'>".$_SESSION['message']."</div>";
					unset($_SESSION['message']);
					}
				?>
				<p class="account1">Already have an account? <a href="login.php" class="link">Log in</a></p>
			</form>
			</div>
		</section>
		<footer>
			<div class="copyright">
				&copy; 2018 Copyright BouchraBelmehdi.com. All Rights Reserved.
			</div>
		</footer>
		<script src="toggleregistration.js"> </script>
	</body>
</html>
<?php

	$db=mysqli_connect("localhost","root","","loginregister");

	if (isset($_POST["submit1"]))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		
		$db=mysqli_connect("localhost","root","");
		mysqli_select_db($db,"loginregister");
		
		$count=0;
		$res=mysqli_query($db,"select * from registration where username = '".$username."'")
			or die("Failed to query database ".mysqli_error($db));
		$count=mysqli_num_rows($res);
		
		if ($count>0)
		{
			$_SESSION['message'] = "*Username already taken";
			header("location:form.php");
		}
		
		else if ($password!=$password2)
		{
			$_SESSION['message'] = "*Passwords do not match";
			header("location:form.php");
		}
		
		else
		{
			$options = array("cost"=>12);
			$hashpassword = password_hash($password,PASSWORD_BCRYPT,$options);
			mysqli_query($db,"insert into registration values('','$_POST[name]','$_POST[email]','$_POST[username]','".$hashpassword."')");
			$_SESSION['username'] = $username;
			$_SESSION['message'] = "Welcome ".$username;
			header("location:home.php");
			exit();
		}
		
	}
?>