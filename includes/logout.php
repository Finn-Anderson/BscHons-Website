<?php
	// Destory all sessions and cookies, which makes the user log out
	session_start();
	if (isset($_COOKIE['AblaCruisesRemember'])) {
		unset($_COOKIE['AblaCruisesRemember']); 
		setcookie("AblaCruisesRemember", "", time()-3600, "/");
	}

	session_destroy();
	header("Location: ../index.php");
?>