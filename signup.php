<?php

	session_start();

	require('redirect.php');
	require('connect.php');
	require('validate.php');

	if(isset($_POST['signup'])) {

		$db = connectToDB();

		$s_id = mysqli_real_escape_string($db, $_POST['s_id']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = sha1(mysqli_real_escape_string($db, $_POST['password']));

		if(validateEmail($email) && validate($s_id) && validate($name) && validate($password)) {

			// Check if the user-id exists in the database or not ...
			$exists = "SELECT * FROM users WHERE _id='$s_id' LIMIT 1";
			$check = mysqli_query($db, $exists) or die("Error querying the database!");

			if(mysqli_num_rows($check) == 0) {

				$query = "INSERT INTO users VALUES('$s_id', '$name', '$email', '$password')";
				$result = mysqli_query($db, $query) or die("Error querying the database!");

				$_SESSION['logged'] = true;

				redirectTo('home.php');
			}
			else {
				$_SESSION['logged'] = false;
				echo "This Student Id has already been registered with us!!!";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up | OLV</title>

	<meta name="keywords" 
         content="SignUp Sign Up 
         OLV Online Video Learning Repository Repo Sign Up Register">

	<meta name="description" 
	         content="This page is used by the student to sign-up to the OLV web-app portal">

	<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/login_signup.css">
	<script type="text/javascript" src="js/angular.min.js"></script>
</head>
<body>

	<div class="top-label">
		<img class="olv-logo" width="70" height="70" src="images/olv-logo-a.svg" />
		<div class="olv-title">Online Learning Video Repository</div>
	</div>

	<div class="enclosure">
		<div class="label">
			<div class="log-label">Sign Up</div>
		</div>
		<div class="field-box">
			<form method="POST">
				<div class="data-fields">
					<div class="entries">
						<img class="side-icons" src="images/id.svg" /> | 
						<input type="text" name="s_id" placeholder="Student Id" size="30vw" />
					</div>
					<div class="entries">
						<img class="side-icons" src="images/person.svg" /> |
						<input type="text" name="name" placeholder="First And Last Name" size="30vw" />
					</div>
					<div class="entries">
						<img class="side-icons" src="images/mail.svg" /> |
						<input type="email" name="email" placeholder="Email Id" size="30vw" />
					</div>
					<div class="entries">
						<img class="side-icons" src="images/lock.svg" /> |
						<input type="password" name="password" placeholder="Password" size="30vw" />
					</div>
					<div class="log-in">
						<input type="submit" class="login-btn" name="signup" value="Sign Up" />
						<br />
					</div>
					<hr class="separator" />
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<script type="text/javascript" src="js/login_signup.js"></script>
</body>
</html>