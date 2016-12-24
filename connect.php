<?php

	define('SERVER', 'localhost');
	define('UNAME', 'root');
	define('PASSWRD', '');
	define('DBNAME', 'olv');

	function connectToDB() {
		$db = mysqli_connect(SERVER, UNAME, PASSWRD, DBNAME) or die('Error conecting to Database!');
		return $db;
	}
?>