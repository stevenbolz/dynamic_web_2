<?php 
require 'require/sharedVar.php';
require 'require/functions.php';
require 'require/connect.php';
require 'require/error_reporting.php';
require 'require/images.php';
require 'require/videos.php';
require 'require/blog.php';


if (isset($_POST['register']) && trim($_POST['register']) != '') {
	if (isset($_POST['username']) && isset($_POST['password']) && trim($_POST['username']) != '' && trim($_POST['password']) != '') {

		$username = escape_quotes($_POST['username']);
		$password = escape_quotes(hash("sha512", $_POST['password']));

		if ($_POST['name']) {
			$name = escape_quotes(strip_tags($_POST['username']));
		}

		$check = get_all_info("SELECT * FROM users WHERE Username='$username'");
		// Get the first instance of the user and store it into an array
		$userArray = $check->fetch_assoc();

		if (count($userArray) > 0) {
			die("That username already exists! Try creating another username. <a href='register.php'>Back</a>");
		}
		if (!ctype_alnum($username)) {
			die("Username contains special characters! Only numbers and letters are permitted. <a href='register.php'>Back</a>" );
		}
		if (strlen($username) > 20) {
			die("Username must contain less than 20 characters. <a href='register.php'>Back</a>" );
		}

		$salt = hash("sha512", rand() . rand() . rand());

		insert_or_update_info("INSERT INTO users (Username, Password, Name, Salt) 
			VALUES ('$username', '$password', '$name', '$salt')");

		setcookie("c_user", hash("sha512", $username), time() + 24 * 60 * 60, "/");
		setcookie("c_salt", $salt, time() + 24 * 60 * 60, "/");

		die("Your account has been created and you are now logged in.");
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

			<?php include 'includes/footer.php' ?>
		</div>
	</body>
</html>