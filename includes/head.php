<?php
	// Fix file path issues with altering directory segments
	$context_prefix = isset($_SERVER["CONTEXT_PREFIX"]) ? $_SERVER["CONTEXT_PREFIX"] : "";
	$document_root = realpath(isset($_SERVER["CONTEXT_DOCUMENT_ROOT"]) ? $_SERVER["CONTEXT_DOCUMENT_ROOT"] : $_SERVER["DOCUMENT_ROOT"]);
	$WEBSITE_ROOT = $context_prefix . str_replace(DIRECTORY_SEPARATOR, "/", substr(dirname(__FILE__, 2), strlen($document_root))) . "/";
?>
<head>
	<meta charset=UTF-8>
	<title><?php echo $title ?></title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<link rel="icon" type="image/x-icon" href="<?php echo $WEBSITE_ROOT?>img/logo.png">
	<link rel="stylesheet" href="<?php echo $WEBSITE_ROOT?>css/format.css">
	<link rel="stylesheet" href="<?php echo $WEBSITE_ROOT?>css/colour.css">
	<link rel="stylesheet" href="<?php echo $WEBSITE_ROOT?>css/animation.css">
	<link rel="stylesheet" href="<?php echo $WEBSITE_ROOT?>css/responsive.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php
		include "autoLogin.php";

		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}

		// Checks what pages user can access depending on login state
		if (isset($_SESSION["authorized"]) AND $_SESSION["authorized"] == TRUE) {
			$NOTpermList = array("login.php", "register.php");

			if (!$_SESSION["admin"]) {
				array_push($NOTpermList, "admin.php");
			}

			for ($x = 0; $x < count($NOTpermList); $x++) {
				if (basename($_SERVER["PHP_SELF"]) == $NOTpermList[$x]) {
					header("Location: index.php");
					exit();
				}
			}
		} else {
			$NOTpermList = array("editBooking.php", "account.php", "print.php", "admin.php");

			for ($x = 0; $x < count($NOTpermList); $x++) {
				if (basename($_SERVER["PHP_SELF"]) == $NOTpermList[$x]) {
					header("Location: login.php");
					exit();
				}
			}
		}
	?>
</head>