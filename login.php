<?php 
require 'require/sharedVar.php';
require 'require/functions.php';
require 'require/connect.php';
require 'require/error_reporting.php';
require 'require/login_check.php';

if (isset($_POST['login']) && trim($_POST['login']) != '') {
	if (isset($_POST['username']) && isset($_POST['password']) && trim($_POST['username']) != '' && trim($_POST['password']) != '') {

		$username = escape_quotes($_POST['username']);
		$password = escape_quotes(hash("sha512", $_POST['password']));
		// $password = escape_quotes($_POST['password']);

		$user = get_all_info("SELECT * FROM users WHERE Username='$username'");

		// Get the first instance of the user and store it into an array
		$userArray = $user->fetch_assoc();

		if(count($userArray) <= 0) {
			die("That username doesn't exist! Try making <i>$username</i> today! <a href='login.php'>Back</a>");
		}
		if ($userArray['Password'] != $password) {
			die("Incorrect password! <a href='login.php'>Back</a>");
		}
		$salt = hash("sha512", rand() . rand() . rand());

		setcookie("c_user", hash("sha512", $username), time() + 24 * 60 * 60, "/");
		setcookie("c_salt", $salt, time() + 24 * 60 * 60, "/");

		$userID = $userArray['ID'];
		insert_or_update_info("UPDATE users SET Salt='$salt' WHERE ID='$userID'");

		die("You are now logged in as $username");
	}
	else {
		echo "Please enter a username and password.";
	}
}

?>
<!doctype html>
<html>
	<head>
		<?php include "includes/head.php" ?>
	</head>
	<body>
		<div id="container">


			<?php include "includes/header.php" ?>
			<?php include "includes/nav.php" ?>

			<form method="post" action="">
				<ul>
					<li>
						<label for="username">Username</label>
						<input id="username" type="text" name="username" value="" />
					</li>
					<li>
						<label for="password">Password</label>
						<input id="password" type="password" name="password" value=""/>
					<li>
						<input type="submit" name="login" value="Login">
					</li>
					<form method="post" action="logout.php">
 				<ul>
 					<li>
 					<input type="submit" name="logout" value="Logout">
 					</li>
 				</ul>
			</form>

			<?php include 'includes/footer.php' ?>
		</div>
		<h2>Haven't Registered? Register<a href="register.php"> here</a></h4>
	</body>
</html>