<?php
	include $_SERVER["DOCUMENT_ROOT"]."/includes/dbCredentials.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $name, $pass);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		session_start();

		$admin = filter_var(htmlspecialchars($_POST["admin"], ENT_QUOTES), FILTER_VALIDATE_BOOLEAN);
		$userID = htmlspecialchars($_POST["userID"], ENT_QUOTES);

		// Sets userID to either admin or user
		if ($userID != $_SESSION["id"]) {
			$setAdmin = $conn->prepare("UPDATE User SET admin = :admin WHERE userID = :userID");
			$setAdmin->bindValue(":admin", $admin, PDO::PARAM_BOOL);
			$setAdmin->bindValue(":userID", $userID, PDO::PARAM_INT);
			$setAdmin->execute();
		}
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$conn = null;
?>