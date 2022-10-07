<head>
	<meta charset=UTF-8>
	<title><?php echo $title ?></title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<link rel="icon" type="image/x-icon" href="/img/logo.png">
	<link rel="stylesheet" href="/css/format.css">
	<link rel="stylesheet" href="/css/colour.css">
	<link rel="stylesheet" href="/css/animation.css">
	<link rel="stylesheet" href="/css/responsive.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php
		include "autoLogin.php";

		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}

		// Checks what pages user can access depending on login state
		if (isset($_SESSION["authorized"]) AND $_SESSION["authorized"] == TRUE) {
			$NOTpermList = array("login.php", "register.php");

			for ($x = 0; $x < count($NOTpermList); $x++) {
				if (basename($_SERVER["PHP_SELF"]) == $NOTpermList[$x]) {
					header("Location: ../index.php");
					exit();
				}
			}
		} else {
			$NOTpermList = array("editBooking.php", "account.php", "print.php");

			for ($x = 0; $x < count($NOTpermList); $x++) {
				if (basename($_SERVER["PHP_SELF"]) == $NOTpermList[$x]) {
					header("Location: ../login.php");
					exit();
				}
			}
		}
	?>
</head>