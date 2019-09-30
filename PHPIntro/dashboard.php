<?php
		$userid =$_POST["userid"];
		$password = $_POST["password"];

		if($userid == "miszekb" && $password == "Rubinstein69!") {
			echo "<h1>Welcome, $userid</h1>";
		} else {
			echo "Incorrect Login Details!";
		}
?>