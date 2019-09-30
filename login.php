<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="Bouchra Belmehdi, register login logout system, login form." />
		<title>Login form</title>	
		<link rel='stylesheet' href='styleform.css' type='text/css' media='all' />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="login.js"> </script>
		<script src="incorrectlogin.js"></script>
		<noscript><style>#signup{display:none;}</style></noscript>
	</head>
	<body>	
		<header>
			<div class="demo">Live demo</div>			
		</header>	
		<section>
			<noscript><div class="jsalert"><h5>JavaScript is required for form validation<br>Please, enable JavaScript</h5></div></noscript>
			<div id="signup">
			<form method="post" action="login.php" autocomplete="off" onsubmit="return checkloginfields()">
				<table>
					<tr><td>Username</td>
					<td><input type="text" id="user" name="username" spellcheck="false" placeholder="Username" maxlength="10" required></td></tr>
					<tr><td>Password</td>
					<td><i class="fa fa-eye" id="eye3"></i>
					<input type="password" id="pass" name="password" spellcheck="false" placeholder="Password" maxlength="60" required ></td></tr>					
				</table>
				<input type="submit" class="btn2" name="submit1" value="Log in">
				<?php
					if (isset($_SESSION['message']))
					{
					echo "<div class='incorrectlogin'>".$_SESSION['message']."</div>";
					unset($_SESSION['message']);
					}
				?>
				<p class="account2">Don't have an account? <a href="form.php" class="link">Register</a></p>
			</form>
			</div>
		</section>
		<footer>
			<div class="copyright">
				&copy; 2018 Copyright BouchraBelmehdi.com. All Rights Reserved.
			</div>
		</footer>
		<script src="togglelogin.js"> </script>
	</body>
</html>
<?php

$db=mysqli_connect("localhost","root","","loginregister");

if (isset($_POST['submit1'])){
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$db=mysqli_connect("localhost","root","");
	mysqli_select_db($db,"loginregister");

	$result = mysqli_query($db,"select * from registration where username = '".$username."'")
			or die("Failed to query database ".mysqli_error($db));
	$numrows = mysqli_num_rows($result);

	if($numrows == 1){
		$row = mysqli_fetch_array($result);

			if (password_verify($password,$row['password'])){
				
				$_SESSION['username'] = $username;
				$_SESSION['message'] = "Welcome ".$username;
				header("location:home.php");
			}
		
			else{
				$_SESSION['message'] = "*Incorrect password";
				header("location:login.php");
			}
	}
	else{
				$_SESSION['message'] = "*No user found";
				header("location:login.php");
	}
}
?>