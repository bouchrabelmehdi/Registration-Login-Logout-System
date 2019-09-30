<?php
session_start();
if (!isset($_SESSION['username']))
{
	header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="Bouchra Belmehdi, register login logout system, homepage." />
		<title>Homepage</title>	
		<link rel='stylesheet' href='styleform.css' type='text/css' media='all' />
	</head>
	<body>	
		<header>
			<div class="demo">Live demo</div>			
		</header>
		<section>
			<noscript><div class="jsalert"><h5>JavaScript is required for form validation<br>Please, enable JavaScript</h5></div></noscript>
			<div id="homediv">
				<?php
					if (isset($_SESSION['message']))
					{
					echo "<div class='homewelcome'>".$_SESSION['message']."</div>";
					unset($_SESSION['message']);
					}
				?>
				<a href="logout.php" id="logoutlink">Log out</a>
			</div>		
		</section>
		<footer>
			<div class="copyright">
				&copy; 2018 Copyright BouchraBelmehdi.com. All Rights Reserved.
			</div>
		</footer>
	</body>
</html>