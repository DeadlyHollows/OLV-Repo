<!DOCTYPE html>
<html>
<head>
	<title>Log In | OLV</title>

	<meta name="keywords" 
         content="LogIn Log In 
         OLV Online Video Learning Repository Repo Log In">

	<meta name="description" 
	         content="This page is used by the student to log-in to the OLV web-app portal">

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
			<div class="log-label">Log In</div>
		</div>
		<div class="field-box">
			<div class="data-fields">
				<div class="entries">
					<img class="side-icons" src="images/id.svg" /> | 
					<input type="text" name="s_id" placeholder="Student Id Or Email" size="30vw" />
				</div>
				<div class="entries">
					<img class="side-icons" src="images/lock.svg" /> |
					<input type="password" name="password" placeholder="Password" size="30vw" />
				</div>
				<div class="log-in">
					<button type="submit" class="login-btn">Log In</button>
					<br />
					<div class="side-labels">
						<div class="remember">
							<input type="checkbox" id="remember" name="remember" value="remember" />
							<label for="remember">Remember Me</label>
						</div>
						<a href="#" class="forgot">Forgot Password?</a>
					</div>
				</div>
				<hr class="separator" />
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<script type="text/javascript" src="js/login_signup.js"></script>
</body>
</html>