<?php

	function validate($var) {

		if(isset($var) && !empty($var)) {
			return true;
		}

		echo "Enter all the data fields properly!"."<br />";
		return false;
	}

	function validateEmail($email) {

		$result = filter_var($email, FILTER_VALIDATE_EMAIL);
		$result1 = validate($email);

		if(!($result && $result1)) {

		}

		else if(!$result) {
			echo "Enter a valid Email Id!"."<br />";
		}

		return $result;
	}
?>