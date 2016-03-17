<?php

$to = "omarpatel123@gmail.com";
$subject = "Portfolio Contact";

$name = $_POST['name'];
$email = $_POST['email'];
$topic = $_POST['topic'];
$message = $_POST['message'];

$body = <<<EMAIL

Hi! My name is $name and my topic is $topic

$message

From $name
Oh yeah, my email is $email

EMAIL;

$header = "From: $email";

if ($_POST) {
	if ($name == '' || $email == '' || $message == '')
	{
		$feedback = 'Fill out all the fields';
	} else {
		mail($to, $subject, $body, $header);
		$feedback = 'Hey, this is actually working!';
	}
}

?>

<!doctype html>
<html>
	<head>
		<title>
			Los Angeles Modern Hiker
		</title>
		<link rel="stylesheet" href="_css/styles.css">
	</head>
	<body>
		<div id="container">
		<p id="feedback"><?php echo $feedback; ?></p>
			<?php include "includes/header.php" ?>
			<?php include "includes/nav.php" ?>
<!-- 			<nav id="mainmenu">
				<a href="index.php">Home</a>
				<a href="about.php">About</a>
				<a href="auctions.php">Trails</a>
				<a href="contact.php">Contact</a>
			</nav> -->
			<div id="main" class="cf">
				<form method="post" action="?">
					<ul>
						<li>
							<label for="name">Name</label>
							<input type="text" name="name" id="name" />
						</li>
						<li>
							<label for="email">Email</label>
							<input type="text" name="email" id="email" />
						<li>
							<label for="topic">Topic</label>
							<select id="topic" name="topic">
								<option value="City">City</option>
								<option value="Trails">Trails</option>
								<option value="Rock Climbing">Rock Climbing</option>
								<option value="Mountains">Mountains</option>
								<option value="Driving Directions">Driving Directions</option>
								<option value="Gear">Gear</option>
								<option value="Difficulty">Difficulty</option>
								<option value="Pictures">Pictures</option>
							</select>
						</li>
						<li>
							<label for="message">Tell me about your day:</label>
							<textarea id="message" name="message" col="42" rows="9"></textarea>
						</li>
						<li>
							<input type="submit" value="submit">
						</li>
					</ul>
				</form>
			</div>
			<footer id="closing" class="cf">
				<div class="contact">
					<div class="address">
						Los Angeles Modern Hikers
						101 Los Angeles st. Los Angeles,Ca. 90210
					</div>
					<div class="phone">p. 323.904.1950</div>
					<div class="fax">f. 323.904.1954</div>
					<div class="email"><a href="mailto:steven.w.bolz.jr@gmail.com">steven.w.bolz.jr@gmail.com</a></div>
				</div>
				<div class="copy">
					All website design, text, and images are Copyright 2015 by Modern Auctions, Inc. ALL RIGHTS RESERVED.
					Any use of materials on this website, including reproduction, modification, distribution or republication, without the prior written consent of MAI, is strictly prohibited.
				</div>
			</footer>
		</div>
	</body>
</html>