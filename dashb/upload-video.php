<?php
	
	require('validate.php');
	require('connect.php');
	require('upload.php');

	if(isset($_POST['upload'])) {

		$db = connectToDB();

		$title = mysqli_real_escape_string($db, $_POST['title']);
		$topic = mysqli_real_escape_string($db, $_POST['select-topic']);
		$link = mysqli_real_escape_string($db, $_POST['link']);
		$source = mysqli_real_escape_string($db, $_POST['select-source']);
		$date = mysqli_real_escape_string($db, $_POST['video-date']);
		$description = mysqli_real_escape_string($db, $_POST['description']);


		if(validate($title) && validate($topic) && validate($link) && validate($source) && validate($date)) {
			$uploadOk = uploadFile();

			// Check if the link already exists in the database or not ...
			$exists = "SELECT * FROM videos-uploaded WHERE link='$link' LIMIT 1";
			$check = mysqli_query($db, $exists) or die("Error querying the database!");

			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);

			if(mysqli_num_rows($check) == 0) {

				$query = "INSERT INTO videos-uploaded (topic, link, src, v_date, img, description)
						VALUES('$topic', '$link', '$source', '$date', '$target_file', '$description')";

				$result = mysqli_query($db, $query) or die("Error querying the database!");

				alert("Your video has been uploaded ...");

				redirectTo('home.php');
			}
			else {
				echo "This video has already been uploaded!!!";
			}
		}

	}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Upload-video</title>
<link rel="stylesheet"	type="text/css" href="style-video-upload.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<center>
	<h1>Upload Video</h1>
	
	<form method="POST" enctype="multipart/form-data">
		<input type="text" name="title" placeholder="Enter Title" required/> <br>
		
		<select name="select-topic" required>
			<option value="0">Select a Topic</option>
			<option value="cs">Computer Science</option>
			<option value="ds">Data Science</option>
			<option value="mal">Math and Logic</option>
			<option value="lal">Language and Learning</option>
			<option value="pd">Personal Development</option>
			<option value="ls">Life Science</option>
			<option value="aah">Arts and Humanities</option>
			<option value="b">Business</option>
			<option value="ss">Social Science</option>
		</select>
		
		<input type="text" name="link" placeholder="Video Link" required/> <br>
		
		<select name="select-source" required>
			<option value="0">Select a Video Source</option>
			<option value="yt">Youtube</option>
			<option value="vim">Vimeo</option>
			<option value="fb">Facebook</option>
			<option value="dm">Daily Motion</option>
		</select>
		<br />
		<br />
		
		Video Release Date
		<br />
		
		<input type="date" name="video-date" placeholder="Video Release Date (dd-mm-yy)" required/><br><br>
		
		Upload a Video Thumbnail<br />
		<input value="input" type="file" name="thumbnail"required/><br />
		
		<textarea name="description" id="description" placeholder="Enter Description"></textarea>

		<br/>
		
		<input name="upload" id="upload" type="submit" value="Upload"/>
		
	</form>
</center>

</body>
</html>
